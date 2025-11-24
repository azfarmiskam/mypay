<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AdminController extends Controller
{
    /**
     * Display a listing of admins.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        
        $admins = User::where('role', 'admin')
            ->when($search, function ($query, $search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%");
                });
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('superadmin.admins.index', compact('admins', 'search'));
    }

    /**
     * Store a newly created admin.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $admin = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'admin',
            'status' => 'active',
            'email_verified_at' => now(),
        ]);

        // Log the activity
        ActivityLog::log(
            'created',
            "Created new admin: {$admin->name} ({$admin->email})",
            $admin
        );

        return redirect()->route('superadmin.dashboard')
            ->with('activeSection', 'admins')
            ->with('success', 'Admin created successfully!');
    }

    /**
     * Update the specified admin.
     */
    public function update(Request $request, User $admin)
    {
        // Ensure we're only updating admins
        if ($admin->role !== 'admin') {
            return redirect()->route('superadmin.dashboard')
                ->with('activeSection', 'admins')
                ->with('error', 'Invalid admin user!');
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $admin->id],
            'password' => ['nullable', 'confirmed', Password::defaults()],
            'status' => ['required', 'in:active,inactive'],
        ]);

        // Track changes for activity log
        $changes = [];
        if ($admin->name != $validated['name']) {
            $changes['name'] = ['old' => $admin->name, 'new' => $validated['name']];
        }
        if ($admin->email != $validated['email']) {
            $changes['email'] = ['old' => $admin->email, 'new' => $validated['email']];
        }
        if ($admin->status != $validated['status']) {
            $changes['status'] = ['old' => $admin->status, 'new' => $validated['status']];
        }

        $admin->name = $validated['name'];
        $admin->email = $validated['email'];
        $admin->status = $validated['status'];

        if ($request->filled('password')) {
            $admin->password = Hash::make($validated['password']);
            $changes['password'] = ['old' => '***', 'new' => '*** (changed)'];
        }

        $admin->save();

        // Log the activity
        if (!empty($changes)) {
            ActivityLog::log(
                'updated',
                "Updated admin: {$admin->name} ({$admin->email})",
                $admin,
                $changes
            );
        }

        return redirect()->route('superadmin.dashboard')
            ->with('activeSection', 'admins')
            ->with('success', 'Admin updated successfully!');
    }

    /**
     * Remove the specified admin.
     */
    public function destroy(User $admin)
    {
        // Ensure we're only deleting admins
        if ($admin->role !== 'admin') {
            return redirect()->route('superadmin.dashboard')
                ->with('activeSection', 'admins')
                ->with('error', 'Invalid admin user!');
        }

        // Prevent deleting yourself
        if ($admin->id === auth()->id()) {
            return redirect()->route('superadmin.dashboard')
                ->with('activeSection', 'admins')
                ->with('error', 'You cannot delete yourself!');
        }

        // Log the activity before deletion
        ActivityLog::log(
            'deleted',
            "Deleted admin: {$admin->name} ({$admin->email})",
            $admin
        );

        $admin->delete();

        return redirect()->route('superadmin.dashboard')
            ->with('activeSection', 'admins')
            ->with('success', 'Admin deleted successfully!');
    }

    /**
     * Reset admin password to a temporary one.
     */
    public function resetPassword(User $admin)
    {
        // Ensure we're only resetting admin passwords
        if ($admin->role !== 'admin') {
            return redirect()->route('superadmin.dashboard')
                ->with('activeSection', 'admins')
                ->with('error', 'Invalid admin user!');
        }

        // Generate temporary password
        $tempPassword = 'Admin' . rand(1000, 9999) . '!';
        
        $admin->password = Hash::make($tempPassword);
        $admin->save();

        // Log the activity
        ActivityLog::log(
            'password_reset',
            "Reset password for admin: {$admin->name} ({$admin->email})",
            $admin
        );

        return redirect()->route('superadmin.dashboard')
            ->with('activeSection', 'admins')
            ->with('success', 'Password reset successfully!')
            ->with('temp_password', $tempPassword)
            ->with('admin_name', $admin->name);
    }

    /**
     * Store a newly created super admin.
     */
    public function storeSuperAdmin(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $superAdmin = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'superadmin',
            'status' => 'active',
            'email_verified_at' => now(),
        ]);

        // Log the activity
        ActivityLog::log(
            'created',
            "Created new super admin: {$superAdmin->name} ({$superAdmin->email})",
            $superAdmin
        );

        return redirect()->route('superadmin.dashboard')
            ->with('activeSection', 'settings')
            ->with('success', 'Super Admin created successfully!');
    }

    /**
     * Update the specified super admin.
     */
    public function updateSuperAdmin(Request $request, User $admin)
    {
        // Ensure we're only updating superadmins
        if ($admin->role !== 'superadmin') {
            return redirect()->route('superadmin.dashboard')
                ->with('activeSection', 'settings')
                ->with('error', 'Invalid super admin user!');
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $admin->id],
            'password' => ['nullable', 'confirmed', Password::defaults()],
            'status' => ['required', 'in:active,inactive'],
        ]);

        // Track changes for activity log
        $changes = [];
        if ($admin->name != $validated['name']) {
            $changes['name'] = ['old' => $admin->name, 'new' => $validated['name']];
        }
        if ($admin->email != $validated['email']) {
            $changes['email'] = ['old' => $admin->email, 'new' => $validated['email']];
        }
        if ($admin->status != $validated['status']) {
            $changes['status'] = ['old' => $admin->status, 'new' => $validated['status']];
        }

        $admin->name = $validated['name'];
        $admin->email = $validated['email'];
        $admin->status = $validated['status'];

        if ($request->filled('password')) {
            $admin->password = Hash::make($validated['password']);
            $changes['password'] = ['old' => '***', 'new' => '*** (changed)'];
        }

        $admin->save();

        // Log the activity
        if (!empty($changes)) {
            ActivityLog::log(
                'updated',
                "Updated super admin: {$admin->name} ({$admin->email})",
                $admin,
                $changes
            );
        }

        return redirect()->route('superadmin.dashboard')
            ->with('activeSection', 'settings')
            ->with('success', 'Super Admin updated successfully!');
    }

    /**
     * Remove the specified super admin.
     */
    public function destroySuperAdmin(User $admin)
    {
        // Ensure we're only deleting superadmins
        if ($admin->role !== 'superadmin') {
            return redirect()->route('superadmin.dashboard')
                ->with('activeSection', 'settings')
                ->with('error', 'Invalid super admin user!');
        }

        // Prevent deleting yourself
        if ($admin->id === auth()->id()) {
            return redirect()->route('superadmin.dashboard')
                ->with('activeSection', 'settings')
                ->with('error', 'You cannot delete yourself!');
        }

        // Log the activity before deletion
        ActivityLog::log(
            'deleted',
            "Deleted super admin: {$admin->name} ({$admin->email})",
            $admin
        );

        $admin->delete();

        return redirect()->route('superadmin.dashboard')
            ->with('activeSection', 'settings')
            ->with('success', 'Super Admin deleted successfully!');
    }
}
