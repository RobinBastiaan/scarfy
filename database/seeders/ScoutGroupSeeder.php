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
            'name'     => 'Scouting Franciscusgroep Leiden',
            'website'  => 'franciscusgroep.nl',
            'city'     => 'Leiden',
            'country'  => 'Netherlands',
            'scarf_id' => 1,
        ]);

        DB::table('scout_groups')->insert([
            'name'     => 'De Trappers',
            'website'  => 'detrappershs.nl',
            'city'     => 'Hoogezand',
            'country'  => 'Netherlands',
            'scarf_id' => 2,
        ]);

        DB::table('scout_groups')->insert([
            'name'     => 'Scouting Kompasnaald',
            'website'  => 'scoutingkompasnaald.nl',
            'city'     => 'Gorssel',
            'country'  => 'Netherlands',
            'scarf_id' => 3,
        ]);

        DB::table('scout_groups')->insert([
            'name'     => 'Landelijk Team Spel',
            'website'  => null,
            'city'     => 'Leusden',
            'country'  => 'Netherlands',
            'scarf_id' => 4,
        ]);

        DB::table('scout_groups')->insert([
            'name'     => 'Gilwell',
            'website'  => 'gilwell.scouting.nl',
            'city'     => 'Ommen',
            'country'  => 'Netherlands',
            'scarf_id' => 5,
        ]);

        DB::table('scout_groups')->insert([
            'name'     => 'De Geuzen',
            'website'  => 'degeuzenarnhem.nl',
            'city'     => 'Arnhem',
            'country'  => 'Netherlands',
            'scarf_id' => 6,
        ]);

//        DB::table('scout_groups')->insert([
//            'name'     => '',
//            'website'  => '',
//            'city'     => '',
//            'country'  => 'Netherlands',
//            'scarf_id' => 999,
//        ]);
    }
}
