<?php

namespace App\Http\Controllers\AdminKab;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;

class AdminKabDashboard extends Controller
{
    public function index()
    {
        $siswa = Siswa::all()->count();
        return view('user.admin_kab.dashboard',[
            'siswa' => $siswa
        ]);
    }
}
