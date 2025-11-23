@extends('layouts.admin')

@section('admin-content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Manajemen Pengguna</h3>
    {{-- <a href="{{ route('admin.pengguna.create') }}" class="btn btn-primary">Tambah Pengguna</a> --}}
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Role</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    @foreach($data as $r)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $r->name }}</td>
            <td>{{ $r->email }}</td>
            <td>{{ $r->role }}</td>
            <td>
                <a href="{{ route('admin.pengguna.edit',$r->id) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('admin.pengguna.destroy',$r->id) }}" method="POST" class="d-inline"
                    onsubmit="return confirm('Hapus Pengguna ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $data->links() }}

@endsection
