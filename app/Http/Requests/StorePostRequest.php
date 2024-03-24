<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'kategori_kode' => 'required',
        'kategori_nama' => 'required',
        'nama' => 'required',
        'level_id' => 'required',
        'username' => 'required',
        'password' => 'required',
        'level_kode' => 'required',
        'level_nama' => 'required',
        ];
    }
    

}
