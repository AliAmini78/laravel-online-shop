<?php

namespace Web\Auth\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Web\Auth\Rules\StrongPassword;

class RegisterRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "name" => ['required' , 'min:3' , "max:20"],
            "email" => ['required' , 'email' , Rule::unique('users' , 'email')],
            'password' => ['bail' , 'required' , 'min:8', new StrongPassword],
            'password_confirmation' => ['required_with:password' , 'same:password' , 'min:8']
        ];
    }
}
