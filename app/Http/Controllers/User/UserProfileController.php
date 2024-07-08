<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Profile\UserStoreProfileRequest;
use App\Http\Requests\User\Profile\UserUpdateProfileRequest;
use App\Http\Resources\Profile\UserProfileResource;
use App\Models\Profile;
use App\Services\User\UserProfileService;


class UserProfileController extends Controller
{
    public function create(): string
    {
        return 'create';
    }

    public function store(UserStoreProfileRequest $request): UserProfileResource
    {
        $data = $request->validated();
        $profile = UserProfileService::store($data);
        return UserProfileResource::make($profile);

    }

    public function show(): array
    {
        $profile = Profile::profileId()->first();
        return UserProfileResource::make($profile)->resolve();
    }

    public function edit(Profile $profile)
    {
        //
    }

    public function update(UserUpdateProfileRequest $request): array
    {
        $data = $request->validated();
        $profile = UserProfileService::update($data);
        return UserProfileResource::make($profile)->resolve();
    }

}
