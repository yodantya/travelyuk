@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('admin-content')
    <h2>Dashboard Admin</h2>

    <div class="row mt-4">
        <div class="col-md-4">
            <div class="small-box bg-primary p-3 text-white rounded">
                <h3>{{ $jumlahRute ?? 0 }}</h3>
                <p>Total Rute</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="small-box bg-success p-3 text-white rounded">
                <h3>{{ $jumlahBooking ?? 0 }}</h3>
                <p>Total Booking</p>
            </div>
        </div>
    </div>
@endsection
