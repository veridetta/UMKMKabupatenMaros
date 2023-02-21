<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\DataAlamat;
use App\Http\Requests\User\Formulir;
use App\Http\Requests\User\Foto;
use App\Models\Document;
use App\Models\Sekolah;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;


class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Auth::user()->siswas;
        $users = DB::table('siswas')->where('users_id',Auth::user()->id)->first();
        $sekolah = Sekolah::all();
        //hapus jalur
        /*
        if($users->jalur == null){
            return view('user.siswa.jalur',[
                'siswa' => $users,
            ]);
        }else{
            return view('user.siswa.index',[
                'siswa' => $users,
                'sekolah' => $sekolah
            ]);
        }*/
        return view('user.siswa.index',[
            'siswa' => $users,
            'sekolah' => $sekolah
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
      //
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
    {
        $siswa->update($request->all());
        $request->session()->flash('success', "Berhasil Melakukan Update Data");
        return redirect(route('user.siswa.index'));
    }
    public function updatePilihanSekolah(Request $request, Siswa $siswa)
    {
        // return $request->all();
        $siswa->update($request->all());
        $request->session()->flash('success', "Berhasil Memilih Sekolah");
        return redirect(route('user.siswa.index'));
    }
    public function updateDataAlamat(DataAlamat $request, Siswa $siswa)
    {
        $siswa->update($request->all());
        $request->session()->flash('success', "Berhasil Melakukan Update Data");
        return redirect(route('user.siswa.index'));
    }
    public function updateDataOrangTua(Request $request,Siswa $siswa)
    {
        $siswa->update($request->all());
        $request->session()->flash('success', "Berhasil Melakukan Update Data");
        return redirect(route('user.siswa.index'));
    }
    public function uploadFoto(Foto $request,Siswa $siswa)
    {
        // return $request->all();
        if($request->file('foto')){
            if($siswa->foto){
                $fotoDelete = public_path('storage/'.$siswa->foto);
                if(file_exists($fotoDelete)){
                     unlink($fotoDelete);
                }
            }
             $foto['foto'] = $request->file('foto')->store('assets/UserFoto','public');
            $siswa->update(['foto' => $foto['foto'],'status'=>1]);

            $request->session()->flash('success', "Berhasil Melakukan Upload Foto");
            return redirect(route('user.siswa.index'));
        }
    
       

    }
    public function destroy(Siswa $siswa)
    {
        //
    }

    public function indexBerkas()
    {
        return view('user.siswa.upload-berkas');
    }

    public function indexCetak()
    {
        $users = DB::table('siswas')->where('users_id', Auth::user()->id)->first();

        return view('user.pdf.users',[
            'siswa' => $users
        ]);
        // $pdf = PDF::loadView('user.pdf.users',);
        // return view('user.siswa.download-pdf');
    }
    public function downloadPDF()
    {
        $users = DB::table('siswas')->where('users_id', Auth::user()->id)->first();

        $pdf = PDF::loadView('user.pdf.pdf', [
            'siswa' => $users
        ]);
        $pdf->getDomPDF()->setHttpContext(
            stream_context_create([
                'ssl' => [
                    'allow_self_signed' => TRUE,
                    'verify_peer' => FALSE,
                    'verify_peer_name' => FALSE,
                ]
            ])
        );

        return $pdf->download('pendaftaran_peserta.pdf');
    }
    public function showPdf()
    {
        // $users = DB::table('siswas')->where('user_id', Auth::user()->id)->first();
       $users = Siswa::with(['sekolahs'])->where('users_id', Auth::user()->id)->first();


        $pdf = PDF::loadView('user.pdf.pdf-show', [
            'siswa' => $users
        ]);
        $pdf->getDomPDF()->setHttpContext(
            stream_context_create([
                'ssl' => [
                    'allow_self_signed' => TRUE,
                    'verify_peer' => FALSE,
                    'verify_peer_name' => FALSE,
                ]
            ])
        );

        return $pdf->stream();
    }
}
