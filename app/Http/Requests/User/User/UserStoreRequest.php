<?php

namespace App\Http\Requests\User\User;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class UserStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'remember_token' => 'nullable|string|max:10',
            'password' => 'required|string|min:6',
            'confirm_password' => 'required|string|min:6|same:password',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',
            'confirm_password.required' => 'Confirm Password is required',
        ];
    }

    protected function passedValidation()
    {
        return $this-> merge([
            'name' => $this-> name,
            'email' => $this-> email,
            'password' => Hash::make($this-> password)
        ]);
    }
}
