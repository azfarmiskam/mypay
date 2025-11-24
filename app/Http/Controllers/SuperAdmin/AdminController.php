<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
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

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'admin',
            'status' => 'active',
            'email_verified_at' => now(),
        ]);

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

        $admin->name = $validated['name'];
        $admin->email = $validated['email'];
        $admin->status = $validated['status'];

        if ($request->filled('password')) {
            $admin->password = Hash::make($validated['password']);
        }

        $admin->save();

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

        return redirect()->route('superadmin.dashboard')
            ->with('activeSection', 'admins')
            ->with('success', 'Password reset successfully!')
            ->with('temp_password', $tempPassword)
            ->with('admin_name', $admin->name);
    }
}
