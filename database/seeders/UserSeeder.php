<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // 🔹 Admin principal
        User::create([
            'name'      => 'Admin Gym',
            'email'     => 'admin@gym.local',
            'password'  => Hash::make('password'),
            'role_id'   => 1,      // Admin
            'is_active' => true,
        ]);

        // 🔹 Staff principal
        User::create([
            'name'      => 'Staff Gym',
            'email'     => 'staff@gym.local',
            'password'  => Hash::make('password'),
            'role_id'   => 2,      // Staff
            'is_active' => true,
        ]);

        // 🔹 Cliente principal
        User::create([
            'name'      => 'Client Gym',
            'email'     => 'client@gym.local',
            'password'  => Hash::make('password'),
            'role_id'   => 3,      // Client
            'is_active' => true,
        ]);

        // 🔹 Usuario extra tuyo (el que ya habías creado)
        User::create([
            'name'      => 'Jose Enrique Castañeda Nahuatt',
            'email'     => 'enriquecastayucatan@gmail.com',
            'password'  => Hash::make('espartan117'),
            'role_id'   => 3,      // Cliente
            'is_active' => true,
        ]);

        // 🔹 Más usuarios para llegar a 15 (mezcla de staff y clients)
        $extraUsers = [
            ['name' => 'Carlos Pérez',         'email' => 'carlos@gym.local',        'role_id' => 2],
            ['name' => 'Ana López',            'email' => 'ana@gym.local',           'role_id' => 3],
            ['name' => 'Luis Martínez',        'email' => 'luis@gym.local',          'role_id' => 3],
            ['name' => 'María González',       'email' => 'maria@gym.local',         'role_id' => 3],
            ['name' => 'Pedro Hernández',      'email' => 'pedro@gym.local',         'role_id' => 2],
            ['name' => 'Lucía Ramírez',        'email' => 'lucia@gym.local',         'role_id' => 3],
            ['name' => 'Javier Torres',        'email' => 'javier@gym.local',        'role_id' => 3],
            ['name' => 'Sofía Castillo',       'email' => 'sofia@gym.local',         'role_id' => 2],
            ['name' => 'Daniel Morales',       'email' => 'daniel@gym.local',        'role_id' => 3],
            ['name' => 'Valeria Fernández',    'email' => 'valeria@gym.local',       'role_id' => 3],
            ['name' => 'Ricardo Sánchez',      'email' => 'ricardo@gym.local',       'role_id' => 2],
            ['name' => 'Fernanda Domínguez',   'email' => 'fernanda@gym.local',      'role_id' => 3],
        ];

        foreach ($extraUsers as $data) {
            User::create([
                'name'      => $data['name'],
                'email'     => $data['email'],
                'password'  => Hash::make('password'),
                'role_id'   => $data['role_id'],
                'is_active' => true,
            ]);
        }
    }
}
