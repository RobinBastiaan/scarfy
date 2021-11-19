<?php

namespace Database\Factories;

use App\Models\Scarf;
use App\Models\ScarfUsage;
use App\Models\ScarfUsageType;
use App\Models\ScoutGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

class ScarfUsageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ScarfUsage::class;

    /**
     * Define the model's default state.
     * @throws \Exception
     */
    public function definition(): array
    {
        $typesCount = count(ScarfUsageType::TYPES);

        return [
            'introduced_on'       => $this->faker->dateTimeThisCentury('-30 years'),
            'scarf_id'            => Scarf::withoutGlobalScopes()->get()->random()->id,
            'scout_group_id'      => ScoutGroup::withoutGlobalScopes()->get()->random()->id,
        ];
    }
}
