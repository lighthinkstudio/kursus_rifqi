<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'nama'      => 'required',
            'username'  => 'required|unique:users',
            'email'     => 'required|unique:users',
            'role'      => 'required',
            'foto'      => 'file|image|mimes:jpeg,jpg,png,gif,webp|max:2048',
            'password'  => 'required',
            'status'    => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nama.required'     => ':attribute tidak boleh kosong',
            'username.required' => ':attribute tidak boleh kosong',
            'username.unique'   => ':attribute sudah digunakan, silahkan ganti dengan yang lain',
            'email.required'    => ':attribute tidak boleh kosong',
            'email.unique'      => ':attribute sudah digunakan, silahkan ganti dengan yang lain',
            'role.required'     => ':attribute harus di pilih',
            'status.required'   => ':attribute harus di pilih',
            'foto.max'          => ':attribute maksimal 2 MB',
            'foto.mimes'        => ':attribute upload harus berekstensi .jpeg, .jpg, .png, .gif dan .webp',
            'foto.image'        => ':attribute upload harus gambar',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'nama'      => 'Nama Lengkap',
            'username'  => 'Username',
            'email'     => 'Email',
            'role'      => 'Role',
            'foto'      => 'Foto',
            'status'    => 'Status'
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        if($validator->fails())
        {
            return redirect()->route('admin.user')
                        ->withInput()
                        ->with(['warning' => 'Silahkan periksa form input, data gagal di simpan.']);
        }
    }
}
