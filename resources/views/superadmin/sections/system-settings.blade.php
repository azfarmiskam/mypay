<!-- System Settings Section -->
<div class="space-y-6" x-data="{ activeTab: 'generals' }">
    <!-- Section Header -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
        <div class="p-6 border-b border-gray-200">
            <h2 class="text-2xl font-bold text-gray-900">System Settings</h2>
            <p class="text-sm text-gray-600 mt-1">Configure system-wide settings, manage super admins, and customize content</p>
        </div>
        
        <!-- Browser-Style Tabs -->
        <div class="px-6">
            <div class="flex border-b border-gray-200 -mb-px">
                <button 
                    @click="activeTab = 'generals'"
                    :class="activeTab === 'generals' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                    class="py-4 px-6 border-b-2 font-medium text-sm transition-colors">
                    <i class="fas fa-cog mr-2"></i>Generals
                </button>
                <button 
                    @click="activeTab = 'super-admins'"
                    :class="activeTab === 'super-admins' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                    class="py-4 px-6 border-b-2 font-medium text-sm transition-colors">
                    <i class="fas fa-user-shield mr-2"></i>Super Admins
                </button>
                <button 
                    @click="activeTab = 'contents'"
                    :class="activeTab === 'contents' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                    class="py-4 px-6 border-b-2 font-medium text-sm transition-colors">
                    <i class="fas fa-file-alt mr-2"></i>Contents
                </button>
            </div>
        </div>

        <!-- Tab Content: Generals -->
        <div x-show="activeTab === 'generals'" class="p-6">
            <div class="max-w-4xl">
                <h3 class="text-lg font-semibold text-gray-900 mb-6">General Settings</h3>
                
                <!-- Site Information -->
                <div class="bg-gray-50 rounded-lg p-6 mb-6">
                    <h4 class="text-md font-semibold text-gray-800 mb-4">Site Information</h4>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Site Name</label>
                            <input type="text" value="MyPay" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <p class="text-xs text-gray-500 mt-1">Displayed in browser title and emails</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">System Name</label>
                            <input type="text" value="MyPay Payment System" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <p class="text-xs text-gray-500 mt-1">Displayed throughout the system interface</p>
                        </div>
                    </div>
                </div>

                <!-- Branding -->
                <div class="bg-gray-50 rounded-lg p-6 mb-6">
                    <h4 class="text-md font-semibold text-gray-800 mb-4">Branding</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Logo</label>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-blue-500 transition cursor-pointer">
                                <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-2"></i>
                                <p class="text-sm text-gray-600">Click to upload or drag and drop</p>
                                <p class="text-xs text-gray-500 mt-1">PNG, JPG up to 2MB</p>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Favicon</label>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-blue-500 transition cursor-pointer">
                                <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-2"></i>
                                <p class="text-sm text-gray-600">Click to upload or drag and drop</p>
                                <p class="text-xs text-gray-500 mt-1">ICO, PNG 16x16 or 32x32</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Color Scheme -->
                <div class="bg-gray-50 rounded-lg p-6 mb-6">
                    <h4 class="text-md font-semibold text-gray-800 mb-4">Color Scheme</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Title Color</label>
                            <div class="flex items-center gap-3">
                                <input type="color" value="#1F2937" class="h-10 w-20 rounded border border-gray-300 cursor-pointer">
                                <input type="text" value="#1F2937" class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Subtitle Color</label>
                            <div class="flex items-center gap-3">
                                <input type="color" value="#4B5563" class="h-10 w-20 rounded border border-gray-300 cursor-pointer">
                                <input type="text" value="#4B5563" class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Content Color</label>
                            <div class="flex items-center gap-3">
                                <input type="color" value="#6B7280" class="h-10 w-20 rounded border border-gray-300 cursor-pointer">
                                <input type="text" value="#6B7280" class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Primary Color</label>
                            <div class="flex items-center gap-3">
                                <input type="color" value="#1E3A8A" class="h-10 w-20 rounded border border-gray-300 cursor-pointer">
                                <input type="text" value="#1E3A8A" class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Timezone -->
                <div class="bg-gray-50 rounded-lg p-6 mb-6">
                    <h4 class="text-md font-semibold text-gray-800 mb-4">Timezone</h4>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">System Timezone</label>
                        <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option value="UTC">UTC (Coordinated Universal Time)</option>
                            <option value="Asia/Kuala_Lumpur">Asia/Kuala_Lumpur (UTC+8)</option>
                            <option value="Asia/Singapore">Asia/Singapore (UTC+8)</option>
                            <option value="Asia/Jakarta">Asia/Jakarta (UTC+7)</option>
                            <option value="America/New_York">America/New_York (UTC-5)</option>
                            <option value="Europe/London">Europe/London (UTC+0)</option>
                        </select>
                        <p class="text-xs text-gray-500 mt-1">All timestamps will be displayed in this timezone</p>
                    </div>
                </div>

                <!-- Save Button -->
                <div class="flex justify-end">
                    <button class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition font-medium">
                        <i class="fas fa-save mr-2"></i>Save Changes
                    </button>
                </div>
            </div>
        </div>

        <!-- Tab Content: Super Admins -->
        <div x-show="activeTab === 'super-admins'" class="p-6" x-data="{ showAddModal: false, showEditModal: false, showDeleteModal: false, editAdmin: null, deleteAdmin: null }">
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Super Admins Management</h3>
                
                <!-- Search and Add Button -->
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
                    <!-- Search Bar -->
                    <div class="flex-1 max-w-md">
                        <div class="relative">
                            <input type="text" 
                                   x-model="adminSearch"
                                   placeholder="Search by name or email..." 
                                   class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                        </div>
                    </div>

                    <!-- Add Super Admin Button -->
                    <button @click="showAddModal = true" 
                            class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition font-medium">
                        <i class="fas fa-plus mr-2"></i>Add Super Admin
                    </button>
                </div>

                <!-- Super Admins List -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden mb-6">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50 border-b border-gray-200">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Last Login</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @php
                                    $superAdmins = \App\Models\User::where('role', 'superadmin')->orWhere('role', 'admin')->latest()->get();
                                @endphp
                                @forelse($superAdmins as $admin)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center mr-3">
                                                <span class="text-blue-600 font-semibold">{{ substr($admin->name, 0, 1) }}</span>
                                            </div>
                                            <span class="font-medium text-gray-900">{{ $admin->name }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $admin->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-3 py-1 text-xs font-medium rounded-full 
                                            {{ $admin->role === 'superadmin' ? 'bg-purple-100 text-purple-800' : 'bg-blue-100 text-blue-800' }}">
                                            {{ ucfirst($admin->role) }}
                                        </span>
                                    </td>
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
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <button @click="editAdmin = {{ $admin->toJson() }}; showEditModal = true" 
                                                class="text-blue-600 hover:text-blue-800 mr-3">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                        <button @click="deleteAdmin = {{ $admin->toJson() }}; showDeleteModal = true" 
                                                class="text-red-600 hover:text-red-800">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                                        <i class="fas fa-user-shield text-4xl mb-4 block text-gray-300"></i>
                                        <p>No super admins found</p>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Activity Logs Section -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <div class="p-6 border-b border-gray-200">
                        <h4 class="text-md font-semibold text-gray-800">Activity Logs</h4>
                        <p class="text-sm text-gray-600 mt-1">Recent super admin activities</p>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50 border-b border-gray-200">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Timestamp</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Admin</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Details</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">IP Address</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                                        <i class="fas fa-history text-4xl mb-4 block text-gray-300"></i>
                                        <p class="text-lg font-medium">Activity Logs</p>
                                        <p class="text-sm mt-2">Activity logging will be implemented soon</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Add Super Admin Modal -->
            @include('superadmin.admins.partials.add-modal')

            <!-- Edit Super Admin Modal -->
            @include('superadmin.admins.partials.edit-modal')

            <!-- Delete Confirmation Modal -->
            @include('superadmin.admins.partials.delete-modal')
        </div>

        <!-- Tab Content: Contents -->
        <div x-show="activeTab === 'contents'" class="p-6">
            <div class="text-center py-12 text-gray-500">
                <i class="fas fa-file-alt text-4xl mb-4 block text-gray-300"></i>
                <p class="text-lg font-medium">Content Management</p>
                <p class="text-sm mt-2">This feature will be implemented soon</p>
            </div>
        </div>
    </div>
</div>
