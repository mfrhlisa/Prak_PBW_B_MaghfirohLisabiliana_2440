<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            ['name' => 'Admin',  'email' => 'admin@example.com',  'role' => 'admin'],
            ['name' => 'Staff',  'email' => 'staff@example.com',  'role' => 'staff'],
            ['name' => 'Viewer', 'email' => 'viewer@example.com', 'role' => 'viewer'],
        ];

        foreach ($users as $u) {
            User::updateOrCreate(
                ['email' => $u['email']],
                [
                    'name' => $u['name'],
                    'role' => $u['role'],
                    'password' => Hash::make('password'),
                ]
            );
        }
    }
}