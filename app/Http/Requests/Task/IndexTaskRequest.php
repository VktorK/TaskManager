<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class IndexTaskRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
          'title'=>'nullable|string',
          'content'=>'nullable|string',
          'status'=>'nullable|integer',
          'created_at'=>'nullable|date',
          'deleted_at'=>'nullable|date'
        ];
    }
}

