<?php

namespace App\Services\User;



use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserService
{
        public static function store(array $data)
        {
            $user = User::create($data);
            $user -> access_token = JWTAuth::fromUser($user);
            return $user;
        }

        public static function update(array $data)
        {
            $user = User::where('id',auth()->id())->first();
            $user -> update($data);
            return $user-> fresh();

        }

        public static function destroy(): void
        {
            $user = User::where('id',auth()->id())->first();
            $user->delete();
        }

}
