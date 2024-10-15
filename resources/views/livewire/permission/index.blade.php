<div>
    <a href="{{ route('permission.create') }}" class="btn btn-primary mt-4" >Tambah Permission</a>

    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($permissions as $permission)
            <tr>
                <td>{{ $permission->name }}</td>
                <td>
                    <a href="{{ route('permission.show', $permission->id) }}" class="btn btn-info">Detail</a>
                    <a href="{{ route('permission.edit', $permission->id) }}" class="btn btn-warning">Edit</a>
                    <a href="{{ route('permission.index', $permission->id) }}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
