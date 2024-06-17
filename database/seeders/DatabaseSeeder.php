<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         User::firstOrCreate([
             "name" => "Lok1",
             "email" => "4you.19885@mail.ru",
             'email_verified_at' => now(),
             "password"=> Hash::make('123123123'),
             'remember_token' => Str::random(10),
         ]);

         Task::factory(10)->create();
    }
}
