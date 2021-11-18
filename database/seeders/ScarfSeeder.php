<?php

namespace Database\Seeders;

use App\Models\Scarf;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class ScarfSeeder extends Seeder
{
    /**
     * The current Faker instance.
     *
     * @var \Faker\Generator
     */
    protected $faker;

    /**
     * Create a new seeder instance.
     */
    public function __construct()
    {
        $this->faker = Faker::create();
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
         * Existing data
         */

        Scarf::factory()
            ->withBaseColor('#710B16')
            ->withBorder(25, '#A89F99')
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
            ->create();

        Scarf::factory()
            ->withBaseColor('#D39E82')
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
            ->withBaseColor('#d75754')
            ->withBorder(25, '#8f8a9d')
            ->create();

        /*
         * Random data
         */

        // basic
        Scarf::factory()
            ->count(10)
            ->create();

        // pattern
        Scarf::factory()
            ->count(10)
            ->state(new Sequence(
                fn($sequence) => ['color_scheme' => Scarf::PATTERNS[array_rand(Scarf::PATTERNS)]],
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
