<!DOCTYPE html>
<html>
<head>
    <title>Invoice - {{ $order->kode_invoice }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <style>
        body { padding: 30px; }
    </style>
</head>
<body>

<h3>Invoice Pemesanan Tiket</h3>
<hr>

<p><strong>Kode Invoice:</strong> {{ $order->kode_invoice }}</p>
<p><strong>Nama Penumpang:</strong> {{ $order->nama_penumpang }}</p>
<p><strong>Rute:</strong> {{ $order->rute->kota_asal }} → {{ $order->rute->kota_tujuan }}</p>
<p><strong>Tanggal:</strong> {{ $order->rute->tanggal_berangkat }}</p>
<p><strong>Jumlah Penumpang:</strong> {{ $order->jumlah_penumpang }}</p>
<p><strong>Total Harga:</strong> Rp{{ number_format($order->total_harga) }}</p>

<hr>
<button onclick="window.print()" class="btn btn-primary">Cetak Invoice</button>

</body>
</html>
