<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Tymon\JWTAuth\Exceptions\JWTException;

class TokenComand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:getToken
    {user : name or email user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user = $this->argument('user');

        $user = User::where('name', $user)
            ->orWhere('email',$user)
            ->first();

        if(!$user) {
            $this->error(' User not found ');
            return;
        }

        try{
            $jwt = app('tymon.jwt');
            $token = $jwt->fromUser($user);

            $this->info($token);
        } catch(JWTException $e) {
            $this->error('  Не удалось сгенерировать токен  ');
        }

    }
}
