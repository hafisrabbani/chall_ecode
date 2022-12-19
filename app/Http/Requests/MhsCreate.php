<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MhsCreate extends FormRequest
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
            'nama' => 'required|string|max:255',
            'nim' => 'unique:mahasiswas,nim|required|string|max:255',
            'email' => 'unique:mahasiswas,email|required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'no_hp' => 'max:255',
        ];
    }

    public function response(array $errors)
    {
        return response()->json([
            'status' => 'error',
            'message' => $errors,
        ], 422);
    }

    public function messages()
    {
        return [
            'nama.required' => 'Nama tidak boleh kosong',
            'nim.required' => 'NIM tidak boleh kosong',
            'nim.unique' => 'NIM sudah terdaftar',
            'email.required' => 'Email tidak boleh kosong',
            'email.unique' => 'Email sudah terdaftar',
            'jurusan.required' => 'Jurusan tidak boleh kosong',
        ];
    }
}
