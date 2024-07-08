<?php

namespace App\Http\Requests\User\Profile;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateProfileRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'nullable|string',
            'last_name' => 'nullable|string',
            'date_of_birth' => 'nullable|date',
            'login' => 'nullable|string',
            'user_id'=> 'required|integer',
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'user_id' => $this->user()->id
        ]);
    }

    public function messages(): array
    {
        return [
            'first_name.string' => 'First name должно быть типа "Строка".',
            'last_name.string' => 'Last name должно быть типа "Строка".',
            'date_of_birth.date' => 'Date of birth должно быть типа "Дата".',
        ];
    }
}
