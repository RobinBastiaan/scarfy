<?php

namespace Database\Seeders;

use App\Models\ScarfUsageType;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class ScarfUsageTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ScarfUsageType::factory()
            ->count(count(ScarfUsageType::TYPES))
            ->state(new Sequence(
                fn ($sequence) => ['name' => ScarfUsageType::TYPES[$sequence->index]],
            ))
            ->create();
    }
}
