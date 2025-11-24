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
                <form action="{{ route('superadmin.settings.siteInfo.update') }}" method="POST">
                    @csrf
                    <div class="bg-gray-50 rounded-lg p-6 mb-6">
                        <h4 class="text-md font-semibold text-gray-800 mb-4">Site Information</h4>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Site Name</label>
                                <input type="text" name="site_name" value="{{ $settings->site_name ?? 'MyPay' }}" 
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                                <p class="text-xs text-gray-500 mt-1">Displayed in browser title and emails</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">System Name</label>
                                <input type="text" name="system_name" value="{{ $settings->system_name ?? 'MyPay Payment System' }}" 
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                                <p class="text-xs text-gray-500 mt-1">Displayed throughout the system interface</p>
                            </div>
                        </div>
                        <div class="flex justify-end mt-4">
                            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition font-medium">
                                <i class="fas fa-save mr-2"></i>Save Changes
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Branding -->
                <form action="{{ route('superadmin.settings.branding.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="bg-gray-50 rounded-lg p-6 mb-6">
                        <h4 class="text-md font-semibold text-gray-800 mb-4">Branding</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Logo</label>
                                <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-blue-500 transition cursor-pointer">
                                    <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-2"></i>
                                    <p class="text-sm text-gray-600">Click to upload or drag and drop</p>
                                    <p class="text-xs text-gray-500 mt-1">PNG, JPG up to 2MB</p>
                                    <input type="file" name="logo" class="hidden" accept="image/png,image/jpeg">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Favicon</label>
                                <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-blue-500 transition cursor-pointer">
                                    <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-2"></i>
                                    <p class="text-sm text-gray-600">Click to upload or drag and drop</p>
                                    <p class="text-xs text-gray-500 mt-1">ICO, PNG 16x16 or 32x32</p>
                                    <input type="file" name="favicon" class="hidden" accept="image/x-icon,image/png">
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-end mt-4">
                            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition font-medium">
                                <i class="fas fa-save mr-2"></i>Save Changes
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Color Scheme -->
                <form action="{{ route('superadmin.settings.colors.update') }}" method="POST">
                    @csrf
                    <div class="bg-gray-50 rounded-lg p-6 mb-6">
                        <h4 class="text-md font-semibold text-gray-800 mb-4">Color Scheme</h4>
                        
                        <!-- System Color Theme -->
                        <div class="mb-6">
                            <h5 class="text-sm font-semibold text-gray-700 mb-3 uppercase tracking-wide">System Color Theme</h5>
                            <div class="grid grid-cols-3 gap-4">
                                <!-- Main Color -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Main Color</label>
                                    <input type="color" 
                                           name="main_color"
                                           value="{{ $settings->main_color ?? '#1E3A8A' }}"
                                           class="w-full h-12 rounded-lg border-2 border-gray-300 cursor-pointer hover:border-blue-500 transition">
                                </div>

                                <!-- Secondary Color -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Secondary Color</label>
                                    <input type="color" 
                                           name="secondary_color"
                                           value="{{ $settings->secondary_color ?? '#3B82F6' }}"
                                           class="w-full h-12 rounded-lg border-2 border-gray-300 cursor-pointer hover:border-blue-500 transition">
                                </div>

                                <!-- Third Color -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Third Color</label>
                                    <input type="color" 
                                           name="third_color"
                                           value="{{ $settings->third_color ?? '#60A5FA' }}"
                                           class="w-full h-12 rounded-lg border-2 border-gray-300 cursor-pointer hover:border-blue-500 transition">
                                </div>
                            </div>
                        </div>

                        <!-- Content Color Theme -->
                        <div>
                            <h5 class="text-sm font-semibold text-gray-700 mb-3 uppercase tracking-wide">Content Color Theme</h5>
                            <div class="grid grid-cols-3 gap-4">
                                <!-- Title Color -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Title Color</label>
                                    <input type="color" 
                                           name="title_color"
                                           value="{{ $settings->title_color ?? '#1F2937' }}"
                                           class="w-full h-12 rounded-lg border-2 border-gray-300 cursor-pointer hover:border-blue-500 transition">
                                </div>

                                <!-- Sub-Title Color -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Sub-Title Color</label>
                                    <input type="color" 
                                           name="subtitle_color"
                                           value="{{ $settings->subtitle_color ?? '#4B5563' }}"
                                           class="w-full h-12 rounded-lg border-2 border-gray-300 cursor-pointer hover:border-blue-500 transition">
                                </div>

                                <!-- Content Color -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Content Color</label>
                                    <input type="color" 
                                           name="content_color"
                                           value="{{ $settings->content_color ?? '#6B7280' }}"
                                           class="w-full h-12 rounded-lg border-2 border-gray-300 cursor-pointer hover:border-blue-500 transition">
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end mt-6">
                            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition font-medium">
                                <i class="fas fa-save mr-2"></i>Save Changes
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Timezone -->
                <form action="{{ route('superadmin.settings.timezone.update') }}" method="POST">
                    @csrf
                    <div class="bg-gray-50 rounded-lg p-6 mb-6">
                        <h4 class="text-md font-semibold text-gray-800 mb-4">Timezone</h4>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">System Timezone</label>
                            <select name="timezone" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option value="UTC" {{ ($settings->timezone ?? 'UTC') == 'UTC' ? 'selected' : '' }}>UTC (Coordinated Universal Time)</option>
                                <option value="Asia/Kuala_Lumpur" {{ ($settings->timezone ?? '') == 'Asia/Kuala_Lumpur' ? 'selected' : '' }}>Asia/Kuala_Lumpur (UTC+8)</option>
                                <option value="Asia/Singapore" {{ ($settings->timezone ?? '') == 'Asia/Singapore' ? 'selected' : '' }}>Asia/Singapore (UTC+8)</option>
                                <option value="Asia/Jakarta" {{ ($settings->timezone ?? '') == 'Asia/Jakarta' ? 'selected' : '' }}>Asia/Jakarta (UTC+7)</option>
                                <option value="America/New_York" {{ ($settings->timezone ?? '') == 'America/New_York' ? 'selected' : '' }}>America/New_York (UTC-5)</option>
                                <option value="Europe/London" {{ ($settings->timezone ?? '') == 'Europe/London' ? 'selected' : '' }}>Europe/London (UTC+0)</option>
                            </select>
                            <p class="text-xs text-gray-500 mt-1">All timestamps will be displayed in this timezone</p>
                        </div>
                        <div class="flex justify-end mt-4">
                            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition font-medium">
                                <i class="fas fa-save mr-2"></i>Save Changes
                            </button>
                        </div>
                    </div>
                </form>
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
                                    $superAdmins = \App\Models\User::where('role', 'superadmin')->latest()->get();
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
                                        <form action="{{ route('superadmin.superadmins.destroy', $admin) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    onclick="return confirm('Are you sure you want to delete this super admin?')"
                                                    class="text-red-600 hover:text-red-800">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
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
                                @php
                                    $activityLogs = \App\Models\ActivityLog::with('user')
                                        ->latest()
                                        ->limit(50)
                                        ->get();
                                @endphp
                                @forelse($activityLogs as $log)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                        {{ $log->created_at->format('M d, Y H:i:s') }}
                                        <span class="text-xs text-gray-400 block">{{ $log->created_at->diffForHumans() }}</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center mr-2">
                                                <span class="text-blue-600 font-semibold text-xs">{{ substr($log->user->name ?? 'U', 0, 1) }}</span>
                                            </div>
                                            <span class="text-sm font-medium text-gray-900">{{ $log->user->name ?? 'Unknown' }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-3 py-1 text-xs font-medium rounded-full 
                                            @if($log->action === 'created') bg-green-100 text-green-800
                                            @elseif($log->action === 'updated') bg-blue-100 text-blue-800
                                            @elseif($log->action === 'deleted') bg-red-100 text-red-800
                                            @elseif($log->action === 'password_reset') bg-yellow-100 text-yellow-800
                                            @else bg-gray-100 text-gray-800
                                            @endif">
                                            {{ ucfirst(str_replace('_', ' ', $log->action)) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-600">
                                        {{ $log->description }}
                                        @if($log->changes)
                                            <button @click="showChanges = !showChanges" class="text-blue-600 hover:text-blue-800 text-xs ml-2">
                                                <i class="fas fa-info-circle"></i> View Changes
                                            </button>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                        {{ $log->ip_address ?? 'N/A' }}
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                                        <i class="fas fa-history text-4xl mb-4 block text-gray-300"></i>
                                        <p class="text-lg font-medium">No Activity Logs</p>
                                        <p class="text-sm mt-2">Activity logs will appear here when actions are performed</p>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Add Super Admin Modal -->
            @include('superadmin.sections.partials.add-superadmin-modal')

            <!-- Edit Super Admin Modal (reuse admin edit modal but with different route) -->
            <div x-show="showEditModal" x-cloak class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
                <!-- Will implement edit modal separately -->
            </div>

            <!-- Delete Confirmation Modal (reuse admin delete modal) -->
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
