<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ManajemenRute;

class ManajemenRuteController extends Controller
{
   public function index()
    {
        $data = ManajemenRute::latest()->paginate(10);
        return view('admin.rute.index', compact('data'));
    }

    public function create()
    {
        return view('admin.rute.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kota_asal' => 'required',
            'kota_tujuan' => 'required',
            'tanggal_berangkat' => 'required|date',
            'jam_berangkat' => 'required|date_format:H:i',
            'harga' => 'required|integer',
            'jumlah_kursi' => 'required|integer'
        ]);

        ManajemenRute::create($request->all());

        return redirect()->route('admin.rute.index')->with('success', 'Rute berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $rute = ManajemenRute::findOrFail($id);
        return view('admin.rute.edit', compact('rute'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'kota_asal' => 'required',
            'kota_tujuan' => 'required',
            'tanggal_berangkat' => 'required|date',
            'jam_berangkat' => 'required|date_format:H:i',
            'harga' => 'required|integer',
            'jumlah_kursi' => 'required|integer'
        ]);

        ManajemenRute::findOrFail($id)->update($request->all());

        return redirect()->route('admin.rute.index')->with('success', 'Rute berhasil diperbarui.');
    }

    public function destroy($id)
    {
        ManajemenRute::destroy($id);
        return redirect()->route('admin.rute.index')->with('success', 'Rute berhasil dihapus.');
    }
}
