<?php

namespace App\Http\Controllers\AdminKab;

use App\Http\Controllers\Controller;
use App\Models\Sekolah;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()){
            $sekolah = Sekolah::all();
            return datatables()->of($sekolah)
            ->removeColumn('id')
            ->addIndexColumn()
            ->addColumn('action',function($data){
               
                $button = "<a class='btn btn-danger btn-sm'  onClick='hapusFunct($data->users_id)' data-bs-toggle='tooltip' data-bs-placement='top' title='Hapus'>
                                <i class='bi bi-trash'></i>
                            </a>";
                
                $button .= '   ';
                      
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('user.admin_kab.data-sekolah');
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
       $request->validate([       
            'username' => 'required|unique:users,username',
            'password' => 'required|min:8',      
        ]);    
        $user = new User;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->role = 2;
        $user->save();
        if($user){
            return response()->json(['success'=>'Data Berhasil Disimpan']);
        }else{
            return response()->json(['error'=>'Data Gagal Disimpan']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $user)
    {   
        $user = User::find($user->id);
        $user->delete();
        return response()->json(['success'=>'Data Berhasil Dihapus']);
        
    }
}
