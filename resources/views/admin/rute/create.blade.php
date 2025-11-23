@extends('layouts.admin')

@section('admin-content')

<h3>Tambah Rute</h3>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.rute.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Kota Asal</label>
        <input type="text" name="kota_asal" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Kota Tujuan</label>
        <input type="text" name="kota_tujuan" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Tanggal Berangkat</label>
        <input type="date" name="tanggal_berangkat" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Jam Berangkat</label>
        <input type="time" name="jam_berangkat" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Harga</label>
        <input type="number" name="harga" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Jumlah Kursi</label>
        <input type="number" name="jumlah_kursi" class="form-control" required>
    </div>

    <button class="btn btn-primary">Simpan</button>
    <a href="{{ route('admin.rute.index') }}" class="btn btn-secondary">Kembali</a>
</form>

@endsection
