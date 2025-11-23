<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ManajemenRute;
use App\Models\Pesanan;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $jumlahBooking = 5;

        $jumlahRute = ManajemenRute::count();
        $jumlahBooking = Pesanan::count();

        return view('admin.dashboard', compact('jumlahRute', 'jumlahBooking'));
    }
}
