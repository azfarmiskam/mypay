# Deployment Notes for StackCP Shared Hosting

## Hosting Environment

**Provider:** StackCP.com  
**Account Type:** Unlimited Shared Hosting  
**Database:** MariaDB (MySQL-compatible)  
**Control Panel:** StackCP

---

## Pre-Deployment Checklist

### 1. Hosting Requirements Verification

Verify your StackCP hosting supports:
- ✅ PHP 8.2 or higher
- ✅ Composer
- ✅ MariaDB/MySQL
- ✅ SSH access (for deployment)
- ✅ Cron jobs (for scheduled tasks)
- ✅ PHP extensions:
  - BCMath
  - Ctype
  - Fileinfo
  - JSON
  - Mbstring
  - OpenSSL
  - PDO
  - Tokenizer
  - XML
  - cURL

### 2. Laravel Configuration for Shared Hosting

**Important Adjustments:**

#### `.env` Configuration
```env
APP_NAME="MyPay"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdomain.com

# Database (MariaDB)
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password

# Cache Driver (File-based for shared hosting)
CACHE_DRIVER=file
SESSION_DRIVER=file

# Queue Driver (Database for shared hosting)
QUEUE_CONNECTION=database

# Filesystem
FILESYSTEM_DISK=local
```

#### Queue Configuration
Since shared hosting doesn't support Redis or dedicated queue workers, use database queue:

1. Create queue jobs table:
```bash
php artisan queue:table
php artisan migrate
```

2. Set up cron job in StackCP:
```bash
* * * * * cd /path/to/your/project && php artisan schedule:run >> /dev/null 2>&1
```

3. Add to `app/Console/Kernel.php`:
```php
protected function schedule(Schedule $schedule)
{
    // Process queue every minute
    $schedule->command('queue:work --stop-when-empty')->everyMinute();
    
    // Process subscription renewals daily
    $schedule->command('subscriptions:process-renewals')->daily();
}
```

---

## WhatsApp Integration for Order Notifications

### Option 1: WhatsApp Business API (Recommended)

**Provider Options:**
1. **Twilio WhatsApp API**
   - Website: https://www.twilio.com/whatsapp
   - Pricing: Pay-as-you-go
   - Setup: Requires business verification

2. **MessageBird WhatsApp API**
   - Website: https://messagebird.com/whatsapp
   - Pricing: Per message
   - Setup: Business verification required

3. **Vonage (Nexmo) WhatsApp API**
   - Website: https://www.vonage.com/communications-apis/messages/
   - Pricing: Per message

**Implementation:**
```php
// app/Services/WhatsAppService.php
namespace App\Services;

use Twilio\Rest\Client;

class WhatsAppService
{
    protected $client;
    protected $from;

    public function __construct()
    {
        $this->client = new Client(
            config('services.twilio.sid'),
            config('services.twilio.token')
        );
        $this->from = 'whatsapp:' . config('services.twilio.whatsapp_number');
    }

    public function sendOrderNotification($to, $order)
    {
        $message = "🎉 New Order Received!\n\n";
        $message .= "Order #: {$order->order_number}\n";
        $message .= "Customer: {$order->buyer->name}\n";
        $message .= "Total: {$order->currency} {$order->total}\n";
        $message .= "Status: {$order->status}\n\n";
        $message .= "View details: " . route('seller.orders.show', $order->id);

        return $this->client->messages->create(
            'whatsapp:' . $to,
            [
                'from' => $this->from,
                'body' => $message
            ]
        );
    }
}
```

### Option 2: WhatsApp Web API (Alternative)

**Provider:** WA-Automate or similar
- Website: https://github.com/open-wa/wa-automate-nodejs
- Cost: Free (self-hosted)
- Limitation: Requires a dedicated WhatsApp number

---

## Deployment Steps

### Step 1: Upload Files

1. **Via FTP/SFTP:**
   - Upload all files except `node_modules` and `vendor`
   - Upload to your public_html or subdirectory

2. **Via Git (if SSH available):**
   ```bash
   git clone your-repository.git
   ```

### Step 2: Install Dependencies

```bash
cd /path/to/your/project
composer install --optimize-autoloader --no-dev
```

### Step 3: Set Up Environment

```bash
cp .env.example .env
php artisan key:generate
```

Edit `.env` with your database credentials and settings.

