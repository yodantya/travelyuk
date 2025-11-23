<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ManajemenPenggunaController extends Controller
{
     public function index()
    {
        $data = User::latest()->paginate(10);
        return view('admin.pengguna.index', compact('data'));
    }

    public function edit($id)
    {
        $pengguna = User::findOrFail($id);
        return view('admin.pengguna.edit', compact('pengguna'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => 'required|email|max:255|unique:users,email,' . $id . ',id',
            'role' => ['required', 'string', 'max:255'],
        ]);
        // dd($request, $id);

        $user = User::findOrFail($id);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        return redirect()->route('admin.pengguna.index')->with('success', 'Pengguna berhasil diperbarui.');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('admin.pengguna.index')->with('success', 'Pengguna berhasil dihapus.');
    }
}
