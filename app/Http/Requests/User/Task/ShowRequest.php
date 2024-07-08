<?php

namespace App\Http\Requests\User\Task;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ShowRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'is_task_owner' => 'required|boolean|in:1|exclude',
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
            'is_task_owner.in' => 'Вы неявляетесь собственником "Задания", однавление данных запрещено',
        ];
    }
}
