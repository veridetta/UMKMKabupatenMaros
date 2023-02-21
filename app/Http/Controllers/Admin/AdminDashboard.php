<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Umkm;
use Illuminate\Http\Request;

class AdminDashboard extends Controller
{
    public function index()
    {
        $jumlah_umkm = Umkm::get()->count();
        return view('user.admin.dashboard',['jumlah_umkm'=>$jumlah_umkm]);
    }
}
