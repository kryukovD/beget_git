<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::upsert([
            ["email"=>"dimvue5430@yandex.ru","password"=>Hash::make(env("PASSWORD_ADMIN")),"name"=>"Админ","role"=>'admin'],
            ],
            ['email'],["email"]);
        
    }
}
