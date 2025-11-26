<?php

namespace Database\Seeders;

use App\Models\Membership;
use Illuminate\Database\Seeder;

class MembershipSeeder extends Seeder
{
    public function run(): void
    {
        $plans = [
            ['name' => 'Day Pass',                  'price' => 80,   'duration_days' => 1],
            ['name' => 'Week Starter',              'price' => 300,  'duration_days' => 7],
            ['name' => 'Basic Mensual',             'price' => 600,  'duration_days' => 30],
            ['name' => 'Premium Mensual',           'price' => 900,  'duration_days' => 30],
            ['name' => 'Student Fit',               'price' => 500,  'duration_days' => 30],
            ['name' => 'Pareja Fit',                'price' => 1100, 'duration_days' => 30],
            ['name' => 'Trimestral Basic',          'price' => 1600, 'duration_days' => 90],
            ['name' => 'Trimestral Premium',        'price' => 2200, 'duration_days' => 90],
            ['name' => 'Semestral',                 'price' => 3800, 'duration_days' => 180],
            ['name' => 'Anual Basic',               'price' => 6500, 'duration_days' => 365],
            ['name' => 'Anual Premium',             'price' => 8200, 'duration_days' => 365],
            ['name' => 'Crossfit Unlimited',        'price' => 1200, 'duration_days' => 30],
            ['name' => 'Spinning Nights',           'price' => 700,  'duration_days' => 30],
            ['name' => 'Clases Grupales Ilimitadas','price' => 1000, 'duration_days' => 30],
            ['name' => 'VIP Todo Incluido',         'price' => 1500, 'duration_days' => 30],
        ];

        foreach ($plans as $plan) {
            Membership::create([
                'name'          => $plan['name'],
                'price'         => $plan['price'],
                'duration_days' => $plan['duration_days'],
                'is_active'     => true,
            ]);
        }
    }
}
