@extends('layouts.user')

@section('title', 'Dahsboard')

@section('user-content')
    <h2 class="mb-3 fw-bold">Selamat datang, {{ auth()->user()->name }}!</h2>

    <h4>Daftar Rute Travel</h4>
    <p class="text-muted mb-4">Pilih rute perjalanan terbaik untuk perjalanan Anda.</p>

    @if ($rute->count() == 0)
        <div class="alert alert-info">
            Belum ada rute tersedia. Silakan cek kembali nanti.
        </div>
    @endif

    <div class="row g-4">
        @foreach ($rute as $item)
            @php
                $sisa_kursi = $item->jumlah_kursi;
            @endphp
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

                        <a href="{{ route('user.pesanan', $item->id) }}" class="btn btn-primary w-100  {{ $sisa_kursi == 0 ? 'disabled' : '' }}">
                            {{ $sisa_kursi == 0 ? 'Kuota Habis' : 'Pesan Sekarang' }}
                        </a>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
