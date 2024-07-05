<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminUserStoreRequest;
use App\Http\Requests\Admin\AdminUserUpdateRequest;
use App\Http\Resources\Admin\AdminUserResource;
use App\Models\User;
use App\Services\Admin\AdminUserService;
use Illuminate\Http\JsonResponse;

use Symfony\Component\HttpFoundation\Response as ResponseAlias;


class AdminUserController extends Controller
{
    /**
     * @return array
     */
    public function index(): array
        {
            $users = AdminUserService::index();
            return AdminUserResource::collection($users)->resolve();
        }


    /**
     * @param User $user
     * @return array
     */
    public function show(User $user): array
    {
        return AdminUserResource::make($user)->resolve();
    }

    /**
     * @param AdminUserStoreRequest $request
     * @return array
     */
    public function store(AdminUserStoreRequest $request): array
    {
        $data = $request->validated();
        $user = AdminUserService::store($data);
        return AdminUserResource::make($user)->resolve();
    }

    /**
     * @param AdminUserUpdateRequest $request
     * @param User $user
     * @return array
     */
    public function update(AdminUserUpdateRequest $request, User $user): array
    {
        $data = $request->validated();
        $user = AdminUserService::update($data, $user);
        return AdminUserResource::make($user)->resolve();
    }

    /**
     * @param User $user
     * @return JsonResponse
     */
    public function destroy(User $user): JsonResponse
    {
        AdminUserService::destroy($user);
        return response()->json([
           'message' => 'Пользователь удален'
        ], ResponseAlias::HTTP_OK);
    }

}
