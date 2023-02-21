<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\Admin\UpdateStatus;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Datatables;
use Illuminate\Support\Facades\Mail;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
        if(request()->ajax()){
            $sekolah = DB::table('sekolahs')->where('users_id',Auth::user()->id)->first();
            $siswa = DB::table('siswas')->where('sekolahs_id',$sekolah->id)->get();
            return datatables()->of($siswa)
            ->removeColumn('id')
            ->addIndexColumn()
            ->addColumn('action',function($data){
                $button = "<a class='btn btn-primary btn-sm' id='".$data->id."' onClick='editFunc($data->id)' data-bs-toggle='tooltip' data-bs-placement='top' title='Edit Data Diri Siswa'>
                                <i class='bi bi-pencil-square'></i>
                            </a>";
                $button .= '   ';
                
                $button .= "<a class='btn btn-danger btn-sm' id='".$data->id."' onClick='hapusFunc($data->id)' data-bs-toggle='tooltip' data-bs-placement='top' title='Hapus'>
                                <i class='bi bi-trash'></i>
                            </a>";
                
                $button .= '   ';

                if($data->status == 2){
                    $button .= "<a class='btn btn-success btn-sm disabled' onClick='editStatus($data->id)' id='btnEditStatus' data-bs-toggle='tooltip' data-bs-placement='top' title='Terima'>
                                    <i class='bi bi-check2-circle'></i>
                                </a>";

                }else{
                    $button .= "<a class='btn btn-success btn-sm' onClick='editStatus($data->id)' id='btnEditStatus' data-bs-toggle='tooltip' data-bs-placement='top' title='Terima'>
                                    <i class='bi bi-check2-circle'></i>
                                </a>";

                }

                      
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        return view('user.petugas_sekolah.data-siswa');
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
    public function edit(Request $request)
    {
        $siswa = Siswa::find($request->id);
        return response()->json(['data' => $siswa]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $data = Siswa::find($id);
        $simpan = $data->update($request->all());
        if($simpan){
            return response()->json(['success' => 'Data berhasil diubah']);
        }else{
            return response()->json(['error' => 'Data gagal diubah']);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $data = Siswa::find($id);
        $data->delete();
        return response()->json(['success' => 'Data berhasil dihapus']);
    }

    public  function updateStatus (Request $request)
    {
        $id = $request->id;
        $data = Siswa::find($id);
        $users = Siswa::with(['sekolahs'])->where('id', $id)->first();
        $data->status = 2;
        $data->save();
        //send email
        Mail::to($data->email)->send(new UpdateStatus($users));
        return response()->json(['success' => 'Data berhasil diubah']);
    }
}
