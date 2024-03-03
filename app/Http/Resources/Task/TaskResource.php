<?php

namespace App\Http\Resources\Task;

use Illuminate\Database\Query\Builder;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title'=> $this->title,
            'content'=>$this->content,
            'status'=>$this->status,
            "created_at" => $this-> created_at->format('Y-m-d H:i:s'),
            'deleted_at'=>$this->deleted_at->format('Y-m-d H:i:s')


        ];
    }
}
