<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\EditUploadBerkas;
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
        // $data = Si::all();
        // $users = DB::table('siswas')->where('sekolah_id',Auth::user()->id)->first();
        // $data = Document::with(['siswas' => function($query){
        //     $query->where('sekolah_id',Auth::user()->id);
        // }])->get();
        // $data = Document::with(['siswas'])->get();
        // return $data[0]->siswas->nik;

        if(Request()->ajax()){
            $data = Document::with(['siswas'])->get();
            $data_new = array();
    
            foreach($data as $row){
                if($row->siswas->sekolahs_id == Auth::user()->id){
                    array_push($data_new,$row);
                }
            }
            // return $data_new;
             return datatables()->of($data_new)
                ->removeColumn('id')
                ->addIndexColumn()
                ->addColumn('nama',function($data){
                    return $data->siswas->nama_lengkap;
                })
                ->addColumn('nisn',function($data){
                    return $data->siswas->nisn;
                })
                ->addColumn('download_kartu_keluarga',function($data){
                    //download
                    // {{asset('storage/'.$siswa->foto)}}
                    $button = "<a href='".route('admin.siswa.downloadKk',$data->id)."' class='btn btn-primary btn-sm' data-bs-toggle='tooltip' data-bs-placement='top' title='Download'>
                                <i class='bi bi-download'></i> Download
                                </a>";
                   
                    return $button;
                })
                ->addColumn('download_akta_kelahiran',function($data){
                    //download
                    // {{asset('storage/'.$siswa->foto)}}
                    $button = "<a href='".route('admin.siswa.download_akta_kelahiran',$data->id)."' class='btn btn-primary btn-sm' data-bs-toggle='tooltip' data-bs-placement='top' title='Download'>
                                <i class='bi bi-download'></i> Download
                                </a>";
                   
                    return $button;
                })
                ->addColumn('dwonload_ijazah',function($data){
                    //download
                    // {{asset('storage/'.$siswa->foto)}}
                    $button = "<a href='".route('admin.siswa.downloadFile',$data->id)."' class='btn btn-primary btn-sm' data-bs-toggle='tooltip' data-bs-placement='top' title='Download'>
                                <i class='bi bi-download'></i> Download
                                </a>";
                   
                    return $button;
                })
                ->addColumn('download_rapor',function($data){
                    if($data->rapor){
                        $button = "<a href='".route('admin.siswa.download-rapor',$data->id)."' class='btn btn-primary btn-sm' data-bs-toggle='tooltip' data-bs-placement='top' title='Download'>
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
                ->rawColumns(['nama','nisn','download_kartu_keluarga','download_akta_kelahiran','dwonload_ijazah','download_rapor','action'])
                ->make(true);
        }
        return view(('user.petugas_sekolah.index-document'));
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
        //
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
    public function update(EditUploadBerkas $request)
    {
        $document = Document::find($request->id); 
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
        $fotoAkte = public_path('storage/'.$data->akta_kelahiran);
        unlink($fotoAkte);    
        $fotoIjazah = public_path('storage/'.$data->ijazah);
        unlink($fotoIjazah); 
        
        if ($data->kartu_indonesia_pintar) {
            $fotoKIP = public_path('storage/'.$data->kartu_indonesia_pintar);
            unlink($fotoKIP);
        }
        $data->delete();
        return response()->json(['success' => 'Data berhasil dihapus']);
    }
    public function downloadFile($id)
    {
        $document = Document::find($id);
        $file = public_path('storage/'.$document->ijazah);
        return response()->download($file);
    }
    public function downloadKk($id)
    {
        $document = Document::find($id);
        $file = public_path('storage/'.$document->kartu_keluarga);
        return response()->download($file);
    }
    public function download_akta_kelahiran($id)
    {
        $document = Document::find($id);
        $file = public_path('storage/'.$document->akta_kelahiran);
        return response()->download($file);
    }
    public function downloadRapor($id)
    {
        $document = Document::find($id);
        $file = public_path('storage/'.$document->rapor);
        return response()->download($file);
    }
}
