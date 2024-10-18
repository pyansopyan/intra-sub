<div>
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Edit User
    </h2>

    <form wire:submit.prevent="update" enctype="multipart/form-data">
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Name</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input text-black"
                    placeholder="Insert departement name" wire:model="name" />
                @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </label>
        </div>

        <a href="{{ route('departement.index') }}" class="btn btn-md btn-success text-white"><< Back</a>
        <button type="submit" class="btn btn-md btn-primary">Update</button>
    </form>
</div>

