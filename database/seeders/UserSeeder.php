<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
            'name' => 'Administrator',
            'email'=> 'admin@gmail.com',
            'password' => bcrypt('a'),
            'level' => 1,
        ],
            [
            'name' => 'user',
            'email'=> 'user@gmail.com',
            'password' => bcrypt('a'),
            'level' => 2,
            ],

            [
            'name' => 'user2',
            'email'=> 'user2@gmail.com',
            'password' => bcrypt('a'),
            'level' => 3,
            ]
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}