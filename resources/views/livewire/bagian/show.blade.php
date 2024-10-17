<div class="container mx-auto mt-8">
    <h1 class="text-2xl font-bold mb-4 text-gray-800">Detail Bagian</h1>

    <!-- Detail Nama Permission -->
    <p class="text-lg text-gray-700 mb-4">Nama: {{ $bagian->name }}</p>

    <!-- Tombol Kembali -->
    <a href="{{ route('bagian.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded-md transition duration-300">
        Kembali
    </a>
</div>
