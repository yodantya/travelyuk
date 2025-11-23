@extends('layouts.admin')

@section('admin-content')

<h3>Edit Pengguna</h3>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.pengguna.update', $pengguna->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="name" value="{{ $pengguna->name }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="text" name="email" value="{{ $pengguna->email }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Role</label>
        <select name="role" class="form-select">
            <option value="user" {{ $pengguna->role == 'user' ? 'selected' : '' }}>User</option>
            <option value="admin" {{ $pengguna->role == 'admin' ? 'selected' : '' }}>Admin</option>
        </select>
        {{-- <input type="text" name="role" value="{{ $pengguna->role }}" class="form-control" required> --}}
    </div>

    <button class="btn btn-primary">Update</button>
    <a href="{{ route('admin.pengguna.index') }}" class="btn btn-secondary">Kembali</a>
</form>

@endsection
