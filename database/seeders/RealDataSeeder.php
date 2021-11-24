<?php

namespace Database\Seeders;

use App\Models\Association;
use App\Models\Scarf;
use App\Models\ScarfUsage;
use App\Models\ScoutGroup;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RealDataSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ScarfUsageTypeSeeder::class,
        ]);

        /**
         * Association
         */

        Association::factory()->create([
            'name'       => 'Scouting Nederland',
            'country'    => 'Netherlands',
            'founded_on' => '1911-04-01',
        ]);

        /**
         * Scarf
         */

        Scarf::factory()
            ->withBaseColor('#762d4e')
            ->withBorder(25, '#d0d7d7')
            ->withImage('png')
            ->create();

        Scarf::factory()
            ->withBaseColor('#2E8B57')
            ->withBorder(20, '#8B4513')
            ->create();

        Scarf::factory()
            ->withBaseColor('#132E8C')
            ->withBorder(20, '#ADA44C')
            ->create();

        Scarf::factory()
            ->withBaseColor('#006400')
            ->withText('SPEL', '#aadb1e', 'Impact')
            ->create();

        Scarf::factory()
            ->withBaseColor('#D39E82')
            ->withImage('png')
            ->create();

        Scarf::factory()
            ->withBaseColor('balmoral')
            ->create();

        Scarf::factory()
            ->withBaseColor('#cc6600')
            ->withDiagonal('#006600')
            ->create();

        Scarf::factory()
            ->withBaseColor('#131213')
            ->withBorder(10, '#131213')
            ->withBorder(10, '#CBBA9B', 2)
            ->withBorder(10, '#131213', 3)
            ->withBorder(10, '#7FAFC9', 4)
            ->create();

        Scarf::factory()
            ->withBaseColor('#d9390d')
            ->withBorder(25, '#2a1ad5')
            ->withImage('png')
            ->create();

        Scarf::factory()
            ->withBaseColor('#6e4b16')
            ->withBorder(25, '#ff8400')
            ->withImage('png')
            ->create();

        /*
         * ScoutGroup
         */

        ScoutGroup::factory()->create([
            'name'       => 'Scouting Franciscusgroep Leiden',
            'website'    => 'franciscusgroep.nl',
            'city'       => 'Leiden',
            'country'    => 'Netherlands',
            'founded_on' => '2000-01-01',
        ]);

        ScoutGroup::factory()->create([
            'name'       => 'De Trappers',
            'website'    => 'detrappershs.nl',
            'city'       => 'Hoogezand',
            'country'    => 'Netherlands',
            'founded_on' => '2000-01-01',
        ]);

        ScoutGroup::factory()->create([
            'name'       => 'Scouting Kompasnaald',
            'website'    => 'scoutingkompasnaald.nl',
            'city'       => 'Gorssel',
            'country'    => 'Netherlands',
            'founded_on' => '2000-01-01',
        ]);

        ScoutGroup::factory()->create([
            'name'       => 'Landelijk Team Spel',
            'website'    => null,
            'city'       => 'Leusden',
            'country'    => 'Netherlands',
            'founded_on' => '2000-01-01',
        ]);

        ScoutGroup::factory()->create([
            'name'       => 'Gilwell',
            'website'    => 'gilwell.scouting.nl',
            'city'       => 'Ommen',
            'country'    => 'Netherlands',
            'founded_on' => '2000-01-01',
        ]);

        ScoutGroup::factory()->create([
            'name'       => 'De Geuzen',
            'website'    => 'degeuzenarnhem.nl',
            'city'       => 'Arnhem',
            'country'    => 'Netherlands',
            'founded_on' => '2000-01-01',
        ]);

        ScoutGroup::factory()->create([
            'name'       => 'Scouting Bennekom',
            'website'    => 'scoutingbennekom.nl',
            'city'       => 'Bennekom',
            'country'    => 'Netherlands',
            'founded_on' => '1990-01-01',
        ]);

        ScoutGroup::factory()->create([
            'name'       => 'Scouting Pegasus',
            'website'    => null,
            'city'       => 'Velp',
            'country'    => 'Netherlands',
            'founded_on' => '2020-01-01',
        ]);

        ScoutGroup::factory()->create([
            'name'       => 'Scouting St. Jozef Leiden',
            'website'    => 'stjozef.nl',
            'city'       => 'Leiden',
            'country'    => 'Netherlands',
            'founded_on' => '1980-01-01',
        ]);

        /*
         * ScarfUsage
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
    }
}
