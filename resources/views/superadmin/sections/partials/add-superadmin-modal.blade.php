<!-- Add Super Admin Modal -->
<div x-show="showAddModal" 
     x-cloak
     class="fixed inset-0 z-50 overflow-y-auto"
     style="display: none;">
    <!-- Backdrop -->
    <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" @click="showAddModal = false"></div>
    
    <!-- Modal -->
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="relative bg-white rounded-xl shadow-2xl max-w-md w-full p-6" @click.away="showAddModal = false">
            <!-- Header -->
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-2xl font-bold text-gray-900">Add New Super Admin</h3>
                <button @click="showAddModal = false" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            <!-- Form -->
            <form action="{{ route('superadmin.superadmins.store') }}" method="POST">
                @csrf

                <!-- Name -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           required>
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           required>
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <input type="password" name="password" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           required>
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
                    <input type="password" name="password_confirmation" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           required>
                </div>

                <!-- Buttons -->
                <div class="flex space-x-3">
                    <button type="submit" class="flex-1 bg-purple-600 text-white py-2 px-4 rounded-lg hover:bg-purple-700 transition font-medium">
                        <i class="fas fa-user-shield mr-2"></i>Add Super Admin
                    </button>
                    <button type="button" @click="showAddModal = false" class="flex-1 bg-gray-200 text-gray-700 py-2 px-4 rounded-lg hover:bg-gray-300 transition font-medium">
                        <i class="fas fa-times mr-2"></i>Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
