@extends('layouts.user')

@section('title', 'Selamat Datang')

@section('content')
<div class="text-center py-5">
    <h1 class="mb-4">Selamat Datang di Travelyuk</h1>
    <p class="lead">Pesan perjalanan Anda dengan mudah dan cepat</p>
</div>

<div class="row g-4">
    @foreach ($rute as $item)
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">

                    <h5 class="fw-bold mb-2">
                        {{ $item->kota_asal }} → {{ $item->kota_tujuan }}
                    </h5>

                    <p class="mb-1">
                        <i class="bi bi-calendar-event"></i>
                        <strong>Tanggal:</strong> {{ date('d M Y', strtotime($item->tanggal_berangkat)) }}
                    </p>

                    <p class="mb-1">
                        <i class="bi bi-clock"></i>
                        <strong>Jam:</strong> {{ $item->jam_berangkat }}
                    </p>

                    <p class="mb-1">
                        <i class="bi bi-cash-stack"></i>
                        <strong>Harga:</strong> Rp {{ number_format($item->harga, 0, ',', '.') }}
                    </p>

                    <p class="mb-3">
                        <i class="bi bi-people"></i>
                        <strong>Kursi:</strong> {{ $item->jumlah_kursi }}
                    </p>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
