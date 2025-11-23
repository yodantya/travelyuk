<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ManajemenRute;
use App\Models\Pesanan;

class UserPesananController extends Controller
{
    public function index()
    {
        $pesanan = Pesanan::where('user_id', auth()->id())
            ->with('rute') // jika ada relasi ke rute
            ->orderBy('created_at', 'desc')
            ->get();

        return view('user.pesanan.riwayat', compact('pesanan'));
    }

    public function create($id)
    {
        $rute = ManajemenRute::findOrFail($id);
        return view('user.pesanan.create', compact('rute'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'nama_penumpang' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'jumlah_penumpang' => 'required|integer|min:1'
        ]);

        $getrute = ManajemenRute::findOrFail($id);

        if ($request->jumlah_penumpang > $getrute->jumlah_kursi) {
        return redirect()->back()
            ->withInput()
            ->with('error', "Jumlah penumpang melebihi sisa kuota kursi! Sisa kursi: $getrute->jumlah_kursi");
        }

        $totalharga = $getrute->harga * $request->jumlah_penumpang;
        
        Pesanan::create([
            'user_id' => Auth::id(),
            'rute_id' => $id,
            'jumlah_penumpang' => $request->jumlah_penumpang,
            'nama_penumpang' => $request->nama_penumpang,
            'no_hp' => $request->no_hp,
            'total_harga' => $totalharga
        ]);

        $kuota = $getrute->jumlah_kursi - $request->jumlah_penumpang;

        $getrute->update([
            'jumlah_kursi' => $kuota,
        ]);

        return redirect()->route('dashboard')->with('success', 'Pesanan berhasil dibuat!');
    }

    public function lihat($id)
    {
        $order = Pesanan::where('user_id', auth()->id())->findOrFail($id);

        return view('user.pesanan.lihat', compact('order'));
    }

    public function payment($id)
    {
        $order = Pesanan::where('user_id', auth()->id())->findOrFail($id);

        return view('user.pesanan.pembayaran', compact('order'));
    }

    public function uploadPayment(Request $request, $id)
    {
        $request->validate([
            'bukti_pembayaran' => 'required|mimes:jpg,jpeg,png,pdf|max:2048'
        ]);
        
        $order = Pesanan::where('id', $id)->where('user_id', auth()->id())->findOrFail($id);
        
        $filename = time() . '_' . $request->file('bukti_pembayaran')->getClientOriginalName();
        $path = $request->file('bukti_pembayaran')->storeAs('bukti_pembayaran', $filename, 'public');
        
        $order->update([
            'bukti_pembayaran' => $path,
            'status_pembayaran' => 'menunggu',
            'kode_invoice' => $this->generateInvoiceNumber()
        ]);

        return redirect()->route('user.pesanansaya', $id)
            ->with('success', 'Bukti pembayaran berhasil diunggah. Tunggu konfirmasi admin.');
    }

    public function lihatinvoice($id)
    {
        $order = Pesanan::where('user_id', auth()->id())
                      ->where('status_pembayaran', 'selesai')
                      ->findOrFail($id);

        return view('user.pesanan.invoice', compact('order'));
    }

    public function generateInvoiceNumber()
    {
        $today = date('Ymd');

        $lastInvoice = Pesanan::where('created_at', today())
                        ->orderBy('kode_invoice', 'desc')
                        ->first();

        if (!$lastInvoice) {
            $nextNumber = 1;
        } else {
            $lastNumber = (int) substr($lastInvoice->kode_invoice, -3);
            $nextNumber = $lastNumber + 1;
        }

        $nextNumber = str_pad($nextNumber, 3, '0', STR_PAD_LEFT);

        return "INV-$today-$nextNumber";
    }
}
