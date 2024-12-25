<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUser extends Seeder
{
    public function run()
    {
        // Check if admin already exists
        if (!User::where('email', 'admin@example.com')->exists()) {
            User::create([
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('AdminPassword123!'),
                'role' => 'admin'
            ]);
        }
    }
}
