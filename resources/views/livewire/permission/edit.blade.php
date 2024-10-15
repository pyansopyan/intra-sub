<div>
    <h1 class="mt-4">Edit Permission</h1>
    <form wire:submit.prevent="update">
        <div class="form-group">
            <label for="nrp" class="block text-sm font-medium leading-6 text-gray-900 mt-1">Nama</label>
             <input id="masukan nama" name="nama" type="text" placeholder="Masukan Nama" autocomplete="Masukan Nama" wire:model="form.nama" required class="block w-full pl-5 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <a href="{{ route('permission.index') }}" class="btn btn-primary mt-4">Update</a>
        <a href="{{ route('permission.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
