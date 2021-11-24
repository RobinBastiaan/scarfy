<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * By default, all seeders will be run when not in production. To target only on of them,
     * run for example: php artisan migrate:refresh --seeder=RealDataSeeder
     */
    public function run(): void
    {
        $this->call([
            RealDataSeeder::class,
        ]);

        if (app()->environment() !== 'production') {
            $this->call([
                RandomDataSeeder::class,
            ]);
        }
    }
}
