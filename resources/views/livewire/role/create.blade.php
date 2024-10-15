<div>
    <h2>Tambah Role</h2>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit="store">
        <div class="mb-3">
            <label for="name">Role Name:</label>
            <input type="text" id="name" wire:model="name" class="form-control" placeholder="Masukkan nama role...">
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label>Permissions:</label>
            <div>
                @foreach ($permissions as $permission)
                    <div class="form-check">
                        <input type="checkbox"
                               class="form-check-input"
                               id="permission{{ $permission->id }}"
                               wire:model="Getpermissions"
                               value="{{ $permission->id }}">
                        <label class="form-check-label" for="permission{{ $permission->id }}">
                            {{ $permission->name }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('role.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
