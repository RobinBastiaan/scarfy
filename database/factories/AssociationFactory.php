<?php

namespace Database\Factories;

use App\Models\Association;
use Illuminate\Database\Eloquent\Factories\Factory;

class AssociationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Association::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $country = $this->faker->unique->country;

        return [
            'name'       => 'Scouting ' . $country,
            'country'    => $country,
            'founded_on' => $this->faker->dateTimeThisCentury('-30 years'),
        ];
    }
}
