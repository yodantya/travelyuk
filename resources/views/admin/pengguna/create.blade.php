@extends('layouts.admin')

@section('admin-content')

<h3>Tambah Pengguna</h3>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.pengguna.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="text" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Role</label>
        <input type="text" name="tanggal_berangkat" class="form-control" required>
    </div>

    <button class="btn btn-primary">Simpan</button>
    <a href="{{ route('admin.pengguna.index') }}" class="btn btn-secondary">Kembali</a>
</form>

@endsection
