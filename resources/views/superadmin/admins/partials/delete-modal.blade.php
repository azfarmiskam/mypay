<!-- Delete Confirmation Modal -->
<div x-show="showDeleteModal" 
     x-cloak
     class="fixed inset-0 z-50 overflow-y-auto"
     style="display: none;">
    <!-- Backdrop -->
    <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" @click="showDeleteModal = false"></div>
    
    <!-- Modal -->
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="relative bg-white rounded-xl shadow-2xl max-w-md w-full p-6" @click.away="showDeleteModal = false">
            <!-- Header -->
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-2xl font-bold text-red-600">
                    <i class="fas fa-exclamation-triangle mr-2"></i>Confirm Delete
                </h3>
                <button @click="showDeleteModal = false" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            <!-- Content -->
            <div class="mb-6">
                <p class="text-gray-700 mb-4">Are you sure you want to delete this admin?</p>
                <div class="bg-gray-50 p-4 rounded-lg">
                    <p class="font-semibold text-gray-900" x-text="deleteAdmin.name"></p>
                    <p class="text-sm text-gray-600" x-text="deleteAdmin.email"></p>
                </div>
                <p class="text-red-600 text-sm mt-4">
                    <i class="fas fa-exclamation-circle mr-1"></i>
                    This action cannot be undone!
                </p>
            </div>

            <!-- Form -->
            <form :action="`{{ route('superadmin.admins.index') }}/${deleteAdmin.id}`" method="POST">
                @csrf
                @method('DELETE')

                <!-- Buttons -->
                <div class="flex space-x-3">
                    <button type="submit" class="flex-1 bg-red-600 text-white py-2 px-4 rounded-lg hover:bg-red-700 transition font-medium">
                        <i class="fas fa-trash mr-2"></i>Yes, Delete
                    </button>
                    <button type="button" @click="showDeleteModal = false" class="flex-1 bg-gray-200 text-gray-700 py-2 px-4 rounded-lg hover:bg-gray-300 transition font-medium">
                        <i class="fas fa-times mr-2"></i>Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
