<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocationRequest extends FormRequest
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
        $rules = [
            'city'        => 'required|string|max:100',
            'state'       => 'required|string|max:100',
            'zip_code'    => 'required|string|max:10',
            'country'     => 'required|string|max:100',
        ];
        
        // Additional rules for "store" method
        if ($this->isMethod('post')) {
            $rules['business_id'] = 'required|integer|exists:businesses,id';
            $rules['address'] = 'required|string|max:255';
        }
        
        return $rules;
    }
}

