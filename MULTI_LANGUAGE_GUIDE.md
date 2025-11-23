# Multi-Language Implementation Guide

## Overview
This guide implements 4-language support: **Malay (ms)**, **English (en)**, **Indonesian (id)**, and **Chinese (zh)**.

---

## Step 1: Create Language Files

### Directory Structure
```
lang/
├── en/
│   └── landing.php
├── ms/
│   └── landing.php
├── id/
│   └── landing.php
└── zh/
│   └── landing.php
```

### Create: `lang/en/landing.php`
```php
<?php

return [
    // Navigation
    'nav_features' => 'Features',
    'nav_pricing' => 'Pricing',
    'nav_testimonials' => 'Testimonials',
    'nav_login' => 'Log In',
    'nav_register' => 'Register Free',

    // Hero Section
    'hero_title_1' => 'E-Commerce Platform',
    'hero_title_2' => 'Most Complete & Easiest',
    'hero_subtitle' => 'Start your online business with MyPay. Multiple functions in one platform to simplify your sales management.',
    'hero_cta_start' => 'Start Free',
    'hero_cta_learn' => 'Learn More',
    'hero_trial' => '1 Month Free Trial',
    'hero_no_card' => 'No Credit Card Required',
    'hero_stats_today' => 'Sales Today',
    'hero_stats_change' => 'from yesterday',

    // Stats
    'stats_users' => 'Active Users',
    'stats_sales' => 'Sales Processed',
    'stats_uptime' => 'Uptime',
    'stats_support' => 'Support',

    // Features
    'features_title' => 'Multiple Functions In One Platform',
    'features_subtitle' => 'MyPay offers everything you need to run a successful online business',
    
    'feature_products_title' => 'Product Management',
    'feature_products_desc' => 'Manage products easily. Add, edit, and track inventory in one place.',
    
    'feature_payment_title' => 'Payment Integration',
    'feature_payment_desc' => 'Support for ToyyibPay, BillPlz, Chip-In, and PayPal. Accept payments easily.',
    
    'feature_whatsapp_title' => 'WhatsApp Notifications',
    'feature_whatsapp_desc' => 'Receive order notifications directly to your WhatsApp. Never miss any sales.',
    
    'feature_invoice_title' => 'Automatic Invoices',
    'feature_invoice_desc' => 'Generate invoices automatically. Send directly to customers via email.',
    
    'feature_builder_title' => 'Landing Page Builder',
    'feature_builder_desc' => 'Create attractive sales pages without coding. Just drag & drop.',
    
    'feature_analytics_title' => 'Analytics & Reports',
    'feature_analytics_desc' => 'Monitor sales performance with detailed graphs and reports. Make smart decisions.',

    // Pricing
    'pricing_title' => 'Choose The Right Package',
    'pricing_subtitle' => 'Affordable prices with premium features. No hidden charges.',
    'pricing_per_month' => '/month',
    'pricing_for_starter' => 'For starters',
    'pricing_for_small' => 'For small business',
    'pricing_for_medium' => 'For medium business',
    'pricing_for_large' => 'For large business',
    'pricing_popular' => 'POPULAR',
    'pricing_start_free' => 'Start Free',
    'pricing_choose' => 'Choose',
    
    'pricing_products' => 'Products',
    'pricing_landing_page' => 'Landing Page',
    'pricing_emails' => 'Emails/month',
    'pricing_whatsapp' => 'WhatsApp Notifications',
    'pricing_branding' => 'Custom Branding',
    'pricing_domain' => 'Custom Domain',
    'pricing_ads' => 'Social Media Ads',
    'pricing_users' => 'Users',

    // Testimonials
    'testimonials_title' => 'What Our Users Say?',
    'testimonials_subtitle' => 'Trusted by thousands of entrepreneurs across Malaysia',
    
    'testimonial_1_text' => 'MyPay makes managing my online store very easy. WhatsApp notifications ensure I don\'t miss any orders!',
    'testimonial_1_name' => 'Ahmad bin Ali',
    'testimonial_1_role' => 'Online Store Owner',
    
    'testimonial_2_text' => 'Very user-friendly platform. Within a week my store started receiving orders!',
    'testimonial_2_name' => 'Siti Nurhaliza',
    'testimonial_2_role' => 'Entrepreneur',
    
    'testimonial_3_text' => 'Affordable price with complete features. Customer support is also very responsive. Highly recommended!',
    'testimonial_3_name' => 'Muhammad Faiz',
    'testimonial_3_role' => 'Online Merchant',

    // CTA
    'cta_title' => 'Start Your Online Business Today',
    'cta_subtitle' => 'Free trial for 1 month. No credit card required. Cancel anytime.',
    'cta_register' => 'Register Free Now',
    'cta_learn_more' => 'Learn More',

    // Footer
    'footer_tagline' => 'The most complete e-commerce platform for your business.',
    'footer_product' => 'Product',
    'footer_features' => 'Features',
    'footer_pricing' => 'Pricing',
    'footer_integrations' => 'Integrations',
    'footer_company' => 'Company',
    'footer_about' => 'About Us',
    'footer_contact' => 'Contact',
    'footer_blog' => 'Blog',
    'footer_support' => 'Support',
    'footer_help' => 'Help Center',
    'footer_docs' => 'Documentation',
    'footer_status' => 'Status',
    'footer_copyright' => 'All Rights Reserved.',
];
```

