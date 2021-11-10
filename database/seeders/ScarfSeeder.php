<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScarfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('scarves')->insert([
            'color_scheme'      => '#710B16',
            'edge_size'         => '20',
            'edge_color_scheme' => '#A89F99',
        ]);

        DB::table('scarves')->insert([
            'color_scheme'      => '#2E8B57',
            'edge_size'         => '20',
            'edge_color_scheme' => '#8B4513',
        ]);

        DB::table('scarves')->insert([
            'color_scheme'      => '#132E8C',
            'edge_size'         => '20',
            'edge_color_scheme' => '#ADA44C',
        ]);

        DB::table('scarves')->insert([
            'color_scheme' => '#006400',
        ]);

        DB::table('scarves')->insert([
            'color_scheme' => '#D39E82',
        ]);
    }
}
