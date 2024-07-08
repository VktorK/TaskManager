<?php

namespace App\Http\Requests\Admin\Task;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AdminIndexRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title'=> 'nullable|string',
            'content'=> 'nullable|string',
            'status'=>'nullable|integer|in:1,2,3',
            'user_id'=>'nullable|integer',
            'created_from'=>'nullable|date_format:Y-m-d',
            'created_to'=>'nullable|date_format:Y-m-d',
        ];
    }

    public function messages(): array
    {
        return [
            'status.in' => "Указанного значения поля 'Статус' не существует."
        ];
    }
}