### Step 4: Configure Public Directory

**Important:** Laravel's entry point is `public/index.php`

**Option A: Subdomain/Domain Root**
1. Point domain document root to `/path/to/project/public`
2. In StackCP, set document root to `public` folder

**Option B: Subdirectory**
Create `.htaccess` in root:
```apache
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteRule ^(.*)$ public/$1 [L]
</IfModule>
```

### Step 5: Database Setup

1. Create database in StackCP:
   - Go to MySQL Databases
   - Create new database
   - Create database user
   - Assign user to database

2. Run migrations:
```bash
php artisan migrate --force
```

3. Seed initial data:
```bash
php artisan db:seed --class=PlanSeeder
php artisan db:seed --class=SuperAdminSeeder
```

### Step 6: Optimize for Production

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### Step 7: Set Permissions

```bash
chmod -R 755 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

---

## Cron Jobs Setup

In StackCP Cron Jobs section, add:

```bash
* * * * * cd /home/username/public_html && php artisan schedule:run >> /dev/null 2>&1
```

Replace `/home/username/public_html` with your actual path.

---

## Database Queue Worker

Since shared hosting doesn't support long-running processes, use cron to process queue:

Add to `app/Console/Kernel.php`:
```php
protected function schedule(Schedule $schedule)
{
    $schedule->command('queue:work --stop-when-empty --tries=3')
             ->everyMinute()
             ->withoutOverlapping();
}
```

---

## Order Notification Implementation

### Event Listener Setup

1. **Create Event:**
```bash
php artisan make:event OrderCreated
```

2. **Create Listener:**
```bash
php artisan make:listener SendSellerWhatsAppNotification
```

3. **Register in `EventServiceProvider.php`:**
```php
protected $listen = [
    OrderCreated::class => [
        SendSellerWhatsAppNotification::class,
    ],
];
```

4. **Implement Listener:**
```php
// app/Listeners/SendSellerWhatsAppNotification.php
namespace App\Listeners;

use App\Events\OrderCreated;
use App\Services\WhatsAppService;

class SendSellerWhatsAppNotification
{
    protected $whatsapp;

    public function __construct(WhatsAppService $whatsapp)
    {
        $this->whatsapp = $whatsapp;
    }

    public function handle(OrderCreated $event)
    {
        $order = $event->order;
        $tenant = $order->tenant;
        
        if ($tenant->whatsapp_number) {
            $this->whatsapp->sendOrderNotification(
                $tenant->whatsapp_number,
                $order
            );
        }
    }
}
```

5. **Dispatch Event in OrderController:**
```php
// After order creation
event(new OrderCreated($order));
```

---

## Performance Optimization for Shared Hosting

### 1. Enable OPcache
Check if enabled in StackCP PHP settings.

### 2. Minimize Database Queries
- Use eager loading
- Cache frequently accessed data
- Use database indexes

### 3. Asset Optimization
```bash
npm run build
```

### 4. Image Optimization
- Compress images before upload
- Use WebP format where possible
- Implement lazy loading

---

## Monitoring & Maintenance

### Log Monitoring
- Check `storage/logs/laravel.log` regularly
- Set up log rotation

### Database Backups
- Use StackCP's automated backup feature
- Download backups weekly
- Store off-site

### Security Updates
```bash
composer update
php artisan optimize:clear
```

---

## Troubleshooting

### Common Issues

**1. 500 Internal Server Error**
- Check `.env` file exists
- Verify file permissions
- Check error logs

**2. Database Connection Failed**
- Verify database credentials
- Check database host (usually `localhost`)
- Ensure database user has privileges

**3. Queue Not Processing**
- Verify cron job is running
- Check queue table exists
- Review failed_jobs table

**4. WhatsApp Notifications Not Sending**
- Verify API credentials
- Check WhatsApp number format (+60xxxxxxxxx)
- Review API logs
- Ensure queue is processing

---

## Support Resources

- **StackCP Documentation:** https://stackcp.com/docs
- **Laravel Shared Hosting:** https://laravel.com/docs/deployment
- **Twilio WhatsApp API:** https://www.twilio.com/docs/whatsapp
- **MariaDB Documentation:** https://mariadb.com/kb/en/

---

**Last Updated:** 2025-11-23  
**Environment:** StackCP Shared Hosting with MariaDB
