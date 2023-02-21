<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\petugas_sekolah\ProfileSekolah;
use App\Models\Sekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class SekolahController extends Controller
{

    public function index()
    {
        $sekolah = DB::table('sekolahs')->where('users_id', Auth::user()->id)->first();
       
        return view('user.petugas_sekolah.index',[
            'sekolah' => $sekolah
        ]);
        
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    
    public function show(Sekolah $sekolah)
    {
        //
    }

   
    public function edit(Sekolah $sekolah)
    {
        //
    }

   
    public function update(ProfileSekolah $request, Sekolah $sekolah)
    {
        $sekolah->update($request->all());
        $request->session()->flash('success', "Berhasil Melakukan Update Data Sekolah");
        return redirect(route('admin.sekolah.index'));
    }

    public function destroy(Sekolah $sekolah)
    {
        //
    }

    public function alamatLembaga(Request $request, Sekolah $sekolah)
    {
        $sekolah->update($request->all());
        $request->session()->flash('success', "Berhasil Melakukan Update Data Sekolah");
        return redirect(route('admin.sekolah.index'));
    }
}
