@extends('layouts.user')

@section('user-content')
<div class="container">
    <h3>Detail Pesanan</h3>

    <div class="card">
        <div class="card-body">
            <p><strong>Rute:</strong> {{ $order->rute->kota_asal }} → {{ $order->rute->kota_tujuan }}</p>
            <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($order->rute->tanggal_berangkat)->format('d M Y') }}</p>
            <p><strong>Status Pembayaran:</strong> 
                <span class="badge bg-info">{{ $order->status_pembayaran }}</span>
            </p>

            @if($order->status_pembayaran === 'pending')
                <a href="{{ route('user.pesanan.pembayaran', $order->id) }}" class="btn btn-primary">
                    Upload Bukti Pembayaran
                </a>
            @endif

            @if($order->status_pembayaran === 'selesai')
                <a href="{{ route('invoice.show', $order->id) }}" class="btn btn-success">
                    Cetak Invoice
                </a>
            @endif
        </div>
    </div>
</div>
@endsection
