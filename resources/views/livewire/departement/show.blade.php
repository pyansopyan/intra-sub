<div>
    <div class="mb-8 md:grid-cols-2 mt-4">
        <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 flex flex-col">
            <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                Edit Bagian
            </h4>
            <form wire:submit.prevent="update">
                <div class="mb-5">
                    <label for="name" class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Nama</span>
                        <input id="name" name="name" type="text" placeholder="Masukan Bagian" autocomplete="off" wire:model="name" required
                               class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input text-black">
                        @error('name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </label>
                </div>
                <div class="flex space-x-4">
                    <button type="submit" class="btn btn-md btn-primary">
                        Update
                    </button>
                    <a href="{{ route('bagian.index') }}" class="btn btn-md btn-success text-white">
                        Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
