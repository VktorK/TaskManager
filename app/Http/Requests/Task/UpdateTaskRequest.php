<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {

        return [
            'title' => 'nullable|string',
            'content' => 'nullable|string',
            'status' => 'nullable|integer',
            'user_id' => 'nullable|integer'
        ];

    }

    public function messages(): array
    {
        return [
            'title.string' => 'Поле "Описание" должно быть типа "Строка"',
            'content.string' => 'Поле "Контент" должно быть типа "Строка"',
            'status.integer' => 'Поле "Статус" должно быть целочисленным',
            'user_id.integer' => 'Поле "идентификатор пользователя" должно быть целочисленным',
        ];
    }
}
