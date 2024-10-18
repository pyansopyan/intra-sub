<div>
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Tambah Bagian
    </h2>

    <!-- Menampilkan pesan sukses jika ada -->
    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="store">
        @csrf
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Nama</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input text-black"
                    placeholder="Masukkan nama bagian" wire:model="name" required />
                @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </label>
        </div>

        <div class="flex space-x-4">
            <a href="{{ route('bagian.index') }}" class="btn btn-md btn-success text-white"><< Back</a>
            <button type="reset" class="btn btn-md btn-warning text-white">Reset</button>
            <button type="submit" class="btn btn-md btn-primary">Save</button>
        </div>
    </form>
</div>