### Create: `lang/ms/landing.php`
```php
<?php

return [
    // Navigation
    'nav_features' => 'Ciri-Ciri',
    'nav_pricing' => 'Harga',
    'nav_testimonials' => 'Testimoni',
    'nav_login' => 'Log Masuk',
    'nav_register' => 'Daftar Percuma',

    // Hero Section
    'hero_title_1' => 'Platform E-Dagang',
    'hero_title_2' => 'Terlengkap & Termudah',
    'hero_subtitle' => 'Mulakan perniagaan online anda dengan MyPay. Pelbagai fungsi dalam satu platform untuk memudahkan pengurusan jualan anda.',
    'hero_cta_start' => 'Mulakan Percuma',
    'hero_cta_learn' => 'Ketahui Lebih Lanjut',
    'hero_trial' => 'Percubaan 1 Bulan Percuma',
    'hero_no_card' => 'Tiada Kad Kredit Diperlukan',
    'hero_stats_today' => 'Jualan Hari Ini',
    'hero_stats_change' => 'dari semalam',

    // Stats
    'stats_users' => 'Pengguna Aktif',
    'stats_sales' => 'Jualan Diproses',
    'stats_uptime' => 'Uptime',
    'stats_support' => 'Sokongan',

    // Features
    'features_title' => 'Pelbagai Fungsi Dalam Satu Platform',
    'features_subtitle' => 'MyPay menawarkan semua yang anda perlukan untuk menjalankan perniagaan online yang berjaya',
    
    'feature_products_title' => 'Pengurusan Produk',
    'feature_products_desc' => 'Urus produk dengan mudah. Tambah, edit, dan jejaki inventori dalam satu tempat.',
    
    'feature_payment_title' => 'Integrasi Pembayaran',
    'feature_payment_desc' => 'Sokongan ToyyibPay, BillPlz, Chip-In, dan PayPal. Terima bayaran dengan mudah.',
    
    'feature_whatsapp_title' => 'Notifikasi WhatsApp',
    'feature_whatsapp_desc' => 'Terima notifikasi pesanan terus ke WhatsApp anda. Tidak terlepas sebarang jualan.',
    
    'feature_invoice_title' => 'Invois Automatik',
    'feature_invoice_desc' => 'Jana invois secara automatik. Hantar terus kepada pelanggan melalui email.',
    
    'feature_builder_title' => 'Landing Page Builder',
    'feature_builder_desc' => 'Cipta halaman jualan yang menarik tanpa perlu coding. Drag & drop sahaja.',
    
    'feature_analytics_title' => 'Analitik & Laporan',
    'feature_analytics_desc' => 'Pantau prestasi jualan dengan graf dan laporan terperinci. Buat keputusan bijak.',

    // Pricing
    'pricing_title' => 'Pilih Pakej Yang Sesuai',
    'pricing_subtitle' => 'Harga berpatutan dengan fungsi premium. Tiada caj tersembunyi.',
    'pricing_per_month' => '/bulan',
    'pricing_for_starter' => 'Untuk permulaan',
    'pricing_for_small' => 'Untuk perniagaan kecil',
    'pricing_for_medium' => 'Untuk perniagaan sederhana',
    'pricing_for_large' => 'Untuk perniagaan besar',
    'pricing_popular' => 'POPULAR',
    'pricing_start_free' => 'Mulakan Percuma',
    'pricing_choose' => 'Pilih',
    
    'pricing_products' => 'Produk',
    'pricing_landing_page' => 'Landing Page',
    'pricing_emails' => 'Email/bulan',
    'pricing_whatsapp' => 'Notifikasi WhatsApp',
    'pricing_branding' => 'Custom Branding',
    'pricing_domain' => 'Custom Domain',
    'pricing_ads' => 'Iklan Media Sosial',
    'pricing_users' => 'Pengguna',

    // Testimonials
    'testimonials_title' => 'Apa Kata Pengguna Kami?',
    'testimonials_subtitle' => 'Dipercayai oleh ribuan usahawan di seluruh Malaysia',
    
    'testimonial_1_text' => 'MyPay sangat memudahkan pengurusan kedai online saya. Notifikasi WhatsApp memastikan saya tidak terlepas sebarang pesanan!',
    'testimonial_1_name' => 'Ahmad bin Ali',
    'testimonial_1_role' => 'Pemilik Kedai Online',
    
    'testimonial_2_text' => 'Platform yang sangat user-friendly. Dalam masa seminggu sahaja kedai saya sudah mula menerima pesanan!',
    'testimonial_2_name' => 'Siti Nurhaliza',
    'testimonial_2_role' => 'Usahawan',
    
    'testimonial_3_text' => 'Harga berpatutan dengan fungsi yang lengkap. Sokongan pelanggan juga sangat responsif. Highly recommended!',
    'testimonial_3_name' => 'Muhammad Faiz',
    'testimonial_3_role' => 'Peniaga Online',

    // CTA
    'cta_title' => 'Mulakan Perniagaan Online Anda Hari Ini',
    'cta_subtitle' => 'Percubaan percuma selama 1 bulan. Tiada kad kredit diperlukan. Batalkan bila-bila masa.',
    'cta_register' => 'Daftar Percuma Sekarang',
    'cta_learn_more' => 'Ketahui Lebih Lanjut',

    // Footer
    'footer_tagline' => 'Platform e-dagang terlengkap untuk perniagaan anda.',
    'footer_product' => 'Produk',
    'footer_features' => 'Ciri-Ciri',
    'footer_pricing' => 'Harga',
    'footer_integrations' => 'Integrasi',
    'footer_company' => 'Syarikat',
    'footer_about' => 'Tentang Kami',
    'footer_contact' => 'Hubungi',
    'footer_blog' => 'Blog',
    'footer_support' => 'Sokongan',
    'footer_help' => 'Pusat Bantuan',
    'footer_docs' => 'Dokumentasi',
    'footer_status' => 'Status',
    'footer_copyright' => 'Hak Cipta Terpelihara.',
];
```

