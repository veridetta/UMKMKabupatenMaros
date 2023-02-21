<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class Formulir extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check() && Auth::user()->role == '1';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'users_id' => 'required|string',
            'nama_pemilik' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'agama' => 'required|in:Islam,Kristen,Katolik,Hindu,Buddha,Konghucu',
            'kewarganegaraan' => 'required|in:WNI,WNA',
            'kecamatan' =>'required|string',
            'nama_usaha' => 'required|string',
            'jenis_usaha' => 'required|string',
            'nik' => 'required|string|digits:16',
            'nib' => 'required|string',
            'alamat_rumah' => 'required|string',
            'rt_rumah' => 'required|string',
            'rw_rumah' => 'required|string',
            'desa_rumah' => 'required|string',
            'kecamatan_rumah' => 'required|string',
            'kabupaten_rumah' => 'required|string',
            'provinsi_rumah' => 'required|string',
            'kode_pos_rumah' => 'required|string',
            'koordinat_alamat_rumah' => 'nullable|string',
            'alamat_usaha' => 'required|string',
            'rt_usaha' => 'required|string',
            'rw_usaha' => 'required|string',
            'desa_usaha' => 'required|string',
            'kecamatan_usaha' => 'required|string',
            'kabupaten_usaha' => 'required|string',
            'provinsi_usaha' => 'required|string',
            'kode_pos_usaha' => 'required|string',
            'koordinat_alamat_usaha' => 'nullable|string',
            'modal' => 'required|numeric',
            'jumlah_karyawan' => 'required|numeric',
            'tanggal_mulai_usaha' => 'required|date',
            'email' => 'nullable|email',
            'no_hp' => 'nullable|string',
            'foto' => 'nullable|string',
            'status' => 'nullable|integer'
        ];
    }
}
