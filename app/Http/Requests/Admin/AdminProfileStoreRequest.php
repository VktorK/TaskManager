<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminProfileStoreRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'date_of_birth' => 'required|date',
            'login' => 'required|string',
            'user_id' => 'required|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'Поле First name обязательно для заполнения.',
            'last_name.required' => 'Поле Last name обязательно для заполнения.',
            'date_of_birth.required' => 'Поле Date of birth обязательно для заполнения.',
            'login.required' => 'Поле Login обязательно для заполнения.',
            'user_id.required' => 'Поле User ID обязательно для заполнения.',
            'first_name.string' =>  'Поле First name должно быть типа "Строка".',
            'last_name.string' =>   'Поле Last name должно быть типа "Строка".',
            'date_of_birth.date' => 'Поле Date of birth должно быть типа "Строка".',
            'login.string' =>       'Поле Login должно быть типа "Строка".',
            'user_id.integer' =>       'Поле Login должно быть типа "Число".',
        ];
    }
}
