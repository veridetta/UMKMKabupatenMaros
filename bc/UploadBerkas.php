<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UploadBerkas extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'kartu_keluarga' => 'image|required|mimes:jpeg,png,jpg|max:5120',
            'akta_kelahiran' => 'image|required|mimes:jpeg,png,jp|max:5120',
            'ijazah' => 'image|required|mimes:jpeg,png,jpg|max:5120',
            'rapor' => 'required|mimes:pdf|max:5120',
        ];
    }
}