### Create: `lang/id/landing.php`
```php
<?php

return [
    // Navigation
    'nav_features' => 'Fitur',
    'nav_pricing' => 'Harga',
    'nav_testimonials' => 'Testimoni',
    'nav_login' => 'Masuk',
    'nav_register' => 'Daftar Gratis',

    // Hero Section
    'hero_title_1' => 'Platform E-Commerce',
    'hero_title_2' => 'Terlengkap & Termudah',
    'hero_subtitle' => 'Mulai bisnis online Anda dengan MyPay. Berbagai fungsi dalam satu platform untuk memudahkan manajemen penjualan Anda.',
    'hero_cta_start' => 'Mulai Gratis',
    'hero_cta_learn' => 'Pelajari Lebih Lanjut',
    'hero_trial' => 'Uji Coba 1 Bulan Gratis',
    'hero_no_card' => 'Tidak Perlu Kartu Kredit',
    'hero_stats_today' => 'Penjualan Hari Ini',
    'hero_stats_change' => 'dari kemarin',

    // Stats
    'stats_users' => 'Pengguna Aktif',
    'stats_sales' => 'Penjualan Diproses',
    'stats_uptime' => 'Uptime',
    'stats_support' => 'Dukungan',

    // Features
    'features_title' => 'Berbagai Fungsi Dalam Satu Platform',
    'features_subtitle' => 'MyPay menawarkan semua yang Anda perlukan untuk menjalankan bisnis online yang sukses',
    
    'feature_products_title' => 'Manajemen Produk',
    'feature_products_desc' => 'Kelola produk dengan mudah. Tambah, edit, dan lacak inventaris di satu tempat.',
    
    'feature_payment_title' => 'Integrasi Pembayaran',
    'feature_payment_desc' => 'Dukungan untuk ToyyibPay, BillPlz, Chip-In, dan PayPal. Terima pembayaran dengan mudah.',
    
    'feature_whatsapp_title' => 'Notifikasi WhatsApp',
    'feature_whatsapp_desc' => 'Terima notifikasi pesanan langsung ke WhatsApp Anda. Tidak melewatkan penjualan apapun.',
    
    'feature_invoice_title' => 'Faktur Otomatis',
    'feature_invoice_desc' => 'Buat faktur secara otomatis. Kirim langsung ke pelanggan melalui email.',
    
    'feature_builder_title' => 'Pembuat Landing Page',
    'feature_builder_desc' => 'Buat halaman penjualan yang menarik tanpa coding. Cukup drag & drop.',
    
    'feature_analytics_title' => 'Analitik & Laporan',
    'feature_analytics_desc' => 'Pantau kinerja penjualan dengan grafik dan laporan terperinci. Buat keputusan cerdas.',

    // Pricing
    'pricing_title' => 'Pilih Paket Yang Tepat',
    'pricing_subtitle' => 'Harga terjangkau dengan fitur premium. Tanpa biaya tersembunyi.',
    'pricing_per_month' => '/bulan',
    'pricing_for_starter' => 'Untuk pemula',
    'pricing_for_small' => 'Untuk bisnis kecil',
    'pricing_for_medium' => 'Untuk bisnis menengah',
    'pricing_for_large' => 'Untuk bisnis besar',
    'pricing_popular' => 'POPULER',
    'pricing_start_free' => 'Mulai Gratis',
    'pricing_choose' => 'Pilih',
    
    'pricing_products' => 'Produk',
    'pricing_landing_page' => 'Landing Page',
    'pricing_emails' => 'Email/bulan',
    'pricing_whatsapp' => 'Notifikasi WhatsApp',
    'pricing_branding' => 'Branding Kustom',
    'pricing_domain' => 'Domain Kustom',
    'pricing_ads' => 'Iklan Media Sosial',
    'pricing_users' => 'Pengguna',

    // Testimonials
    'testimonials_title' => 'Apa Kata Pengguna Kami?',
    'testimonials_subtitle' => 'Dipercaya oleh ribuan pengusaha di seluruh Malaysia',
    
    'testimonial_1_text' => 'MyPay sangat memudahkan pengelolaan toko online saya. Notifikasi WhatsApp memastikan saya tidak melewatkan pesanan apapun!',
    'testimonial_1_name' => 'Ahmad bin Ali',
    'testimonial_1_role' => 'Pemilik Toko Online',
    
    'testimonial_2_text' => 'Platform yang sangat user-friendly. Dalam waktu seminggu saja toko saya sudah mulai menerima pesanan!',
    'testimonial_2_name' => 'Siti Nurhaliza',
    'testimonial_2_role' => 'Pengusaha',
    
    'testimonial_3_text' => 'Harga terjangkau dengan fitur lengkap. Dukungan pelanggan juga sangat responsif. Sangat direkomendasikan!',
    'testimonial_3_name' => 'Muhammad Faiz',
    'testimonial_3_role' => 'Pedagang Online',

    // CTA
    'cta_title' => 'Mulai Bisnis Online Anda Hari Ini',
    'cta_subtitle' => 'Uji coba gratis selama 1 bulan. Tidak perlu kartu kredit. Batalkan kapan saja.',
    'cta_register' => 'Daftar Gratis Sekarang',
    'cta_learn_more' => 'Pelajari Lebih Lanjut',

    // Footer
    'footer_tagline' => 'Platform e-commerce terlengkap untuk bisnis Anda.',
    'footer_product' => 'Produk',
    'footer_features' => 'Fitur',
    'footer_pricing' => 'Harga',
    'footer_integrations' => 'Integrasi',
    'footer_company' => 'Perusahaan',
    'footer_about' => 'Tentang Kami',
    'footer_contact' => 'Kontak',
    'footer_blog' => 'Blog',
    'footer_support' => 'Dukungan',
    'footer_help' => 'Pusat Bantuan',
    'footer_docs' => 'Dokumentasi',
    'footer_status' => 'Status',
    'footer_copyright' => 'Hak Cipta Dilindungi.',
];
```

