<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pesanan;

class ManajemenPesananController extends Controller
{
    public function index()
    {
        $pembayaran = Pesanan::where('status_pembayaran', '!=', 'selesai')->get();

        return view('admin.pesanan.index', compact('pembayaran'));
    }

    public function approve($id)
    {
        $order = Pesanan::findOrFail($id);

        $order->status_pembayaran = 'selesai';
        $order->updated_at = now();
        $order->save();

        return back()->with('success', 'Pembayaran berhasil di-approve.');
    }

    public function reject($id)
    {
        $order = Pesanan::findOrFail($id);

        $order->status_pembayaran = 'rejected';
        $order->save();

        return back()->with('success', 'Pembayaran telah ditolak.');
    }
}
