<?php

namespace App\Http\Requests\User\Task;

use Illuminate\Foundation\Http\FormRequest;

class IndexTaskRequest extends FormRequest
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
            'status' => 'nullable|integer|in:1,2,3',
            'user_id' => 'required|integer',
            'created_from' => 'nullable|date_format:Y-m-d',
            'created_to' => 'nullable|date_format:Y-m-d',
        ];


    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'user_id'=> auth()->id()
        ]);
    }

    public function messages(): array
    {
        return [
            'status.in' => "Указанного значения поля 'Статус' не существует."
        ];
    }
}