### Create: `lang/zh/landing.php`
```php
<?php

return [
    // Navigation
    'nav_features' => '功能',
    'nav_pricing' => '价格',
    'nav_testimonials' => '评价',
    'nav_login' => '登录',
    'nav_register' => '免费注册',

    // Hero Section
    'hero_title_1' => '电子商务平台',
    'hero_title_2' => '最完整、最简单',
    'hero_subtitle' => '使用MyPay开始您的在线业务。一个平台上的多种功能,简化您的销售管理。',
    'hero_cta_start' => '免费开始',
    'hero_cta_learn' => '了解更多',
    'hero_trial' => '1个月免费试用',
    'hero_no_card' => '无需信用卡',
    'hero_stats_today' => '今日销售额',
    'hero_stats_change' => '与昨天相比',

    // Stats
    'stats_users' => '活跃用户',
    'stats_sales' => '已处理销售额',
    'stats_uptime' => '正常运行时间',
    'stats_support' => '支持',

    // Features
    'features_title' => '一个平台上的多种功能',
    'features_subtitle' => 'MyPay提供成功运营在线业务所需的一切',
    
    'feature_products_title' => '产品管理',
    'feature_products_desc' => '轻松管理产品。在一个地方添加、编辑和跟踪库存。',
    
    'feature_payment_title' => '支付集成',
    'feature_payment_desc' => '支持ToyyibPay、BillPlz、Chip-In和PayPal。轻松接受付款。',
    
    'feature_whatsapp_title' => 'WhatsApp通知',
    'feature_whatsapp_desc' => '直接在WhatsApp上接收订单通知。不会错过任何销售。',
    
    'feature_invoice_title' => '自动发票',
    'feature_invoice_desc' => '自动生成发票。通过电子邮件直接发送给客户。',
    
    'feature_builder_title' => '落地页构建器',
    'feature_builder_desc' => '无需编码即可创建有吸引力的销售页面。只需拖放。',
    
    'feature_analytics_title' => '分析和报告',
    'feature_analytics_desc' => '通过详细的图表和报告监控销售业绩。做出明智的决策。',

    // Pricing
    'pricing_title' => '选择合适的套餐',
    'pricing_subtitle' => '实惠的价格,高级功能。无隐藏费用。',
    'pricing_per_month' => '/月',
    'pricing_for_starter' => '适合初学者',
    'pricing_for_small' => '适合小型企业',
    'pricing_for_medium' => '适合中型企业',
    'pricing_for_large' => '适合大型企业',
    'pricing_popular' => '热门',
    'pricing_start_free' => '免费开始',
    'pricing_choose' => '选择',
    
    'pricing_products' => '产品',
    'pricing_landing_page' => '落地页',
    'pricing_emails' => '电子邮件/月',
    'pricing_whatsapp' => 'WhatsApp通知',
    'pricing_branding' => '自定义品牌',
    'pricing_domain' => '自定义域名',
    'pricing_ads' => '社交媒体广告',
    'pricing_users' => '用户',

    // Testimonials
    'testimonials_title' => '用户评价',
    'testimonials_subtitle' => '受到马来西亚数千企业家的信赖',
    
    'testimonial_1_text' => 'MyPay让管理我的在线商店变得非常简单。WhatsApp通知确保我不会错过任何订单!',
    'testimonial_1_name' => 'Ahmad bin Ali',
    'testimonial_1_role' => '在线商店老板',
    
    'testimonial_2_text' => '非常用户友好的平台。仅一周时间,我的商店就开始接收订单了!',
    'testimonial_2_name' => 'Siti Nurhaliza',
    'testimonial_2_role' => '企业家',
    
    'testimonial_3_text' => '价格实惠,功能齐全。客户支持也非常响应。强烈推荐!',
    'testimonial_3_name' => 'Muhammad Faiz',
    'testimonial_3_role' => '在线商家',

    // CTA
    'cta_title' => '今天就开始您的在线业务',
    'cta_subtitle' => '免费试用1个月。无需信用卡。随时取消。',
    'cta_register' => '立即免费注册',
    'cta_learn_more' => '了解更多',

    // Footer
    'footer_tagline' => '最完整的电子商务平台,为您的业务服务。',
    'footer_product' => '产品',
    'footer_features' => '功能',
    'footer_pricing' => '价格',
    'footer_integrations' => '集成',
    'footer_company' => '公司',
    'footer_about' => '关于我们',
    'footer_contact' => '联系',
    'footer_blog' => '博客',
    'footer_support' => '支持',
    'footer_help' => '帮助中心',
    'footer_docs' => '文档',
    'footer_status' => '状态',
    'footer_copyright' => '版权所有。',
];
```

