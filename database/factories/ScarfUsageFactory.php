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
     *
     * @throws \Exception
     */
    public function definition(): array
    {
        return [
            'introduced_on'       => $this->faker->dateTimeThisCentury('-30 years'),
            'used_until'          => $this->faker->boolean(10) ? $this->faker->date : null,
            'scarf_id'            => Scarf::withoutGlobalScopes()->get()->random()->id,
            'scout_group_id'      => ScoutGroup::withoutGlobalScopes()->get()->random()->id,
            'scarf_usage_type_id' => $this->faker->boolean(75) ? 1 : ScarfUsageType::get()->random()->id,
        ];
    }
}
