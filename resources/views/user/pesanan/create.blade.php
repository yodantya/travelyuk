@extends('layouts.user')
@section('title', 'Pesan Rute')

@section('content')

<h3 class="fw-bold mb-3">Form Pesanan</h3>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card shadow-sm border-0">
    <div class="card-body">

        <h5 class="mb-3 fw-bold">{{ $rute->kota_asal }} → {{ $rute->kota_tujuan }}</h5>
        <p class="m-0"><strong>Tanggal:</strong> {{ date('d M Y', strtotime($rute->tanggal_berangkat)) }}</p>
        <p class="m-0"><strong>Jam:</strong> {{ $rute->jam_berangkat }}</p>
        <p class="m-0"><strong>Harga per kursi:</strong> Rp {{ number_format($rute->harga, 0, ',', '.') }}</p>

        <hr>

        <form action="{{ route('user.pesanan.store', $rute->id) }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nama Penumpang</label>
                <input type="text" name="nama_penumpang" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Nomor HP</label>
                <input type="text" name="no_hp" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Jumlah Penumpang</label>
                <input type="number" name="jumlah_penumpang" class="form-control" min="1" max="{{ $rute->jumlah_kursi }}" required>
                <small class="text-muted">
                    Sisa kursi: {{ $rute->jumlah_kursi }}
                </small>
            </div>

            <button class="btn btn-primary w-100">Buat Pesanan</button>
        </form>

    </div>
</div>

@endsection
