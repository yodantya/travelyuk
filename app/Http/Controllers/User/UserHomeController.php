<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ManajemenRute;

class UserHomeController extends Controller
{
    public function index()
    {
        $rute = ManajemenRute::orderBy('tanggal_berangkat', 'asc')->get();

        return view('user.welcome', compact('rute'));
    }
}
