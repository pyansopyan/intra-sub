<div class="container mx-auto">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Tambah Permission
    </h2>

    <!-- Menampilkan pesan sukses jika ada -->
    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="store" enctype="multipart/form-data">
        @csrf
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">Name</label>
            <input id="nama" name="nama" type="text" placeholder="Masukan Nama Permission" autocomplete="off"
                wire:model="name" required
                class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm text-gray-900">
            @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <a href="{{ route('permission.index') }}" class="btn btn-md btn-success text-white">
            << Back </a>
                <button type="submit" class="btn btn-md btn-primary">
                    Save
                </button>
                <button type="reset" class="btn btn-md btn-warning">
                    Reset
                </button>
    </form>
</div>