---

## Step 2: Create Language Switcher Middleware

### Create: `app/Http/Middleware/SetLocale.php`
```bash
php artisan make:middleware SetLocale
```

```php
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if locale is in session
        if (Session::has('locale')) {
            $locale = Session::get('locale');
        } 
        // Check if locale is in query string
        elseif ($request->has('lang')) {
            $locale = $request->get('lang');
            Session::put('locale', $locale);
        }
        // Use default locale
        else {
            $locale = config('app.locale');
        }

        // Validate locale
        $availableLocales = ['en', 'ms', 'id', 'zh'];
        if (in_array($locale, $availableLocales)) {
            App::setLocale($locale);
        }

        return $next($request);
    }
}
```

### Register Middleware in `bootstrap/app.php`
```php
->withMiddleware(function (Middleware $middleware) {
    $middleware->web(append: [
        \App\Http\Middleware\SetLocale::class,
    ]);
})
```

---

## Step 3: Create Language Switcher Controller

### Create: `app/Http/Controllers/LanguageController.php`
```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function switch(Request $request, $locale)
    {
        // Validate locale
        $availableLocales = ['en', 'ms', 'id', 'zh'];
        
        if (in_array($locale, $availableLocales)) {
            Session::put('locale', $locale);
        }

        return redirect()->back();
    }
}
```

