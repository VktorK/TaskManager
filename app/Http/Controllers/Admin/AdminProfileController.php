<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminProfileStoreRequest;
use App\Http\Requests\Admin\AdminProfileUpdateRequest;
use App\Http\Resources\Admin\AdminProfileResource;
use App\Models\Profile;
use App\Services\Admin\AdminProfileService;
use Illuminate\Http\JsonResponse;


class AdminProfileController extends Controller
{
    public function index(): array
    {
        $profile = AdminProfileService::index();
        return AdminProfileResource::collection($profile)->resolve();
    }

    public function create()
    {
       //
    }

    public function store(AdminProfileStoreRequest $request): array
    {
        $data = $request->validated();
        $profile = AdminProfileService::store($data);
        return AdminProfileResource::make($profile)->resolve();

    }


    public function show(Profile $profile): array
    {

        return AdminProfileResource::make($profile)->resolve();
    }

    public function edit()
    {
        //
    }

    public function update(AdminProfileUpdateRequest $request, Profile $profile): array
    {

        $data = $request->validated();

        $profile = AdminProfileService::update($profile, $data);
        return AdminProfileResource::make($profile)->resolve();
    }

    public function destroy(Profile $profile): JsonResponse
    {
        AdminProfileService::destroy($profile);
        return response()->json([
            'message' => 'Profile deleted'
        ]);
    }
}
