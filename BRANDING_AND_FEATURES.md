# System Branding & Feature Access - Implementation Guide

## Overview
This document details the implementation of system branding features and plan-based feature access control.

---

## 1. System Branding (SuperAdmin)

### Database: `system_settings` Table

**Purpose:** Store global system configuration including branding

**Schema:**
```sql
CREATE TABLE system_settings (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    setting_key VARCHAR(100) UNIQUE NOT NULL,
    setting_value TEXT,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);
```

**Default Settings:**
- `system_name` - "MyPay"
- `system_logo` - "/images/logo.png"
- `system_favicon` - "/images/favicon.ico"

### Implementation

**Model:** `app/Models/SystemSetting.php`
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SystemSetting extends Model
{
    protected $fillable = ['setting_key', 'setting_value'];

    public static function get($key, $default = null)
    {
        return Cache::remember("system_setting_{$key}", 3600, function () use ($key, $default) {
            $setting = self::where('setting_key', $key)->first();
            return $setting ? $setting->setting_value : $default;
        });
    }

    public static function set($key, $value)
    {
        self::updateOrCreate(
            ['setting_key' => $key],
            ['setting_value' => $value]
        );
        Cache::forget("system_setting_{$key}");
    }
}
```

**Controller:** `app/Http/Controllers/SuperAdmin/SystemSettingsController.php`
```php
<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\SystemSetting;
use Illuminate\Http\Request;

class SystemSettingsController extends Controller
{
    public function index()
    {
        $settings = [
            'system_name' => SystemSetting::get('system_name', 'MyPay'),
            'system_logo' => SystemSetting::get('system_logo'),
            'system_favicon' => SystemSetting::get('system_favicon'),
        ];

        return view('superadmin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'system_name' => 'required|string|max:255',
            'system_logo' => 'nullable|image|max:2048',
            'system_favicon' => 'nullable|mimes:ico,png|max:512',
        ]);

        // Update system name
        SystemSetting::set('system_name', $request->system_name);

        // Handle logo upload
        if ($request->hasFile('system_logo')) {
            $logoPath = $request->file('system_logo')->store('branding', 'public');
            SystemSetting::set('system_logo', $logoPath);
        }

        // Handle favicon upload
        if ($request->hasFile('system_favicon')) {
            $faviconPath = $request->file('system_favicon')->store('branding', 'public');
            SystemSetting::set('system_favicon', $faviconPath);
        }

        return redirect()->back()->with('success', 'System settings updated successfully!');
    }
}
```

---

## 2. Seller Custom Branding (Pro & Max Plans)

### Database: Update `tenants` Table

**Additional Fields:**
- `store_name` - Custom store name for buyer view
- `store_logo` - Custom logo for buyer-facing pages
- `store_favicon` - Custom favicon for buyer-facing pages

**Migration:**
```php
Schema::table('tenants', function (Blueprint $table) {
    $table->string('store_name')->nullable();
    $table->string('store_logo')->nullable();
    $table->string('store_favicon')->nullable();
});
```

### Implementation

**Middleware:** `app/Http/Middleware/ApplyTenantBranding.php`
```php
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApplyTenantBranding
{
    public function handle(Request $request, Closure $next)
    {
        // Check if viewing a seller's store (buyer view)
        if ($tenant = $request->route('tenant')) {
            $subscription = $tenant->subscription;
            
            // Check if plan allows custom branding (Pro or Max)
            if ($subscription && in_array($subscription->plan->slug, ['pro', 'max'])) {
                view()->share('storeName', $tenant->store_name ?? $tenant->business_name);
                view()->share('storeLogo', $tenant->store_logo);
                view()->share('storeFavicon', $tenant->store_favicon);
            } else {
                // Use system defaults for Free and Basic plans
                view()->share('storeName', SystemSetting::get('system_name'));
                view()->share('storeLogo', SystemSetting::get('system_logo'));
                view()->share('storeFavicon', SystemSetting::get('system_favicon'));
            }
        }

        return $next($request);
    }
}
```

**View (Buyer-facing layout):**
```blade
<!DOCTYPE html>
<html>
<head>
    <title>{{ $storeName ?? config('app.name') }}</title>
    <link rel="icon" href="{{ asset($storeFavicon ?? 'favicon.ico') }}">
