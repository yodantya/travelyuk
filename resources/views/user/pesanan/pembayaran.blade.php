@extends('layouts.user')

@section('user-content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container">
    <h3>Konfirmasi Pembayaran</h3>

    <div class="card">
        <div class="card-body">

            <form action="{{ route('user.pesanan.pembayaran.upload', $order->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label>Bukti Pembayaran</label>
                    <input type="file" name="bukti_pembayaran" class="form-control" required>
                    <small class="text-muted">Format: JPG, PNG, PDF (max 2MB)</small>
                </div>

                <button type="submit" class="btn btn-primary">Upload</button>
            </form>

        </div>
    </div>
</div>
@endsection
