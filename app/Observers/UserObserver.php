<?php

namespace App\Observers;

use App\Models\Profile;
use App\Models\Role;
use App\Models\User;

class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param User $user
     * @return void
     */
    public function created(User $user): void
    {
        $roleId = Role::roleId()->first()->id;
        $userId = User::userIdLast()->first()->id;
        $user->roles()->attach([
            1 => ['role_id' => $roleId,
                'user_id' => $userId],

        ]);

        Profile::create([
            'user_id'=> $user->id
        ]);
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param User $user
     * @return void
     */
    public function deleting(User $user): void
    {
        $user->profile()->delete();

        $user->tasks()->where('user_id',auth()->id())->delete();
    }
}
