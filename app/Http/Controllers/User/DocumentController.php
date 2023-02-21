<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\EditUploadBerkas;
use App\Http\Requests\User\UploadBerkas;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('umkms')->where('users_id',Auth::user()->id)->first();
        $data = DB::table('documents')
                ->where('umkms_id',$users->id)
                ->get();
        if($data->isEmpty()){
            return view('user.umkm.upload-berkas');
        }else{
            return view('user.umkm.edit-upload-berkas', [
                'data' => $data[0],
                'user' => $users
            ]);
        }
        
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
    public function store(UploadBerkas $request)
    {
        // return $request->all();
        $data = $request->all();
        $users = DB::table('umkms')->where('users_id',Auth::user()->id)->first();
        $data['umkms_id'] = $users->id;
        $data['kartu_keluarga'] = $request->file('kartu_keluarga')->store('assets/documents', 'public');
        $data['ktp'] = $request->file('ktp')->store('assets/documents', 'public');
        $data['sku'] = $request->file('sku')->store('assets/documents', 'public');
        $data['tempat'] = $request->file('tempat')->store('assets/documents', 'public');

        
        Document::create($data);
        $request->session()->flash('success', "Berhasil Melakukan Upload Foto");
        return redirect(route('user.document.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(EditUploadBerkas $request, Document $document)
    {
        $data = $request->all();
        if($request->file('kartu_keluarga')){
           $foto = public_path('storage/'.$document->kartu_keluarga);
            if(file_exists($foto)){
                unlink($foto);    
            }
            $data['kartu_keluarga'] = $request->file('kartu_keluarga')->store('assets/documents', 'public');
        }
        if($request->file('akta_kelahiran')){
            $foto = public_path('storage/'.$document->akta_kelahiran);
            if (file_exists($foto)) {
                unlink($foto);
            }
            $data['akta_kelahiran'] = $request->file('akta_kelahiran')->store('assets/documents', 'public');
        }
        if($request->file('ijazah')){
            $foto = public_path('storage/'.$document->ijazah);
            if (file_exists($foto)) {
                unlink($foto);    
            }
            $data['ijazah'] = $request->file('ijazah')->store('assets/documents', 'public');
        }
        if($request->file('rapor')){
            $file = public_path('storage/'.$document->rapor);
            if ($document->rapor) {
                unlink($file);
            }
            $data['rapor'] = $request->file('rapor')->store('assets/documents', 'public');
        }
        $document->update($data);
        $request->session()->flash('success', "Berhasil Melakukan Upload Foto");
        return redirect(route('user.document.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        //
    }
    

}
