<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\SystemSetting;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SettingsController extends Controller
{
    /**
     * Update site information (site name and system name)
     */
    public function updateSiteInfo(Request $request)
    {
        $validated = $request->validate([
            'site_name' => ['required', 'string', 'max:255'],
            'system_name' => ['required', 'string', 'max:255'],
        ]);

        $settings = SystemSetting::firstOrCreate([]);
        
        // Track changes
        $changes = [];
        if ($settings->site_name != $validated['site_name']) {
            $changes['site_name'] = ['old' => $settings->site_name, 'new' => $validated['site_name']];
        }
        if ($settings->system_name != $validated['system_name']) {
            $changes['system_name'] = ['old' => $settings->system_name, 'new' => $validated['system_name']];
        }

        $settings->update([
            'site_name' => $validated['site_name'],
            'system_name' => $validated['system_name'],
            'updated_by' => auth()->id(),
        ]);

        // Log the activity
        if (!empty($changes)) {
            ActivityLog::log(
                'updated',
                'Updated site information',
                $settings,
                $changes
            );
        }

        // Clear cache
        Cache::forget('system_settings');

        return redirect()->route('superadmin.dashboard')
            ->with('activeSection', 'settings')
            ->with('success', 'Site information updated successfully!');
    }

    /**
     * Update branding (logo and favicon)
     */
    public function updateBranding(Request $request)
    {
        $validated = $request->validate([
            'logo' => ['nullable', 'image', 'mimes:png,jpg,jpeg', 'max:2048'],
            'favicon' => ['nullable', 'image', 'mimes:png,ico', 'max:1024'],
        ]);

        $settings = SystemSetting::firstOrCreate([]);
        $changes = [];

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('branding', 'public');
            $changes['logo'] = ['old' => $settings->logo, 'new' => $logoPath];
            $settings->logo = $logoPath;
        }

        if ($request->hasFile('favicon')) {
            $faviconPath = $request->file('favicon')->store('branding', 'public');
            $changes['favicon'] = ['old' => $settings->favicon, 'new' => $faviconPath];
            $settings->favicon = $faviconPath;
        }

        $settings->updated_by = auth()->id();
        $settings->save();

        // Log the activity
        if (!empty($changes)) {
            ActivityLog::log(
                'updated',
                'Updated branding (logo/favicon)',
                $settings,
                $changes
            );
        }

        // Clear cache
        Cache::forget('system_settings');

        return redirect()->route('superadmin.dashboard')
            ->with('activeSection', 'settings')
            ->with('success', 'Branding updated successfully!');
    }

    /**
     * Update color scheme
     */
    public function updateColors(Request $request)
    {
        $validated = $request->validate([
            'main_color' => ['required', 'regex:/^#[0-9A-Fa-f]{6}$/'],
            'secondary_color' => ['required', 'regex:/^#[0-9A-Fa-f]{6}$/'],
            'third_color' => ['required', 'regex:/^#[0-9A-Fa-f]{6}$/'],
        ]);

        $settings = SystemSetting::firstOrCreate([]);
        
        // Track changes
        $changes = [];
        foreach ($validated as $key => $value) {
            if ($settings->$key != $value) {
                $changes[$key] = ['old' => $settings->$key, 'new' => $value];
            }
        }

        $settings->update(array_merge($validated, ['updated_by' => auth()->id()]));

        // Log the activity
        if (!empty($changes)) {
            ActivityLog::log(
                'updated',
                'Updated color scheme',
                $settings,
                $changes
            );
        }

        // Clear cache
        Cache::forget('system_settings');

        return redirect()->route('superadmin.dashboard')
            ->with('activeSection', 'settings')
            ->with('success', 'Color scheme updated successfully!');
    }

    /**
     * Update timezone
     */
    public function updateTimezone(Request $request)
    {
        $validated = $request->validate([
            'timezone' => ['required', 'string', 'timezone'],
        ]);

        $settings = SystemSetting::firstOrCreate([]);
        
        // Track changes
        $changes = [];
        if ($settings->timezone != $validated['timezone']) {
            $changes['timezone'] = ['old' => $settings->timezone, 'new' => $validated['timezone']];
        }

        $settings->update([
            'timezone' => $validated['timezone'],
            'updated_by' => auth()->id(),
        ]);

        // Log the activity
        if (!empty($changes)) {
            ActivityLog::log(
                'updated',
                'Updated system timezone',
                $settings,
                $changes
            );
        }

        // Clear cache
        Cache::forget('system_settings');

        return redirect()->route('superadmin.dashboard')
            ->with('activeSection', 'settings')
            ->with('success', 'Timezone updated successfully!');
    }
}
