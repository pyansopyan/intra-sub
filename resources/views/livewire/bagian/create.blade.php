<div class="container mx-auto mt-4">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Tambah Bagian</h1>

    <!-- Menampilkan pesan sukses jika ada -->
    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="store">
        @csrf
        <!-- Input Nama -->
        <div class="mb-5">
            <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">Nama</label>
            <input id="nama" name="nama" type="text" placeholder="Masukan Nama" autocomplete="off" wire:model="name" required
                   class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm text-gray-900">
            @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Buttons Section -->
        <div class="flex space-x-4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-5 rounded-md transition duration-300">
                Simpan
            </button>
            <button type="reset" class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-5 rounded-md transition duration-300">
                Reset
            </button>
            <a href="{{ route('bagian.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-5 rounded-md transition duration-300">
                Kembali
            </a>
        </div>
    </form>
</div>
