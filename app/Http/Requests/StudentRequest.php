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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'IDno' => 'required|unique:students|integer|min:1',
            'name' => 'required|max:255|min:3',
            'age' => 'required|integer|min:1',
            'track_id' => 'required|integer|track_id:students|min:1',        ];
    }
}
