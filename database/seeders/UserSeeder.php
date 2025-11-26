<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole  = Role::where('name', 'admin')->first();
        $staffRole  = Role::where('name', 'staff')->first();
        $clientRole = Role::where('name', 'client')->first();

        if ($adminRole) {
            User::firstOrCreate(
                ['email' => 'admin@gym.local'],
                [
                    'name' => 'Admin Gym',
                    'password' => Hash::make('password'),
                    'role_id' => $adminRole->id,
                    'is_active' => true,
                ]
            );
        }

        if ($staffRole) {
            User::factory()->create([
                'name' => 'Staff Gym',
                'email' => 'staff@gym.local',
                'role_id' => $staffRole->id,
            ]);
        }

        if ($clientRole) {
            User::factory()->create([
                'name' => 'Client Gym',
                'email' => 'client@gym.local',
                'role_id' => $clientRole->id,
            ]);
        }
    }
}
