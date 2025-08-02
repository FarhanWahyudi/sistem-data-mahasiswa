<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CityRequest extends FormRequest
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
            'city' => 'required|string|unique:cities,name'
        ];
    }

    public function messages(): array
    {
        return [
            'city.required' => 'Nama kota wajib diisi',
            'city.string' => 'Nama kota harus berupa teks.',
            'city.unique' => 'Nama kota ini sudah ada.',
        ];
    }
}
