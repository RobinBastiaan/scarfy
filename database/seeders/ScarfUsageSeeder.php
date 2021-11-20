<?php

namespace Database\Seeders;

use App\Models\ScarfUsage;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ScarfUsageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
         * Existing data
         */

        ScarfUsage::factory()
            ->sequence(fn($sequence) => [
                'scarf_id'       => 1,
                'scout_group_id' => 1,
            ])
            ->create();

        ScarfUsage::factory()
            ->sequence(fn($sequence) => [
                'scarf_id'       => 2,
                'scout_group_id' => 2,
            ])
            ->create();

        ScarfUsage::factory()
            ->sequence(fn($sequence) => [
                'scarf_id'       => 3,
                'scout_group_id' => 3,
            ])
            ->create();

        ScarfUsage::factory()
            ->sequence(fn($sequence) => [
                'scarf_id'            => 4,
                'scout_group_id'      => 4,
                'scarf_usage_type_id' => 3,
            ])
            ->create();

        ScarfUsage::factory()
            ->sequence(fn($sequence) => [
                'scarf_id'            => 5,
                'scout_group_id'      => 5,
                'scarf_usage_type_id' => 5,
            ])
            ->create();

        ScarfUsage::factory()
            ->sequence(fn($sequence) => [
                'scarf_id'       => 6,
                'scout_group_id' => 6,
            ])
            ->create();

        ScarfUsage::factory()
            ->sequence(fn($sequence) => [
                'scarf_id'       => 7,
                'scout_group_id' => 7,
            ])
            ->create();

        ScarfUsage::factory()
            ->sequence(fn($sequence) => [
                'scarf_id'       => 8,
                'scout_group_id' => 8,
            ])
            ->create();

        ScarfUsage::factory()
            ->sequence(fn($sequence) => [
                'scarf_id'       => 9,
                'scout_group_id' => 9,
            ])
            ->create();

        ScarfUsage::factory()
            ->sequence(fn($sequence) => [
                'scarf_id'       => 10,
                'scout_group_id' => 1,
                'used_until'     => Carbon::create('1980', '01', '01'),
            ])
            ->create();

        /*
         * Random data
         */

        ScarfUsage::factory()
            ->count(50)
            ->sequence(fn($sequence) => [
                'scarf_id'       => $sequence->index + 10,
                'scout_group_id' => $sequence->index + 10,
            ])
            ->create();
    }
}
