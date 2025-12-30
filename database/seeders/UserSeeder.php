<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Harman Hariady',
                'email' => 'mando@gmail.com',
                'password' => 'Sumda#0046',
                'role' => 'admin',
            ],

	       [
                'name' => 'Assyifa Divya Carla',
                'email' => 'arla@gmail.com',
                'password' => 'password',
                'role' => 'peserta',
            ],
            
                ];

        foreach ($users as $data) {
            User::updateOrCreate(
                ['email' => $data['email']], // supaya tidak dobel kalau seed berkali-kali
                [
                    'name' => $data['name'],
                    'password' => Hash::make($data['password']),
                    'role' => $data['role'],
                ]
            );
        }
    }
}
