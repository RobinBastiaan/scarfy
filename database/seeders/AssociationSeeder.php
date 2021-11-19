<?php

namespace Database\Seeders;

use App\Models\Association;
use Illuminate\Database\Seeder;

class AssociationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
         * Existing data
         */

        Association::factory()->create([
            'name'       => 'Scouting Nederland',
            'country'    => 'Netherlands',
            'founded_on' => '1911-04-01',
        ]);

        /*
         * Random data
         */

        Association::factory()
            ->count(25)
            ->create();
    }
}
