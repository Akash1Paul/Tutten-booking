<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userArr = [
            'user1' => [
                'fname' => 'Admin',
                'lname'=> '',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('12345678'),
                'roles' => 1
            ],

        ];

        foreach ($userArr as $user) {
            User::create(
                [
                    'fname' => $user['fname'],
                    'lname' => $user['lname'],
                    'email' => $user['email'],
                    'password' => $user['password'],
                    'roles' => $user['roles']
                ]
            );
        }
    }
}
