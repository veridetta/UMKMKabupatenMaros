<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Umkm;
use Illuminate\Http\Request;
use App\Http\Requests\User\DataAlamat;
use App\Http\Requests\User\Formulir;
use App\Http\Requests\User\Foto;
use App\Models\Document;
use App\Models\Sekolah;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class UmkmController extends Controller
{
    public function index()
    {
        // return Auth::user()->siswas;
        $users = DB::table('umkms')->where('users_id',Auth::user()->id)->first();
        return view('user.umkm.index',[
            'umkm' => $users
        ]);
    }

    public function update(Request $request, Umkm $umkm)
    {
        $id = $request->input('id');
        if($id!=="1000000"){
            $umkm = Umkm::find($id);
            $umkm->updateOrCreate(['id' => $id], $request->all());
        }else{
            $umkm->create( $request->all());
        }
        
        $request->session()->flash('success', "Berhasil Melakukan Update Data");
        return redirect(route('user.umkm.index'));
    }
    public function updatePilihanKecamatan(Request $request, Umkm $umkm)
    {
        $id = $request->input('id');
        if($id){
            $umkm = Umkm::find($id);

            $umkm->updateOrCreate(['id' => $id], $request->all());
        }else{
            $umkm->create($request->all());
        }
        $request->session()->flash('success', "Berhasil Memilih Kecamatan");
        return redirect(route('user.umkm.index'));
    }
    public function updateDataAlamat(DataAlamat $request, Umkm $umkm)
    {
        $id = $request->input('id');
        if($id){
            $umkm = Umkm::find($id);

            $umkm->updateOrCreate(['id' => $id], $request->all());
        }else{
            $umkm->create($request->all());
        }
        $request->session()->flash('success', "Berhasil Melakukan Update Data");
        return redirect(route('user.umkm.index'));
    }
   
    public function uploadFoto(Foto $request,Umkm $umkm)
    {
        // return $request->all();
        if($request->file('foto')){
            if($umkm->foto){
                $fotoDelete = public_path('storage/'.$umkm->foto);
                if(file_exists($fotoDelete)){
                     unlink($fotoDelete);
                }
            }
            $foto['foto'] = $request->file('foto')->store('assets/UserFoto','public');
            $id = $request->input('id');
            if($id){
                $umkm = Umkm::find($id);
                $umkm->updateOrCreate(['id' => $id], ['foto' => $foto['foto'],'status'=>1]);
            }else{
                $umkm->create(['foto' => $foto['foto'],'status'=>1]);
            }
            $request->session()->flash('success', "Berhasil Melakukan Upload Foto");
            return redirect(route('user.umkm.index'));
        }
    
       

    }
    public function indexBerkas()
    {
        return view('user.umkm.upload-berkas');
    }

    public function indexCetak()
    {
        $umkms = DB::table('umkms')->where('users_id', Auth::user()->id)->first();

        return view('user.pdf.users',[
            'umkm' => $umkms
        ]);
        // $pdf = PDF::loadView('user.pdf.users',);
        // return view('user.siswa.download-pdf');
    }
    public function downloadPDF()
    {
        $umkms = DB::table('umkms')->where('users_id', Auth::user()->id)->first();

        $pdf = PDF::loadView('user.pdf.pdf', [
            'umkm' => $umkms
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
       //$users = Um::with(['sekolahs'])->where('users_id', Auth::user()->id)->first();
       $umkms = Umkm::where('users_id', Auth::user()->id)->first();

        $pdf = PDF::loadView('user.pdf.pdf-show', [
            'umkm' => $umkms
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
