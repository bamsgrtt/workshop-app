<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        return [
            'name' => 'required|min:3|max:50',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama pegawai wajib diisi!',
            'email.required' => 'Email tidak boleh kosong!',
            'password.confirmed' => 'Konfirmasi kata sandi tidak cocok!'
        ];
    }
}