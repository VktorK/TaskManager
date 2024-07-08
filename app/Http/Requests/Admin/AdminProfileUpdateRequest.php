<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminProfileUpdateRequest extends FormRequest
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
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.string' =>  'Поле First name должно быть типа "Строка".',
            'last_name.string' =>   'Поле Last name должно быть типа "Строка".',
            'date_of_birth.date' => 'Поле Date of birth должно быть типа "Строка".',
            'login.string' =>       'Поле Login должно быть типа "Строка".',
        ];
    }
}
