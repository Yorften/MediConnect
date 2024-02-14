<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        
        return [
            'inpe' => ['required', 'string', 'max:255'],
            'diploma' => ['required', 'string', 'max:255'],
            'phone_number' => ['required'],
            'speciality_id' => ['required'],
        ];
    }
}
