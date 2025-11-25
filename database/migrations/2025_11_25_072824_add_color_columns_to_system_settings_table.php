<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('system_settings', function (Blueprint $table) {
            // Remove old key-value columns if they exist
            if (Schema::hasColumn('system_settings', 'setting_key')) {
                $table->dropColumn(['setting_key', 'setting_value']);
            }
            
            // Add new columns if they don't exist
            if (!Schema::hasColumn('system_settings', 'site_name')) {
                $table->string('site_name')->default('MyPay')->after('id');
            }
            if (!Schema::hasColumn('system_settings', 'system_name')) {
                $table->string('system_name')->default('MyPay Payment System')->after('site_name');
            }
            if (!Schema::hasColumn('system_settings', 'logo')) {
                $table->string('logo')->nullable()->after('system_name');
            }
            if (!Schema::hasColumn('system_settings', 'favicon')) {
                $table->string('favicon')->nullable()->after('logo');
            }
            
            // System Color Theme
            if (!Schema::hasColumn('system_settings', 'main_color')) {
                $table->string('main_color')->default('#1E3A8A')->after('favicon');
            }
            if (!Schema::hasColumn('system_settings', 'secondary_color')) {
                $table->string('secondary_color')->default('#3B82F6')->after('main_color');
            }
            if (!Schema::hasColumn('system_settings', 'third_color')) {
                $table->string('third_color')->default('#60A5FA')->after('secondary_color');
            }
            
            // Content Color Theme
            if (!Schema::hasColumn('system_settings', 'title_color')) {
                $table->string('title_color')->default('#1F2937')->after('third_color');
            }
            if (!Schema::hasColumn('system_settings', 'subtitle_color')) {
                $table->string('subtitle_color')->default('#4B5563')->after('title_color');
            }
            if (!Schema::hasColumn('system_settings', 'content_color')) {
                $table->string('content_color')->default('#6B7280')->after('subtitle_color');
            }
            
            if (!Schema::hasColumn('system_settings', 'timezone')) {
                $table->string('timezone')->default('UTC')->after('content_color');
            }
            if (!Schema::hasColumn('system_settings', 'updated_by')) {
                $table->unsignedBigInteger('updated_by')->nullable()->after('timezone');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('system_settings', function (Blueprint $table) {
            $table->dropColumn([
                'site_name',
                'system_name',
                'logo',
                'favicon',
                'main_color',
                'secondary_color',
                'third_color',
                'title_color',
                'subtitle_color',
                'content_color',
                'timezone',
                'updated_by'
            ]);
            
            $table->string('setting_key', 100)->unique();
            $table->text('setting_value')->nullable();
        });
    }
};
