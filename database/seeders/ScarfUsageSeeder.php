<?php

namespace Database\Seeders;

use App\Models\ScarfUsage;
use Illuminate\Database\Seeder;

class ScarfUsageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ScarfUsage::factory()
            ->count(50)
            ->sequence(fn($sequence) => [
                'scarf_id'       => $sequence->index + 1,
                'scout_group_id' => $sequence->index + 1,
            ])
            ->create();
    }
}
