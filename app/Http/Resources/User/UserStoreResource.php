<?php

namespace App\Http\Resources\User;


use App\Http\Resources\Profile\UserProfileResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserStoreResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'id'=> $this -> id,
            'name' => $this -> name,
            'email' => $this -> email,
            'access_token' => $this -> access_token,
            'profile' => UserProfileResource::make($this->profile)->resolve()
        ];
    }
}
