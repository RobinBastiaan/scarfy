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
            'color_scheme'       => '#710B16',
            'edge_size1'         => '25',
            'edge_color_scheme1' => '#A89F99',
        ]);

        DB::table('scarves')->insert([
            'color_scheme'       => '#2E8B57',
            'edge_size1'         => '20',
            'edge_color_scheme1' => '#8B4513',
        ]);

        DB::table('scarves')->insert([
            'color_scheme'       => '#132E8C',
            'edge_size1'         => '20',
            'edge_color_scheme1' => '#ADA44C',
        ]);

        DB::table('scarves')->insert([
            'color_scheme' => '#006400',
        ]);

        DB::table('scarves')->insert([
            'color_scheme' => '#D39E82',
        ]);

        DB::table('scarves')->insert([
            'color_scheme' => 'balmoral',
        ]);

        DB::table('scarves')->insert([
            'color_scheme'       => '#cc6600',
            'color_scheme_right' => '#006600',
        ]);

        DB::table('scarves')->insert([
            'color_scheme'       => '#131213',
            'edge_size1'         => '10',
            'edge_color_scheme1' => '#131213',
            'edge_size2'         => '10',
            'edge_color_scheme2' => '#CBBA9B',
            'edge_size3'         => '10',
            'edge_color_scheme3' => '#131213',
            'edge_size4'         => '10',
            'edge_color_scheme4' => '#7FAFC9',
        ]);

        DB::table('scarves')->insert([
            'color_scheme'       => '#d75754',
            'edge_size1'         => '25',
            'edge_color_scheme1' => '#8f8a9d',
        ]);
    }
}
