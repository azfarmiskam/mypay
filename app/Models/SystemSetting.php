<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SystemSetting extends Model
{
    protected $fillable = [
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
        'updated_by',
    ];

    /**
     * Get the user who last updated the settings
     */
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    /**
     * Get the singleton instance of system settings
     */
    public static function getInstance()
    {
        return static::firstOrCreate([]);
    }
}
