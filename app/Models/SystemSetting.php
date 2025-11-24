<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SystemSetting extends Model
{
    protected $fillable = ['setting_key', 'setting_value'];

    /**
     * Get a system setting value
     */
    public static function get(string $key, $default = null)
    {
        return Cache::remember("system_setting_{$key}", 3600, function () use ($key, $default) {
            $setting = self::where('setting_key', $key)->first();
            return $setting ? $setting->setting_value : $default;
        });
    }

    /**
     * Set a system setting value
     */
    public static function set(string $key, $value): void
    {
        self::updateOrCreate(
            ['setting_key' => $key],
            ['setting_value' => $value]
        );
        Cache::forget("system_setting_{$key}");
    }

    /**
     * Get all settings as key-value array
     */
    public static function getAll(): array
    {
        return self::pluck('setting_value', 'setting_key')->toArray();
    }
}
