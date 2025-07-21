<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
        $id = $this->route('student');
        
        return [
            'nim' => 'required|numeric|digits_between:8,11|unique:students,nim,' . $id,
            'name' => 'required|string',
            'birth_date' => 'required|date|before:today',
            'gender' => 'required|in:male,female',
            'major' => 'required|exists:majors,id',
            'kecamatan' => 'required|string',
            'kabupaten' => 'required|string',
            'provinsi' => 'required|string'
        ];
    }

    public function messages(): array
    {
        return [
            'nim.required' => 'NIM wajib diisi.',
            'nim.numeric' => 'NIM harus berupa angka.',
            'nim.digits_between' => 'NIM minimal terdiri dari 8 sampai 11 digit.',
            'nim.unique' => 'NIM ini sudah ada.',

            'name.required' => 'Nama wajib diisi.',
            'name.string' => 'Nama harus berupa teks.',

            'birth_date.required' => 'Tanggal Lahir wajib diisi',
            'birth_date.date' => 'Tanggal Lahir harus berupa tanggal.',
            'birth_date.before' => 'Tanggal Lahir harus sebelum hari ini.',

            'gender.required' => 'Gender wajib diisi.',
            'gender.in' => 'Gender wajib diisi dengan Laki-laki / Perempuan.',

            'major.required' => 'Jurusan wajib diisi.',
            'major.exists' => 'Jurusan wajib diisi dengan data yang tersedia.',

            'kecamatan.required' => 'Kecamatan wajib diisi.',
            'kecamatan.string' => 'Kecamatan harus berupa teks.',

            'kabupaten.required' => 'Kabupaten wajib diisi.',
            'kabupaten.string' => 'Kabupaten harus berupa teks.',

            'provinsi.required' => 'Provinsi wajib diisi.',
            'provinsi.string' => 'Provinsi harus berupa teks.',
        ];
    }
}
