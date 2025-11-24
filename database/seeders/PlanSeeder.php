<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plans = [
            [
                'name' => 'Free',
                'slug' => 'free',
                'price' => 0.00,
                'currency' => 'MYR',
                'is_hidden' => false,
                'features' => json_encode([
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
                    'seo_tools' => true,
                ]),
                'status' => 'active',
                'sort_order' => 0,
            ],
            [
                'name' => 'Basic',
                'slug' => 'basic',
                'price' => 60.00,
                'currency' => 'MYR',
                'is_hidden' => false,
                'features' => json_encode([
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
                    'seo_tools' => true,
                ]),
                'status' => 'active',
                'sort_order' => 1,
            ],
            [
                'name' => 'Pro',
                'slug' => 'pro',
                'price' => 300.00,
                'currency' => 'MYR',
                'is_hidden' => false,
                'features' => json_encode([
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
                    'seo_tools' => true,
                ]),
                'status' => 'active',
                'sort_order' => 2,
            ],
            [
                'name' => 'Max',
                'slug' => 'max',
                'price' => 4000.00,
                'currency' => 'MYR',
                'is_hidden' => false,
                'features' => json_encode([
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
                    'seo_tools' => true,
                ]),
                'status' => 'active',
                'sort_order' => 3,
            ],
        ];

        foreach ($plans as $planData) {
            Plan::create($planData);
        }
    }
}