</head>
<body>
    <header>
        <img src="{{ asset($storeLogo ?? 'images/logo.png') }}" alt="{{ $storeName }}">
    </header>
    
    @yield('content')
</body>
</html>
```

---

## 3. Plan-Based Feature Access (Free & Basic Plans)

### Feature Gate Implementation

**Helper:** `app/Helpers/PlanHelper.php`
```php
<?php

namespace App\Helpers;

class PlanHelper
{
    public static function canAccess($tenant, $feature)
    {
        $subscription = $tenant->subscription;
        
        if (!$subscription || $subscription->status !== 'active') {
            return false;
        }

        $features = $subscription->plan->features;
        
        return match($feature) {
            'custom_branding' => in_array($subscription->plan->slug, ['pro', 'max']),
            'whatsapp_integration' => $features['whatsapp_integration'] ?? false,
            'social_media_ads' => $features['social_media_ads'] ?? false,
            'custom_domain' => $features['custom_domain'] ?? false,
            'staff_management' => ($features['user_logins'] ?? 1) > 1,
            default => true,
        };
    }

    public static function getFeatureLimit($tenant, $feature)
    {
        $subscription = $tenant->subscription;
        
        if (!$subscription || $subscription->status !== 'active') {
            return 0;
        }

        $features = $subscription->plan->features;
        
        return match($feature) {
            'max_products' => $features['max_products'] ?? 0,
            'email_blast_limit' => $features['email_blast_limit'] ?? 0,
            'user_logins' => $features['user_logins'] ?? 1,
            'invoices_per_month' => $features['invoices_per_month'] ?? 0,
            'email_accounts' => $features['email_accounts'] ?? 0,
            default => 0,
        };
    }
}
```

**Blade Directive:** `app/Providers/AppServiceProvider.php`
```php
use Illuminate\Support\Facades\Blade;
use App\Helpers\PlanHelper;

public function boot()
{
    Blade::if('canAccess', function ($feature) {
        $tenant = auth()->user()->tenant;
        return PlanHelper::canAccess($tenant, $feature);
    });
}
```

**Usage in Views:**
```blade
<!-- Show feature but lock it for Free/Basic plans -->
<div class="feature-card {{ !PlanHelper::canAccess($tenant, 'custom_branding') ? 'locked' : '' }}">
    <h3>Custom Branding</h3>
    
    @canAccess('custom_branding')
        <!-- Feature is accessible -->
        <form action="{{ route('seller.branding.update') }}" method="POST">
            <!-- Branding form fields -->
        </form>
    @else
        <!-- Show upgrade prompt -->
        <div class="upgrade-prompt">
            <p>🔒 This feature is available on Pro and Max plans</p>
            <a href="{{ route('seller.subscription.upgrade') }}" class="btn btn-primary">
                Upgrade Plan
            </a>
        </div>
    @endcanAccess
</div>
```

**JavaScript for Locked Features:**
```javascript
// Intercept clicks on locked features
document.querySelectorAll('.feature-card.locked').forEach(card => {
    card.addEventListener('click', function(e) {
        e.preventDefault();
        
        // Show modal with upgrade prompt
        Swal.fire({
            title: 'Upgrade Required',
            text: 'This feature is available on higher plans. Would you like to upgrade?',
            icon: 'info',
            showCancelButton: true,
            confirmButtonText: 'View Plans',
            cancelButtonText: 'Maybe Later'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '/seller/subscription/plans';
            }
        });
    });
});
```

---

## 4. UI/UX Guidelines

### Locked Feature Indicators

**Visual Design:**
- Grayed out appearance
- Lock icon overlay
- "Pro" or "Max" badge
- Hover tooltip explaining requirement

**CSS Example:**
```css
.feature-card.locked {
    opacity: 0.6;
    position: relative;
    cursor: pointer;
}

.feature-card.locked::after {
    content: '🔒';
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 24px;
}

.feature-card.locked:hover {
    opacity: 0.8;
    border: 2px solid #60A5FA;
}

