<div>
    <h2>Detail Role: {{ $role->name }}</h2>

    <p><strong>Permissions:</strong></p>
    <ul style="list-style-type: none; padding: 0;">
        @if ($role->permissions->isEmpty())
            <li>No Permissions</li>
        @else
            @foreach ($role->permissions as $permission)
                <li style="display: flex; align-items: center; margin-bottom: 5px;">
                    <span style="margin-right: 10px; color: green;">&#10003;</span>
                    {{ $permission->name }}
                </li>
            @endforeach
        @endif
    </ul>

    <a href="{{ route('role.index') }}" class="btn btn-secondary">Kembali</a>
</div>
