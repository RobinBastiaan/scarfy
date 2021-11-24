<?php

namespace Database\Seeders;

use App\Models\ScarfUsageType;
use Illuminate\Database\Seeder;

class ScarfUsageTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (ScarfUsageType::TYPES as $type) {
            ScarfUsageType::firstOrCreate(['name' => $type]);
        }
    }
}
