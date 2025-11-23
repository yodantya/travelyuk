@extends('layouts.admin')

@section('admin-content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Manajemen Rute</h3>
    <a href="{{ route('admin.rute.create') }}" class="btn btn-primary">Tambah Rute</a>
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Asal</th>
            <th>Tujuan</th>
            <th>Tanggal</th>
            <th>Jam</th>
            <th>Harga</th>
            <th>Kursi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    @foreach($data as $r)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $r->kota_asal }}</td>
            <td>{{ $r->kota_tujuan }}</td>
            <td>{{ $r->tanggal_berangkat }}</td>
            <td>{{ $r->jam_berangkat }}</td>
            <td>Rp {{ number_format($r->harga,0,',','.') }}</td>
            <td>{{ $r->jumlah_kursi }}</td>
            <td>
                <a href="{{ route('admin.rute.edit',$r->id) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('admin.rute.destroy',$r->id) }}" method="POST" class="d-inline"
                    onsubmit="return confirm('Hapus rute ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $data->links() }}

@endsection
