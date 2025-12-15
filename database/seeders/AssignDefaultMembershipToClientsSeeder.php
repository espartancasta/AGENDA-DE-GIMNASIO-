<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;
use App\Models\Membership;

class AssignDefaultMembershipToClientsSeeder extends Seeder
{
    public function run(): void
    {
        $default = Membership::where('duration_days', 30)->orderByDesc('id')->first();

        if (!$default) {
            // Si no existe, NO hacemos nada para no romper
            return;
        }

        Client::whereNull('membership_id')->update(['membership_id' => $default->id]);
    }
}
