<?php

namespace Database\Seeders;

use App\Models\ScoutGroup;
use Illuminate\Database\Seeder;

class ScoutGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
         * Existing data
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
         * Random data
         */

        ScoutGroup::factory()
            ->count(50)
            ->create();
    }
}
