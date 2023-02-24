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
            $data = Document::with(['umkms'])->get();
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
                    $button = "<a href='".route('admin.umkm.download_kk',$data->id)."' class='btn btn-primary btn-sm' data-bs-toggle='tooltip' data-bs-placement='top' title='Download'>
                                <i class='bi bi-download'></i> Download
                                </a>";
                   
                    return $button;
                })
                ->addColumn('download_ktp',function($data){
                    //download
                    // {{asset('storage/'.$siswa->foto)}}
                    $button = "<a href='".route('admin.umkm.download_ktp',$data->id)."' class='btn btn-primary btn-sm' data-bs-toggle='tooltip' data-bs-placement='top' title='Download'>
                                <i class='bi bi-download'></i> Download
                                </a>";
                   
                    return $button;
                })
                ->addColumn('download_tempat',function($data){
                    //download
                    // {{asset('storage/'.$siswa->foto)}}
                    $button = "<a href='".route('admin.umkm.download_tempat',$data->id)."' class='btn btn-primary btn-sm' data-bs-toggle='tooltip' data-bs-placement='top' title='Download'>
                                <i class='bi bi-download'></i> Download
                                </a>";
                   
                    return $button;
                })
                ->addColumn('download_sku',function($data){
                    if($data->sku){
                        $button = "<a href='".route('admin.umkm.download_sku',$data->id)."' class='btn btn-primary btn-sm' data-bs-toggle='tooltip' data-bs-placement='top' title='Download'>
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
        return view(('user.admin.index-document'));
    }

    
    public function edit(Request $request)
    {
        $document = Document::find($request->id);
        return response()->json(['data' => $document]);
    }
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
        if($request->file('ktp')){
            $foto = public_path('storage/'.$document->ktp);
            if (file_exists($foto)) {
                unlink($foto);
            }
            $data['ktp'] = $request->file('ktp')->store('assets/documents', 'public');
        }
        if($request->file('sku')){
            $file = public_path('storage/'.$document->sku);
            if ($document->sku) {
                unlink($file);
            }
            $data['sku'] = $request->file('sku')->store('assets/documents', 'public');
        }
        if($request->file('tempat')){
            $foto = public_path('storage/'.$document->tempat);
            if (file_exists($foto)) {
                unlink($foto);    
            }
            $data['tempat'] = $request->file('tempat')->store('assets/documents', 'public');
        }
        $document->update($data);
        
        return response()->json(['success' => 'Data berhasil diubah']);
        
        
        

    }
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
}
