<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ScarfUsageTypeSeeder::class,
            AssociationSeeder::class,
            ScarfSeeder::class,
            ScoutGroupSeeder::class,
            ScarfUsageSeeder::class,
        ]);
    }
}
