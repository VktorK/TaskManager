<?php

namespace App\Http\Requests\Admin\Task;

use Illuminate\Foundation\Http\FormRequest;

class AdminTaskUpdateRequest extends FormRequest
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
            'title'=>'nullable|string',
            'content'=>'nullable|string',
            'status'=>'nullable|integer',
        ];
    }

    protected function prepareForValidation()
    {
        return $this->merge([
            'is_task_owner' => $this->route('task')->user_id == auth()->id() ? 1 : 0,
        ]);
    }

    protected function passedValidation()
    {
        return $this->merge([
            'title' => $this->year_of_issue,
            'content' => $this->mileage,
            'status' => $this->color,
            'user_id' => $this->user_id = auth()->id(),
        ]);
    }

    public function messages(): array
    {
        return [
            'is_task_owner.in' => 'Вы неявляетесь автором поста, обнавление данных запрещено',
            'title.string' => 'Поле "TITLE" должно быть типа "Строка"',
            'content.string' => 'Поле "пробег" должно быть типа "Строка"',
            'user_id.integer' => 'Поле "идентификатор пользователя" должно быть целочисленным',
        ];
    }
}
