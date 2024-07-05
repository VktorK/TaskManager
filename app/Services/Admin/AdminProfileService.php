<?php

namespace App\Services\Admin;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Collection;

class AdminProfileService
{

    public static function index(): Collection
    {
        return Profile::all();
    }

    public static function store(array $data): Profile
    {

        return Profile::create($data);
    }

    public static function update(Profile $profile, array $data): Profile
    {
        $profile->update($data);
        return $profile->fresh();
    }

    public static function destroy(Profile $profile): ?bool
    {
        return $profile->delete();
    }

}
