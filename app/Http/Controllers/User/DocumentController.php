<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\EditUploadBerkas;
use App\Http\Requests\User\UploadBerkas;
use App\Models\Document;
use App\Models\Umkm;
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
                ->where('umkms_id',Auth::user()->id)
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
    public function edit(Request $request)
    {
        $document = Document::find($request->id);
        return response()->json(['data' => $document]);
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
        $document = Document::find($request->id);
        //dd($document->ktp);
        $data = $request->all();
        if($request->file('kartu_keluarga')){
           $foto = public_path('storage/'.$document->kartu_keluarga);
            if(file_exists($foto)){
                unlink($foto);    
            }
            $data['kartu_keluarga'] = $request->file('kartu_keluarga')->store('assets/documents', 'public');
        }
        if($request->file('ktp')){
            $foto = public_path('storage/'.$document->ktp);
            if (file_exists($foto)) {
                unlink($foto);
            }
            $data['ktp'] = $request->file('ktp')->store('assets/documents', 'public');
        }
        if($request->file('sku')){
            $foto = public_path('storage/'.$document->sku);
            if (file_exists($foto)) {
                unlink($foto);    
            }
            $data['sku'] = $request->file('sku')->store('assets/documents', 'public');
        }
        if($request->file('tempat')){
            $file = public_path('storage/'.$document->tempat);
            if ($document->tempat) {
                unlink($file);
            }
            $data['tempat'] = $request->file('tempat')->store('assets/documents', 'public');
        }
        $document->update($data);
        $request->session()->flash('success', "Berhasil Melakukan Upload Foto");
        //return redirect(route('user.umkm.index-document'));
        return response()->json(['success' => 'Data berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $data = Document::find($id);
        $fotoKK = public_path('storage/'.$data->kartu_keluarga);
        unlink($fotoKK);    
        $fotoKtp = public_path('storage/'.$data->ktp);
        unlink($fotoKtp);    
        $fotoSku = public_path('storage/'.$data->sku);
        unlink($fotoSku); 
        $fotoTempat = public_path('storage/'.$data->tempat);
        unlink($fotoTempat); 
        
        $data->delete();
        return response()->json(['success' => 'Data berhasil dihapus']);
    }
    public function downloadAll(){
        $users = DB::table('umkms')->where('users_id',Auth::user()->id)->first();
        $data = Document::where('umkms_id','=',$users->id)->with(['umkms'])->get();
        foreach($data as $row){
            #dd($row->umkms->users_id);
            if($row->umkms->users_id){
                $document = Document::find($row->id);
                $file = public_path('storage/'.$document->ktp);
                return response()->download($file);
            }
        }
    }
    public function downloadTempat($id)
    {
        $document = Document::find($id);
        $file = public_path('storage/'.$document->tempat);
        return response()->download($file);
    }
    public function downloadKk($id)
    {
        $document = Document::find($id);
        $file = public_path('storage/'.$document->kartu_keluarga);
        return response()->download($file);
    }
    public function downloadKtp($id)
    {
        $document = Document::find($id);
        $file = public_path('storage/'.$document->ktp);
        return response()->download($file);
    }
    public function downloadSku($id)
    {
        $document = Document::find($id);
        $file = public_path('storage/'.$document->sku);
        return response()->download($file);
    }
    public function dataBerkas()
    {
        // $data = Si::all();
        // $users = DB::table('siswas')->where('sekolah_id',Auth::user()->id)->first();
        // $data = Document::with(['siswas' => function($query){
        //     $query->where('sekolah_id',Auth::user()->id);
        // }])->get();
        // $data = Document::with(['siswas'])->get();
        // return $data[0]->siswas->nik;

        if(Request()->ajax()){
            $users = DB::table('umkms')->where('users_id',Auth::user()->id)->first();
            $data = Document::where('umkms_id','=',$users->id)->with(['umkms'])->get();
            $data_new = array();
            foreach($data as $row){
                #dd($row->umkms->users_id);
                if($row->umkms->users_id){
                    array_push($data_new,$row);
                }
            }
            // return $data_new;
             return datatables()->of($data_new)
                ->removeColumn('id')
                ->addIndexColumn()
                ->addColumn('nama_pemilik',function($data){
                    return $data->umkms->nama_pemilik;
                })
                ->addColumn('nama_usaha',function($data){
                    return $data->umkms->nama_usaha;
                })
                ->addColumn('download_kartu_keluarga',function($data){
                    //download
                    // {{asset('storage/'.$siswa->foto)}}
                    $button = "<a href='".route('user.umkm.download_kk',$data->id)."' class='btn btn-primary btn-sm' data-bs-toggle='tooltip' data-bs-placement='top' title='Download'>
                                <i class='bi bi-download'></i> Download
                                </a>";
                   
                    return $button;
                })
                ->addColumn('download_ktp',function($data){
                    //download
                    // {{asset('storage/'.$siswa->foto)}}
                    $button = "<a href='".route('user.umkm.download_ktp',$data->id)."' class='btn btn-primary btn-sm' data-bs-toggle='tooltip' data-bs-placement='top' title='Download'>
                                <i class='bi bi-download'></i> Download
                                </a>";
                   
                    return $button;
                })
                ->addColumn('download_tempat',function($data){
                    //download
                    // {{asset('storage/'.$siswa->foto)}}
                    $button = "<a href='".route('user.umkm.download_tempat',$data->id)."' class='btn btn-primary btn-sm' data-bs-toggle='tooltip' data-bs-placement='top' title='Download'>
                                <i class='bi bi-download'></i> Download
                                </a>";
                   
                    return $button;
                })
                ->addColumn('download_sku',function($data){
                    if($data->sku){
                        $button = "<a href='".route('user.umkm.download_sku',$data->id)."' class='btn btn-primary btn-sm' data-bs-toggle='tooltip' data-bs-placement='top' title='Download'>
                                    <i class='bi bi-download'></i> Download
                                    </a>";
                    }else{
                         $button = "<a href='#' class='btn btn-primary btn-sm disabled' data-bs-toggle='tooltip' data-bs-placement='top' title='Download'>
                                    <i class='bi bi-download'></i> Download
                                    </a>";
                    }
                   
                    return $button;
                })
                ->addColumn('action',function($data){
                    $button = "<a class='btn btn-primary btn-sm' onClick='editFunc($data->id)' data-bs-toggle='tooltip' data-bs-placement='top' title='Edit Data Diri Siswa'>
                                    <i class='bi bi-pencil-square'></i>
                                </a>";
                    $button .= '       ';
                    
                    $button .= "<a class='btn btn-danger btn-sm' onClick='hapusFunc($data->id)' data-bs-toggle='tooltip' data-bs-placement='top' title='Hapus'>
                                    <i class='bi bi-trash'></i>
                                </a>";
                    
                    return $button;
                })
                ->rawColumns(['nama_pemilik','nama_usaha','download_kartu_keluarga','download_ktp','download_tempat','download_sku','action'])
                ->make(true);
        }
        return view(('user.umkm.index-document'));
    }
}
