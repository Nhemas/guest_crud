<?php

namespace App\Http\Requests\Guest;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'first_name' => 'string|max:64',
            'last_name' => 'string|max:64',
            'email' => 'string|email|unique:guests,email|max:64',
            'phone' => 'digits_between:11,15|unique:guests,phone',
            'country' => 'string|nullable|max:64',
        ];
    }

    protected function prepareForValidation()
    {
        if (isset($this->phone))
            $this->merge([
                'phone' => preg_replace('/\D*/', '', $this->phone),
            ]);
    }
}
