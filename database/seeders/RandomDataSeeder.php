<?php

namespace Database\Seeders;

use App\Models\Association;
use App\Models\Scarf;
use App\Models\ScarfUsage;
use App\Models\ScoutGroup;
use Faker\Factory as Faker;
use Faker\Generator;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;

class RandomDataSeeder extends Seeder
{
    /**
     * The current Faker instance.
     */
    protected Generator $faker;

    /**
     * Create a new seeder instance.
     */
    public function __construct()
    {
        $this->faker = Faker::create('nl_NL');
    }

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ScarfUsageTypeSeeder::class,
        ]);

        /*
         * Association
         */

        Association::factory()
            ->count(25)
            ->create();

        /**
         * Scarf
         */

        // basic
        Scarf::factory()
            ->count(count(Scarf::COLORS))
            ->state(new Sequence(
                fn($sequence) => ['color_scheme' => $this->faker->unique->randomElement(Scarf::COLORS)],
            ))
            ->create();

        // pattern
        Scarf::factory()
            ->count(count(Scarf::PATTERNS))
            ->state(new Sequence(
                fn($sequence) => ['color_scheme' => $this->faker->unique->randomElement(Scarf::PATTERNS)],
            ))
            ->create();

        // diagonal
        for ($i = 0; $i < 10; $i++) {
            [$baseColor, $diagonalColor] = $this::randomUniqueColors();

            Scarf::factory()
                ->withBaseColor($baseColor)
                ->withDiagonal($diagonalColor)
                ->create();
        }

        // border
        for ($i = 0; $i < 10; $i++) {
            [$baseColor, $firstBorderColor] = $this::randomUniqueColors();

            Scarf::factory()
                ->withBaseColor($baseColor)
                ->withBorder(25, $firstBorderColor)
                ->create();
        }

        // border diagonal
        for ($i = 0; $i < 10; $i++) {
            [$baseColor, $diagonalColor, $firstBorderColor, $secondBorderColor] = $this::randomUniqueColors(4);

            Scarf::factory()
                ->withBaseColor($baseColor)
                ->withDiagonal($diagonalColor)
                ->withBorder(25, $firstBorderColor, 1, $secondBorderColor)
                ->create();
        }

        // two colorful borders
        for ($i = 0; $i < 10; $i++) {
            [$baseColor, $firstBorderColor, $secondBorderColor] = $this::randomUniqueColors(3);

            Scarf::factory()
                ->withBaseColor($baseColor)
                ->withBorder(20, $firstBorderColor, 1, $secondBorderColor)
                ->withBorder(20, $secondBorderColor, 2, $firstBorderColor)
                ->create();
        }

        // four borders
        for ($i = 0; $i < 10; $i++) {
            [$primaryColor, $secondaryColor] = $this::randomUniqueColors();

            Scarf::factory()
                ->withBaseColor($primaryColor)
                ->withBorder(10, $primaryColor)
                ->withBorder(10, $secondaryColor, 2)
                ->withBorder(10, $primaryColor, 3)
                ->withBorder(10, $secondaryColor, 4)
                ->create();
        }

        /*
         * ScoutGroup
         */

        ScoutGroup::factory()
            ->count(50)
            ->state(new Sequence(
                function () {
                    $city = $this->faker->unique->city();
                    $groupName = 'Scouting ' . $city;
                    return [
                        'name'    => $groupName,
                        'website' => Str::slug($groupName) . '.' . Config::get('app.locale'),
                        'city'    => $city,
                    ];
                }
            ))
            ->create();

        /*
         * ScarfUsage
         */

        ScarfUsage::factory()
            ->count(50)
            ->sequence(fn($sequence) => [
                'scarf_id'       => $sequence->index + 10,
                'scout_group_id' => $sequence->index + 10,
            ])
            ->create();
    }

    /*
     * Generate random colors and ensure all picked colors are unique.
     */
    private static function randomUniqueColors(int $amount = 2): array
    {
        $colors = Scarf::COLORS;
        shuffle($colors);
        $result = [];

        for ($i = 0; $i < $amount; $i++) {
            $result[] = array_pop($colors);
        }

        return $result;
    }
}
