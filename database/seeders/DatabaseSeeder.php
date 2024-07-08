<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        Role::create([
            "title" => 'admin'
        ]);

        Role::create([
            "title" => 'user'
        ]);

        User::withoutEvents(function () {
            User::factory()->create([
                'name' => 'Admin',
                'email' => 'example@example.com',
                'password' => Hash::make('123123123'),
            ]);
        });

        User::find(1)->roles()->sync([
            'role_id' => 1,
            'user_id' => 1,
        ]);

        User::factory(10)->create();
        Task::factory(100)->create();
    }
}
