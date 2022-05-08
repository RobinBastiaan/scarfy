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
     * The default is setting the scout group name to the random city they are in.
     */
    public function definition(): array
    {
        $city = $this->faker->unique->city();
        while (!empty(ScoutGroup::where('city', $city)->first())) {
            $city = $this->faker->unique->city();
        }

        $groupName = 'Scouting ' . $city;

        return [
            'name'           => $groupName,
            'website'        => Str::slug($groupName) . '.' . Config::get('app.locale'),
            'city'           => $city,
            'country'        => Locale::getDisplayRegion('-' . Config::get('app.locale'), 'en'),
            'founded_on'     => $this->faker->dateTimeThisCentury('-30 years'),
            'association_id' => 1,
            'created_at'     => $this->faker->dateTime,
            // we do not need to define the field "slug", because this is handled automatically in the model
        ];
    }
}