### Add Route in `routes/web.php`
```php
Route::get('/lang/{locale}', [LanguageController::class, 'switch'])->name('lang.switch');
```

---

## Step 4: Create Language Switcher Component

### Create: `resources/views/components/language-switcher.blade.php`
```blade
@php
    $currentLocale = app()->getLocale();
    $languages = [
        'en' => ['name' => 'English', 'flag' => '🇬🇧'],
        'ms' => ['name' => 'Bahasa Melayu', 'flag' => '🇲🇾'],
        'id' => ['name' => 'Bahasa Indonesia', 'flag' => '🇮🇩'],
        'zh' => ['name' => '中文', 'flag' => '🇨🇳'],
    ];
@endphp

<div class="relative inline-block text-left" x-data="{ open: false }">
    <button @click="open = !open" type="button" class="inline-flex items-center space-x-2 px-4 py-2 border border-gray-300 rounded-lg bg-white hover:bg-gray-50 transition">
        <span class="text-xl">{{ $languages[$currentLocale]['flag'] }}</span>
        <span class="text-sm font-medium text-gray-700">{{ $languages[$currentLocale]['name'] }}</span>
        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
        </svg>
    </button>

    <div x-show="open" @click.away="open = false" x-transition class="absolute right-0 mt-2 w-56 bg-white rounded-lg shadow-strong border border-gray-200 py-1 z-50">
        @foreach($languages as $code => $lang)
            <a href="{{ route('lang.switch', $code) }}" 
               class="flex items-center space-x-3 px-4 py-2 text-sm hover:bg-gray-100 transition {{ $currentLocale === $code ? 'bg-primary-50 text-primary-900 font-semibold' : 'text-gray-700' }}">
                <span class="text-xl">{{ $lang['flag'] }}</span>
                <span>{{ $lang['name'] }}</span>
                @if($currentLocale === $code)
                    <svg class="w-4 h-4 ml-auto text-primary-900" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                    </svg>
                @endif
            </a>
        @endforeach
    </div>
</div>
```

