@extends('layouts.user')

@section('content')
<div class="container">
    <h3 class="mb-4">🧾 Daftar Pesanan Saya</h3>

    @if($pesanan->count() == 0)
        <div class="alert alert-info">
            Anda belum memiliki pesanan. Silakan buat pesanan terlebih dahulu.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Rute</th>
                        <th>Tanggal Berangkat</th>
                        <th>Jumlah Penumpang</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                        <th>Tanggal Pesan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($pesanan as $pesan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <td>
                            <strong>{{ $pesan->rute->kota_asal }} → {{ $pesan->rute->kota_tujuan }}</strong><br>
                            <span class="text-muted">{{ $pesan->rute->jam_berangkat }}</span>
                        </td>

                        <td>{{ \Carbon\Carbon::parse($pesan->rute->tanggal_berangkat)->format('d M Y') }}</td>

                        <td>{{ $pesan->jumlah_penumpang }}</td>

                        <td>Rp {{ number_format($pesan->total_harga, 0, ',', '.') }}</td>

                        <td>
                            @if($pesan->status_pembayaran == 'pending')
                                <span class="badge bg-warning text-dark">Menunggu</span>
                            @elseif($pesan->status_pembayaran == 'menunggu')
                                <span class="badge bg-info">Menunggu Konfirmasi</span>
                            @elseif($pesan->status_pembayaran == 'selesai')
                                <span class="badge bg-success">Selesai</span>
                            @endif
                        </td>

                        <td>{{ $pesan->created_at->format('d M Y H:i') }}</td>

                        <td>
                            @if($pesan->status_pembayaran == 'pending')
                                <a href="{{ route('user.pesanan.lihat', $pesan->id) }}" 
                                    class="btn btn-sm btn-primary">
                                    Upload Bukti Pembayaran
                                </a>
                            @elseif($pesan->status_pembayaran == 'menunggu')
                                <span class="text-secondary">Menunggu konfirmasi admin...</span>
                            @elseif($pesan->status_pembayaran == 'selesai')
                                <a href="{{ route('user.pesanan.invoice', $pesan->id) }}" 
                                    class="btn btn-sm btn-warning" target="_blank">
                                    Cetak Invoice
                                </a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    <a href="{{ route('dashboard') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
