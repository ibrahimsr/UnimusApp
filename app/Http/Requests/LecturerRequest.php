<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LecturerRequest extends FormRequest
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
            'nip'=> 'required|max:255',
            'nama'=> 'required|max:255',
            'jenis_kelamin'=> 'required|max:255',
            'alamat'=> 'required|max:255',
        ];
    }
}
