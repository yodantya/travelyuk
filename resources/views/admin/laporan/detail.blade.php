@extends('layouts.admin')

@section('admin-content')
<div class="container">
    <h3 class="mb-4">🧾 Detail Pesanan</h3>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Rute</th>
                    <th>Tanggal Berangkat</th>
                    <th>Nama Penumpang</th>
                    <th>Nomor Hp</th>
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
                    <td>{{ $item->nama_penumpang }}</td>
                    <td>{{ $item->no_hp }} </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <a href="{{ route('admin.laporan') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
