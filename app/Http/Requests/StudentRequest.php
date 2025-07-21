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
}
