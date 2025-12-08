<?php

namespace Database\Seeders;

use App\Models\Membership;
use Illuminate\Database\Seeder;

class MembershipSeeder extends Seeder
{
    /**
     * Ejecutar el seeder de membresías.
     */
    public function run(): void
    {
        $plans = [
            [
                'name'          => 'Day Pass',
                'price'         => 80,
                'duration_days' => 1,
                'is_active'     => true,
            ],
            [
                'name'          => 'Week Starter',
                'price'         => 350,
                'duration_days' => 7,
                'is_active'     => true,
            ],
            [
                'name'          => 'Basic Mensual',
                'price'         => 600,
                'duration_days' => 30,
                'is_active'     => true,
            ],
            [
                'name'          => 'Full Mensual',
                'price'         => 800,
                'duration_days' => 30,
                'is_active'     => true,
            ],
            [
                'name'          => 'Estudiante Mensual',
                'price'         => 500,
                'duration_days' => 30,
                'is_active'     => true,
            ],
            [
                'name'          => 'Pareja Mensual',
                'price'         => 1100,
                'duration_days' => 30,
                'is_active'     => true,
            ],
            [
                'name'          => 'Trimestral Basic',
                'price'         => 1500,
                'duration_days' => 90,
                'is_active'     => true,
            ],
            [
                'name'          => 'Trimestral Full',
                'price'         => 1900,
                'duration_days' => 90,
                'is_active'     => true,
            ],
            [
                'name'          => 'Semestral Basic',
                'price'         => 2800,
                'duration_days' => 180,
                'is_active'     => true,
            ],
            [
                'name'          => 'Semestral Full',
                'price'         => 3400,
                'duration_days' => 180,
                'is_active'     => true,
            ],
            [
                'name'          => 'Anual Basic',
                'price'         => 5000,
                'duration_days' => 365,
                'is_active'     => true,
            ],
            [
                'name'          => 'Anual Full',
                'price'         => 6200,
                'duration_days' => 365,
                'is_active'     => true,
            ],
            [
                'name'          => 'CrossFit Pack',
                'price'         => 900,
                'duration_days' => 30,
                'is_active'     => true,
            ],
            [
                'name'          => 'Yoga + Gym',
                'price'         => 850,
                'duration_days' => 30,
                'is_active'     => true,
            ],
            [
                'name'          => 'Premium VIP',
                'price'         => 1500,
                'duration_days' => 30,
                'is_active'     => true,
            ],
        ];

        foreach ($plans as $plan) {
            Membership::create($plan);
        }
    }
}
