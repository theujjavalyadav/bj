<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BusinessRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:businesses,email',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'business_type' => 'required|string|max:255',
            'description' => 'required|string',
        ];
    }
}



// $rules = [
//     'name' => 'required|string|max:255',
//     'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
//     'business_type' => 'required|string|max:255',
//     'description' => 'required|string',
// ];

// if ($this->isMethod('post')) {

//     $rules['logo'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
//     $rules['email'] = 'required|email|unique:businesses,email';
// } else {
//     $businessId = $this->route('Business');
//     $rules['email'] = 'required|email|unique:businesses,email,' . $businessId . ',id';
// }
// return $rules;
// }