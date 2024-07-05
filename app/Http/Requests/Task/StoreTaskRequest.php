<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {

        return [
            'title' => 'required|string',
            'content' => 'required|string',
            'user_id' => 'required|integer'
        ];
    }


    public function messages(): array
    {
        return [
            'title.required' =>    'Поле title обязательно для заполнения',
            'content.required' => 'Поле content обязательно для заполнения',
            'title.string' => 'Поле title должно быть типа "Строка"',
            'content.string'=>  'Поле content должно быть типа "Строка"',
            'user_id.required' => 'Поле user_id обязательно для заполнения',
            'user.integer'=>  'Поле content должно быть типа "Число"',
        ];
    }
}
