<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdatePasswordRequest extends FormRequest
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
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required|same:password|min:6',
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
            'password.required' => ':attribute tidak boleh kosong',
            'password.confirmed' => '',
            'password_confirmation.required' => ':attribute tidak boleh kosong',
            'password_confirmation.same' => ':attribute tidak cocok, silahkan ulangi lagi.',
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
            'password' => 'Password',
            'password_confirmation' => 'Konfirmasi Password',
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
                        ->with(['warning' => 'Silahkan periksa form update password, data gagal di update.']);
        }
    }
}
