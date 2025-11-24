@extends('layouts.admin')

@section('title', 'Admin Management')
@section('page-title', 'Admin Management')
@section('page-description', 'Manage system administrators')

@section('content')
<div x-data="{ 
    showAddModal: false, 
    showEditModal: false, 
    showDeleteModal: false,
    showPasswordModal: false,
    editAdmin: {},
    deleteAdmin: {},
    tempPassword: ''
}">
    <!-- Success/Error Messages -->
    @if(session('success'))
        <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg">
            <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg">
            <i class="fas fa-exclamation-circle mr-2"></i>{{ session('error') }}
        </div>
    @endif

    <!-- Temporary Password Modal -->
    @if(session('temp_password'))
    <div class="mb-6 bg-blue-100 border border-blue-400 text-blue-900 px-6 py-4 rounded-lg">
        <div class="flex items-start">
            <i class="fas fa-key text-2xl mr-4 mt-1"></i>
            <div class="flex-1">
                <h4 class="font-bold text-lg mb-2">Password Reset Successful!</h4>
                <p class="mb-2">New temporary password for <strong>{{ session('admin_name') }}</strong>:</p>
                <div class="bg-white px-4 py-3 rounded border border-blue-300 font-mono text-lg font-bold text-blue-800">
                    {{ session('temp_password') }}
                </div>
                <p class="text-sm mt-2 text-blue-700">
                    <i class="fas fa-info-circle mr-1"></i>
                    Please save this password and share it with the admin. It will not be shown again.
                </p>
            </div>
        </div>
    </div>
    @endif

    <!-- Header with Search and Add Button -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <!-- Search Bar -->
            <form method="GET" action="{{ route('superadmin.admins.index') }}" class="flex-1 max-w-md">
                <div class="relative">
                    <input type="text" 
                           name="search" 
                           value="{{ $search ?? '' }}"
                           placeholder="Search by name or email..." 
                           class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                </div>
            </form>

            <!-- Add Admin Button -->
            <button @click="showAddModal = true" 
                    class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition font-medium">
                <i class="fas fa-plus mr-2"></i>Add Admin
            </button>
        </div>
    </div>

    <!-- Admins Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Last Login</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($admins as $admin)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center mr-3">
                                    @if($admin->avatar)
                                        <img src="{{ asset('storage/' . $admin->avatar) }}" alt="Avatar" class="w-full h-full rounded-full object-cover">
                                    @else
                                        <span class="text-blue-600 font-semibold">{{ substr($admin->name, 0, 1) }}</span>
                                    @endif
                                </div>
                                <span class="font-medium text-gray-900">{{ $admin->name }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $admin->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-3 py-1 text-xs font-medium rounded-full 
                                {{ $admin->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ ucfirst($admin->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                            @if($admin->last_login_at)
                                <span title="{{ $admin->last_login_at->format('M d, Y H:i:s') }}">
                                    {{ $admin->last_login_at->diffForHumans() }}
                                </span>
                            @else
                                <span class="text-gray-400">Never</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $admin->created_at->format('M d, Y') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <button @click="editAdmin = {{ $admin->toJson() }}; showEditModal = true" 
                                    class="text-blue-600 hover:text-blue-800 mr-3">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <form action="{{ route('superadmin.admins.resetPassword', $admin) }}" method="POST" class="inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="text-green-600 hover:text-green-800 mr-3">
                                    <i class="fas fa-key"></i> Reset
                                </button>
                            </form>
                            <button @click="deleteAdmin = {{ $admin->toJson() }}; showDeleteModal = true" 
                                    class="text-red-600 hover:text-red-800">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                            <i class="fas fa-users text-4xl mb-4 block text-gray-300"></i>
                            <p>No admins found</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($admins->hasPages())
        <div class="px-6 py-4 border-t border-gray-200">
            {{ $admins->links() }}
        </div>
        @endif
    </div>

    <!-- Add Admin Modal -->
    @include('superadmin.admins.partials.add-modal')

    <!-- Edit Admin Modal -->
    @include('superadmin.admins.partials.edit-modal')

    <!-- Delete Confirmation Modal -->
    @include('superadmin.admins.partials.delete-modal')
</div>
@endsection
