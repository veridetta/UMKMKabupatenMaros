<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\Umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboard extends Controller
{
    public function index()
    {
        $umkm = Umkm::where('users_id',Auth::user()->id)->first();
        return view('user.dashboard.index',[
            'umkm' => $umkm
        ]);
    }
}
