<div>
    <h2>Edit Role</h2>

    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <form wire:submit="update">
        <div class="form-group">
            <label for="name">Role Name</label>
            <input type="text" wire:model="name" class="form-control" id="name" required>
        </div>

        <h4>Permissions</h4>
        @foreach($permissions as $permission)
            <div class="form-check">
                <input type="checkbox" class="form-check-input"
                       wire:model="Getpermissions"
                       value="{{ $permission->id }}"
                       id="permission-{{ $permission->id }}"
                       {{ in_array($permission->id, $Getpermissions) ? 'checked' : '' }}>
                <label class="form-check-label" for="permission-{{ $permission->id }}">
                    {{ $permission->name }}
                </label>
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary">Update Role</button>
    </form>
</div>
