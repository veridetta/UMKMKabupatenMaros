<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class DataAlamat extends FormRequest
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
        ];
    }
}