.plan-badge {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 4px 12px;
    border-radius: 12px;
    font-size: 12px;
    font-weight: bold;
}
```

### Dashboard Layout for Free/Basic Plans

```blade
<div class="dashboard-grid">
    <!-- Always accessible features -->
    <div class="feature-card">
        <h3>Products</h3>
        <p>{{ $productCount }} / {{ PlanHelper::getFeatureLimit($tenant, 'max_products') }}</p>
    </div>

    <!-- Locked feature with upgrade prompt -->
    <div class="feature-card locked" data-feature="custom_branding">
        <span class="plan-badge">PRO</span>
        <h3>Custom Branding</h3>
        <p>Customize your store logo and colors</p>
    </div>

    <div class="feature-card locked" data-feature="social_media_ads">
        <span class="plan-badge">MAX</span>
        <h3>Social Media Ads</h3>
        <p>Promote products on Facebook, Instagram, TikTok</p>
    </div>
</div>
```

---

## 5. Testing Checklist

### SuperAdmin Branding
- [ ] Upload system logo
- [ ] Upload system favicon
- [ ] Change system name
- [ ] Verify changes reflect across all admin pages
- [ ] Verify buyer-facing pages use correct branding based on plan

### Seller Custom Branding (Pro/Max)
- [ ] Pro plan seller can upload custom logo
- [ ] Pro plan seller can upload custom favicon
- [ ] Pro plan seller can set custom store name
- [ ] Max plan seller has same branding capabilities
- [ ] Free plan seller sees locked branding feature
- [ ] Basic plan seller sees locked branding feature
- [ ] Buyer views show correct branding based on seller's plan

### Feature Access Control
- [ ] Free plan sees all features but locked ones show upgrade prompt
- [ ] Basic plan sees all features but locked ones show upgrade prompt
- [ ] Clicking locked feature shows upgrade modal
- [ ] Pro plan has access to Pro features
- [ ] Max plan has access to all features
- [ ] Feature limits enforced (products, emails, etc.)

---

## 6. Database Seeder

**PlanSeeder with Features:**
```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlanSeeder extends Seeder
{
    public function run()
    {
        $plans = [
            [
                'name' => 'Free',
                'slug' => 'free',
                'price' => 0.00,
                'features' => [
                    'landing_pages' => 1,
                    'max_products' => 3,
                    'whatsapp_integration' => false,
                    'email_blast_limit' => 20,
                    'user_logins' => 1,
                    'invoices_per_month' => 999999,
                    'email_accounts' => 0,
                    'custom_domain' => false,
                    'custom_branding' => false,
                    'social_media_ads' => false,
                ],
            ],
            [
                'name' => 'Basic',
                'slug' => 'basic',
                'price' => 60.00,
                'features' => [
                    'landing_pages' => 1,
                    'max_products' => 15,
                    'whatsapp_integration' => true,
                    'email_blast_limit' => 100,
                    'user_logins' => 1,
                    'invoices_per_month' => 10,
                    'email_accounts' => 1,
                    'custom_domain' => false,
                    'custom_branding' => false,
                    'social_media_ads' => false,
                ],
            ],
            [
                'name' => 'Pro',
                'slug' => 'pro',
                'price' => 300.00,
                'features' => [
                    'landing_pages' => 1,
                    'max_products' => 250,
                    'whatsapp_integration' => true,
                    'email_blast_limit' => 1000,
                    'user_logins' => 3,
                    'invoices_per_month' => 20,
                    'email_accounts' => 3,
                    'custom_domain' => true,
                    'custom_branding' => true,
                    'social_media_ads' => false,
                ],
            ],
            [
                'name' => 'Max',
                'slug' => 'max',
                'price' => 4000.00,
                'features' => [
                    'landing_pages' => 1,
                    'max_products' => 500,
                    'whatsapp_integration' => true,
                    'email_blast_limit' => 5000,
                    'user_logins' => 5,
                    'invoices_per_month' => 100,
                    'email_accounts' => 5,
                    'custom_domain' => true,
                    'custom_branding' => true,
                    'social_media_ads' => true,
                ],
            ],
        ];

        foreach ($plans as $index => $planData) {
            Plan::create([
                'name' => $planData['name'],
                'slug' => $planData['slug'],
                'price' => $planData['price'],
                'currency' => 'MYR',
                'features' => json_encode($planData['features']),
                'status' => 'active',
                'sort_order' => $index,
            ]);
        }
    }
}
```

---

**Last Updated:** 2025-11-23  
**Status:** Ready for Implementation
