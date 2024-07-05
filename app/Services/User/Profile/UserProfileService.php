<?php

namespace App\Services\User\Profile;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Collection;

class UserProfileService
{

    public static function index(): Collection
    {
        return Profile::where('user_id', auth()->id());
    }

    public static function store(array $data): Profile
    {

        return Profile::create($data);
    }

    public static function update( array $data): Profile
    {
        $profile = Profile::profileId()->first();
        $profile->update($data);
        return $profile->fresh();
    }

    public static function destroy(): ?bool
    {
        $profile = Profile::where('user_id', auth()->id())->first();
        return $profile->delete();
    }

}
