@extends('layouts.master')

@section('title', 'Admin Panel')

@section('content')
<div class="row">
    <div class="col-md-3">
        {{-- Sidebar Admin --}}
        @include('layouts.partials.sidebar')

    </div>
    <div class="col-md-9">
        @yield('admin-content')
    </div>
</div>
@endsection
