<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Pondok',
            'role_id' => 1,
            'username' => 'admin',
            'password' => Hash::make('admin123'),
        ]);
    }
}
