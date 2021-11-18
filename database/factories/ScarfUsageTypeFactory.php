<?php

namespace Database\Factories;

use App\Models\ScarfUsage;
use App\Models\ScarfUsageType;
use Illuminate\Database\Eloquent\Factories\Factory;

class ScarfUsageTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ScarfUsageType::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
        ];
    }
}
