<?php

namespace App\Http\Controllers\AdminKab;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        if(Request()->ajax()){
            $data = Document::with(['siswas'])->get();
    
            
            // return $data_new;
             return datatables()->of($data)
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
                    $button = "<a href='".route('admin-kab.siswa.downloadKk',$data->id)."' class='btn btn-primary btn-sm' data-bs-toggle='tooltip' data-bs-placement='top' title='Download'>
                                <i class='bi bi-download'></i> Download
                                </a>";
                   
                    return $button;
                })
                ->addColumn('download_akta_kelahiran',function($data){
                    //download
                    // {{asset('storage/'.$siswa->foto)}}
                    $button = "<a href='".route('admin-kab.siswa.download_akta_kelahiran',$data->id)."' class='btn btn-primary btn-sm' data-bs-toggle='tooltip' data-bs-placement='top' title='Download'>
                                <i class='bi bi-download'></i> Download
                                </a>";
                   
                    return $button;
                })
                ->addColumn('dwonload_ijazah',function($data){
                    //download
                    // {{asset('storage/'.$siswa->foto)}}
                    $button = "<a href='".route('admin-kab.siswa.downloadFile',$data->id)."' class='btn btn-primary btn-sm' data-bs-toggle='tooltip' data-bs-placement='top' title='Download'>
                                <i class='bi bi-download'></i> Download
                                </a>";
                   
                    return $button;
                })
                ->addColumn('download_rapor',function($data){
                    if($data->rapor){
                        $button = "<a href='".route('admin-kab.siswa.download-rapor',$data->id)."' class='btn btn-primary btn-sm' data-bs-toggle='tooltip' data-bs-placement='top' title='Download'>
                                    <i class='bi bi-download'></i> Download
                                    </a>";
                    }else{
                         $button = "<a href='#' class='btn btn-primary btn-sm disabled' data-bs-toggle='tooltip' data-bs-placement='top' title='Download'>
                                    <i class='bi bi-download'></i> Download
                                    </a>";
                    }
                   
                    return $button;
                })
                ->rawColumns(['nama','nisn','download_kartu_keluarga','download_akta_kelahiran','dwonload_ijazah','download_rapor'])
                ->make(true);
        }
        return view(('user.admin_kab.index-document'));
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
    public function update(Request $request, Document $document)
    {
        //
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
