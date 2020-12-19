<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Maher Bin Naif',
            'email' => 'maherbinnaif@boxingfederation.com',
            'password' => Hash::make('password'),
        ]);
    }
}
