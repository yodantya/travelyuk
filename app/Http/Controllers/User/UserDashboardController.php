<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ManajemenRute;
use App\Models\Pesanan;

class UserDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $rute = ManajemenRute::get();
        // dd($rute);
        return view('user.dashboard', compact('rute'));
    }
}
