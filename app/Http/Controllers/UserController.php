<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\User\UserStoreRequest;
use App\Http\Resources\User\UserStoreResource;
use App\Services\User\UserService;


class UserController extends Controller
{
    /**
     * @param UserStoreRequest $request
     * @return array
     */
    public function store(UserStoreRequest $request): array
    {
        $data = $request->validationData();
        $user = UserService::store($data);
        return UserStoreResource::make($user)->resolve();
    }


}
