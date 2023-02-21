<?php

namespace App\Http\Requests\petugas_sekolah;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProfileSekolah extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Auth::user()->role == 2){
            return true;
        }
        // return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nsm' => 'required|integer|digits:13',
            'npsn'=> 'required|integer',
            'nama_sekolah' => 'required|string',
            'status_sekolah' => 'required|string'
        ];
    }
}
