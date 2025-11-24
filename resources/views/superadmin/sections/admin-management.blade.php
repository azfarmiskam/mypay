<!-- Admin Management Section -->
<div class="space-y-6">
    <!-- Section Header with Tabs -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <h2 class="text-2xl font-bold text-gray-900 mb-4">Admin Management</h2>
        
        <!-- Tabs (for future use) -->
        <div class="border-b border-gray-200 mb-6">
            <nav class="-mb-px flex space-x-8">
                <button class="border-b-2 border-blue-500 py-4 px-1 text-sm font-medium text-blue-600">
                    All Admins
                </button>
                <!-- Add more tabs here later -->
            </nav>
        </div>

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
    </div>
</div>
