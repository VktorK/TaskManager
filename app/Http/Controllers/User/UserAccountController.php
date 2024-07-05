<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\User\UpdateRequest;
use App\Http\Resources\User\UserUpdateResource;
use App\Services\User\UserService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class UserAccountController extends Controller
{
    /**
     * @param UpdateRequest $request
     * @return array
     */
    public function update(UpdateRequest $request): array
    {
        $data = $request->validated();
        $user = UserService::update($data);
        return UserUpdateResource::make($user)->resolve();
    }

    /**
     * @return JsonResponse
     */
    public function destroy(): JsonResponse
    {
        UserService::destroy();
        return response()->json([
            'message' => 'Удалил сам себя'
        ], ResponseAlias::HTTP_OK);
    }
}
