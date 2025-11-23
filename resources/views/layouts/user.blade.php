@extends('layouts.master')

@section('title', 'User Panel')

{{-- Jika ingin CSS tambahan khusus user --}}
@section('custom-css')
@endsection

@section('content')
    @yield('user-content')
@endsection
