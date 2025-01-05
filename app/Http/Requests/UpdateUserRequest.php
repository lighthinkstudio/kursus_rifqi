<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            'username'  => [
                'required',
                Rule::unique('users', 'username')
                    ->ignore($this->route('update_user', $this->id))
            ],
            'email'     => [
                'required',
                Rule::unique('users', 'email')
                    ->ignore($this->route('update_user', $this->id))
            ],
            'role'      => 'required',
            'foto'      => 'file|image|mimes:jpeg,jpg,png,gif,webp|max:2048',
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
            return back()->withInput()
                        ->with(['warning' => 'Silahkan periksa form input, data gagal di update.']);
        }
    }
}
