<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScoutGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('scout_groups')->insert([
            'name'           => 'Scouting Franciscusgroep Leiden',
            'slug'           => 'scouting-franciscusgroep-leiden',
            'website'        => 'franciscusgroep.nl',
            'city'           => 'Leiden',
            'country'        => 'Netherlands',
            'founded_on'     => '2000-01-01',
            'scarf_id'       => 1,
            'association_id' => 1,
        ]);

        DB::table('scout_groups')->insert([
            'name'           => 'De Trappers',
            'slug'           => 'de-trappers',
            'website'        => 'detrappershs.nl',
            'city'           => 'Hoogezand',
            'country'        => 'Netherlands',
            'founded_on'     => '2000-01-01',
            'scarf_id'       => 2,
            'association_id' => 1,
        ]);

        DB::table('scout_groups')->insert([
            'name'           => 'Scouting Kompasnaald',
            'slug'           => 'scouting-kompasnaald',
            'website'        => 'scoutingkompasnaald.nl',
            'city'           => 'Gorssel',
            'country'        => 'Netherlands',
            'founded_on'     => '2000-01-01',
            'scarf_id'       => 3,
            'association_id' => 1,
        ]);

        DB::table('scout_groups')->insert([
            'name'           => 'Landelijk Team Spel',
            'slug'           => 'landelijk-team-spel',
            'website'        => null,
            'city'           => 'Leusden',
            'country'        => 'Netherlands',
            'founded_on'     => '2000-01-01',
            'scarf_id'       => 4,
            'association_id' => 1,
        ]);

        DB::table('scout_groups')->insert([
            'name'           => 'Gilwell',
            'slug'           => 'gilwell',
            'website'        => 'gilwell.scouting.nl',
            'city'           => 'Ommen',
            'country'        => 'Netherlands',
            'founded_on'     => '2000-01-01',
            'scarf_id'       => 5,
            'association_id' => 1,
        ]);

        DB::table('scout_groups')->insert([
            'name'           => 'De Geuzen',
            'slug'           => 'de-geuzen',
            'website'        => 'degeuzenarnhem.nl',
            'city'           => 'Arnhem',
            'country'        => 'Netherlands',
            'founded_on'     => '2000-01-01',
            'scarf_id'       => 6,
            'association_id' => 1,
        ]);

        DB::table('scout_groups')->insert([
            'name'           => 'Scouting Bennekom',
            'slug'           => 'scouting-bennekom',
            'website'        => 'scoutingbennekom.nl',
            'city'           => 'Bennekom',
            'country'        => 'Netherlands',
            'founded_on'     => '1990-01-01',
            'scarf_id'       => 7,
            'association_id' => 1,
        ]);

        DB::table('scout_groups')->insert([
            'name'           => 'Scouting Pegasus',
            'slug'           => 'scouting-pegasus',
            'website'        => null,
            'city'           => 'Velp',
            'country'        => 'Netherlands',
            'founded_on'     => '2020-01-01',
            'scarf_id'       => 8,
            'association_id' => 1,
        ]);

//        DB::table('scout_groups')->insert([
//            'name'           => '',
//            'slug'           => '',
//            'website'        => '',
//            'city'           => '',
//            'country'        => 'Netherlands',
//            'founded_on'     => '1900-01-01',
//            'scarf_id'       => 999,
//            'association_id' => 1,
//        ]);
    }
}