---

## Step 5: Update Welcome Blade to Use Translations

Replace hardcoded text with `{{ __('landing.key') }}` syntax.

Example:
```blade
<!-- Before -->
<h1>Platform E-Dagang Terlengkap & Termudah</h1>

<!-- After -->
<h1>{{ __('landing.hero_title_1') }} <span class="text-gradient">{{ __('landing.hero_title_2') }}</span></h1>
```

---

## Step 6: Add Alpine.js for Dropdown

In your layout head:
```html
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
```

---

## Testing

1. **Create language directories:**
   ```bash
   mkdir -p lang/en lang/ms lang/id lang/zh
   ```

2. **Create language files** as shown above

3. **Test language switching:**
   - Visit: `http://mypay.test`
   - Click language switcher
   - Select different languages
   - Content should change

4. **Test URL parameter:**
   - Visit: `http://mypay.test?lang=zh`
   - Should switch to Chinese

---

## Quick Implementation Commands

```bash
# Create middleware
php artisan make:middleware SetLocale

# Create controller
php artisan make:controller LanguageController

# Create language directories
mkdir -p lang/en lang/ms lang/id lang/zh

# Clear cache
php artisan config:clear
php artisan cache:clear
```

---

## Summary

✅ **4 Languages Supported:**
- English (en)
- Bahasa Melayu (ms)
- Bahasa Indonesia (id)
- 中文 (zh)

✅ **Features:**
- Session-based language persistence
- URL parameter support (`?lang=ms`)
- Dropdown language switcher with flags
- Automatic locale detection
- Fallback to English

✅ **Files Created:**
- 4 language files (`lang/{locale}/landing.php`)
- SetLocale middleware
- LanguageController
- Language switcher component

---

**Next Steps:**
1. Create the language files
2. Update welcome.blade.php to use translations
3. Add language switcher to navigation
4. Test all 4 languages
