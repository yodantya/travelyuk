<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pesanan;

class LaporanPesananController extends Controller
{
    public function index()
    {
        $data = Pesanan::with(['rute'])->selectRaw(' rute_id, count(rute_id) as jml ')->groupBy('rute_id')->get();
        return view('admin.laporan.index', compact('data'));
    }

    public function detail($id)
    {
        $data = Pesanan::where('rute_id', $id)->get();
        return view('admin.laporan.detail', compact('data'));
    }
}
