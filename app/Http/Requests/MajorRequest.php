<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MajorRequest extends FormRequest
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
            'major' => 'required|string|unique:majors,name'
        ];
    }

    public function messages(): array
    {
        return [
            'major.required' => 'Nama jurusan wajib diisi',
            'major.string' => 'Nama jurusan harus berupa teks.',
            'major.unique' => 'Nama jurusan ini sudah ada.',
        ];
    }
}
