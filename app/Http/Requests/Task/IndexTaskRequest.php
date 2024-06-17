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
    public function rules(): array
    {
        return [
          'status'=>'nullable|integer',
          'created_from'=>'nullable|date_format:Y-m-d',
          'created_to'=>'nullable|date_format:Y-m-d',
        ];
    }
}


