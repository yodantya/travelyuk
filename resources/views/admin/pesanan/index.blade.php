@extends('layouts.admin')

@section('admin-content')
<h3 class="mb-3">Approval Pembayaran</h3>

@if($pembayaran->count() == 0)
        <div class="alert alert-info">
            Belum ada Pesanan.
        </div>
@else
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Invoice</th>
                <th>Nama Pemesan</th>
                <th>Total Harga</th>
                <th>Bukti Pembayaran</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pembayaran as $payment)
            <tr>
                <td>{{ $payment->kode_invoice }}</td>
                <td>{{ $payment->nama_penumpang }}</td>
                <td>Rp {{ number_format($payment->total_harga,0,',','.') }}</td>
                <td>
                    @if ($payment->bukti_pembayaran)
                        <a href="{{ asset('storage/'.$payment->bukti_pembayaran) }}" target="_blank">
                            <img src="{{ asset('storage/'.$payment->bukti_pembayaran) }}" 
                                width="80" class="img-thumbnail">
                        </a>
                    @else
                        <small class="text-danger">Belum upload</small>
                    @endif
                </td>
                <td>
                    <span class="badge bg-warning">{{ $payment->status_pembayaran }}</span>
                </td>
                <td>
                    @if ($payment->status_pembayaran == 'menunggu')
                        <form action="{{ route('admin.pesanan.approve', $payment->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button class="btn btn-success btn-sm"
                                onclick="return confirm('Approve pembayaran ini?')">
                                Setuju
                            </button>
                        </form>

                        <form action="{{ route('admin.pesanan.reject', $payment->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Tolak pembayaran ini?')">
                                Tolak
                            </button>
                        </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif
@endsection
