<?php

namespace App\Http\Requests\User\Task;

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
            'is_task_owner' => 'required|boolean|in:1|exclude',
            'title' => 'nullable|string',
            'content' => 'nullable|string',
            'status' => 'nullable|integer|in:1,2',
            'user_id' => 'nullable|integer'
        ];

    }

    protected function prepareForValidation()
    {
        return $this->merge([
            'is_task_owner' => $this->route('task')->user_id == auth()->id() ? 1 : 0,
        ]);
    }

    public function messages(): array
    {
        return [
            'is_task_owner.in' => 'Вы неявляетесь собственником "Задания", однавление данных запрещено.',
            'title.string' => 'Поле "Описание" должно быть типа "Строка".',
            'content.string' => 'Поле "Контент" должно быть типа "Строка".',
            'status.integer' => 'Поле "Статус" должно быть целочисленным.',
            'user_id.integer' => 'Поле "идентификатор пользователя" должно быть целочисленным.',
            'status.in' => 'Выбранное значение недоступно.'
        ];
    }
}
