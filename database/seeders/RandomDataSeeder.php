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
     * @throws \Exception
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
            ->count(200)
            ->create();

        /**
         * Scarf
         */
        $amount = 250;

        $this->seedAllBasicScarves();
        $this->seedAllPatternScarves();
        $this->seedDiagonalScarves($amount);
        $this->seedBorderScarves($amount);
        $this->seedBorderDiagonalScarves($amount);
        $this->seedTwoColorfulBorderScarves($amount);
        $this->seedFourBorderScarves($amount);

        /*
         * ScoutGroup
         */

        ScoutGroup::factory()
            ->count(500)
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

        $scoutGroups = ScoutGroup::withoutGlobalScopes()->get();
        Scarf::withoutGlobalScopes()->get()->each(function ($scarf) use ($scoutGroups) {
            $selectedGroupsIds = $scoutGroups->random(random_int(1, 20))->pluck('id')->toArray();
            foreach ($selectedGroupsIds as $selectedGroupId) {
                if ($scarf->id >= $selectedGroupId) {
                    continue;
                }

                ScarfUsage::factory()
                    ->create([
                        'scarf_id'       => $scarf->id,
                        'scout_group_id' => $selectedGroupId,
                        'used_until'     => $this->faker->boolean(10) ? $this->faker->date : null,
                    ]);
            }
        });
    }

    /*
     * Generate random colors and ensure all picked colors are unique.
     */
    protected static function randomUniqueColors(int $amount = 2): array
    {
        $colors = Scarf::COLORS;
        shuffle($colors);
        $result = [];

        for ($i = 0; $i < $amount; $i++) {
            $result[] = array_pop($colors);
        }

        return $result;
    }

    protected function seedAllBasicScarves(): void
    {
        Scarf::factory()
            ->count(count(Scarf::COLORS))
            ->state(new Sequence(
                fn($sequence) => ['color_scheme' => $this->faker->unique->randomElement(Scarf::COLORS)],
            ))
            ->create();
    }

    protected function seedAllPatternScarves(): void
    {
        Scarf::factory()
            ->count(count(Scarf::PATTERNS))
            ->state(new Sequence(
                fn($sequence) => ['color_scheme' => $this->faker->unique->randomElement(Scarf::PATTERNS)],
            ))
            ->create();
    }

    protected function seedDiagonalScarves(int $amount): void
    {
        for ($i = 0; $i < $amount; $i++) {
            [$baseColor, $diagonalColor] = $this::randomUniqueColors();

            Scarf::factory()
                ->withBaseColor($baseColor)
                ->withDiagonal($diagonalColor)
                ->create();
        }
    }

    protected function seedBorderScarves(int $amount): void
    {
        for ($i = 0; $i < $amount; $i++) {
            [$baseColor, $firstBorderColor] = $this::randomUniqueColors();

            Scarf::factory()
                ->withBaseColor($baseColor)
                ->withBorder(25, $firstBorderColor)
                ->create();
        }
    }

    protected function seedBorderDiagonalScarves(int $amount): void
    {
        for ($i = 0; $i < $amount; $i++) {
            [$baseColor, $diagonalColor, $firstBorderColor, $secondBorderColor] = $this::randomUniqueColors(4);

            Scarf::factory()
                ->withBaseColor($baseColor)
                ->withDiagonal($diagonalColor)
                ->withBorder(25, $firstBorderColor, 1, $secondBorderColor)
                ->create();
        }
    }

    protected function seedTwoColorfulBorderScarves(int $amount): void
    {
        for ($i = 0; $i < $amount; $i++) {
            [$baseColor, $firstBorderColor, $secondBorderColor] = $this::randomUniqueColors(3);

            Scarf::factory()
                ->withBaseColor($baseColor)
                ->withBorder(20, $firstBorderColor, 1, $secondBorderColor)
                ->withBorder(20, $secondBorderColor, 2, $firstBorderColor)
                ->create();
        }
    }

    protected function seedFourBorderScarves(int $amount): void
    {
        for ($i = 0; $i < $amount; $i++) {
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
}
