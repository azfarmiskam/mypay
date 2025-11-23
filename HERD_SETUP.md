# Laravel Herd Setup Guide

## Your Local Environment

You're using **Laravel Herd** as your development server.

## Accessing Your Application

### Theme Demo
**URL:** `http://mypay.test/theme-demo.html`

### Main Application
**URL:** `http://mypay.test`

### Login Page
**URL:** `http://mypay.test/login`

### Register Page
**URL:** `http://mypay.test/register`

---

## Building the Theme with Herd

### Step 1: Build CSS Assets
Open your terminal and run:
```bash
npm install
npm run build
```

Or for development with hot reload:
```bash
npm run dev
```

### Step 2: Run Database Migrations
```bash
php artisan migrate
```

### Step 3: Seed Database (when ready)
```bash
php artisan db:seed
```

---

## Herd Features You Can Use

### 1. **Automatic HTTPS**
Herd provides automatic HTTPS. Access your site securely:
```
https://mypay.test
```

### 2. **Database Management**
Herd includes DBngin for database management. You can:
- Create databases through Herd's UI
- Use TablePlus or any MySQL client
- Connection details:
  - Host: `127.0.0.1`
  - Port: `3306` (default)
  - Username: `root`
  - Password: (usually empty)

### 3. **PHP Version Switching**
Herd allows easy PHP version switching. Make sure you're using PHP 8.2+:
```bash
php -v
```

### 4. **Queue Workers**
For background jobs (like WhatsApp notifications):
```bash
php artisan queue:work
```

---

## Quick Commands

### Clear Cache
```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

### Optimize for Development
```bash
php artisan optimize:clear
```

### Create Database
```bash
php artisan db:create mypay
```

Or create manually through Herd's DBngin interface.

---

## Troubleshooting

### Site Not Loading?
1. Check Herd is running
2. Verify the project is parked in Herd
3. Try: `http://localhost` or `http://127.0.0.1`

### Database Connection Error?
1. Check `.env` file:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=mypay
   DB_USERNAME=root
   DB_PASSWORD=
   ```
2. Create database if it doesn't exist
3. Run migrations: `php artisan migrate`

### Assets Not Loading?
1. Build assets: `npm run build`
2. Clear cache: `php artisan optimize:clear`
3. Check `public/build` directory exists

---

## Next Steps

1. ✅ View theme demo: `http://mypay.test/theme-demo.html`
2. Build CSS: `npm run build`
3. Create database: `mypay`
4. Run migrations: `php artisan migrate`
5. Create superadmin user
6. Start building dashboards!

---

**Herd Documentation:** https://herd.laravel.com/docs
