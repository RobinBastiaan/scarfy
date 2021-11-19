<?php

namespace Database\Factories;

use App\Models\ScoutGroup;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;
use Locale;

class ScoutGroupFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ScoutGroup::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $city = $this->faker->unique->city();
        $groupName = 'Scouting ' . $city;

        return [
            'name'           => $groupName,
            'website'        => Str::slug($groupName) . '.' . Config::get('app.locale'),
            'city'           => $city,
            'country'        => Locale::getDisplayRegion('-' . Config::get('app.locale'), 'en'),
            'founded_on'     => $this->faker->dateTimeThisCentury('-30 years'),
            'association_id' => 1,
            'created_at'     => $this->faker->dateTime,
        ];
    }
}
