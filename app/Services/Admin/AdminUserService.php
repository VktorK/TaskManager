<?php

namespace App\Services\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class AdminUserService
{
    /**
     * @return Collection
     */
    public static function index():Collection
    {
        return User::all();
    }

    /**
     * @param array $data
     * @return mixed
     */
    public static function store(array $data): mixed
    {
        return User::create($data);

    }

    /**
     * @param array $data
     * @param User $user
     * @return mixed
     */
    public static function update(array $data, User $user): mixed
    {

        $user->update($data);
        return $user->fresh();
    }

    /**
     * @param User $user
     * @return void
     */
    public static function destroy(User $user): void
    {
        $user->delete();
    }
}
