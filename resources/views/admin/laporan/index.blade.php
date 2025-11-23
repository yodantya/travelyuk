@extends('layouts.admin')

@section('admin-content')
<div class="container">
    <h3 class="mb-4">🧾 Laporan Pesanan</h3>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Rute</th>
                    <th>Tanggal Berangkat</th>
                    <th>Jumlah Penumpang</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <strong>{{ $item->rute->kota_asal }} → {{ $item->rute->kota_tujuan }}</strong><br>
                        <span class="text-muted">{{ $item->rute->jam_berangkat }}</span>
                    </td>
                    <td>{{ \Carbon\Carbon::parse($item->rute->tanggal_berangkat)->format('d M Y') }}</td>
                    <td>{{ $item->jml }} Orang</td>
                    <td><a href="{{ route('admin.laporan.detail', $item->rute_id) }}" 
                            class="btn btn-sm btn-primary">
                            Detail
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
