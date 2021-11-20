<?php

namespace Database\Factories;

use App\Models\Scarf;
use Illuminate\Database\Eloquent\Factories\Factory;

class ScarfFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Scarf::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'color_scheme' => $this->faker->randomElement(Scarf::COLORS),
            'created_at'   => $this->faker->dateTime,
            // All other fields are omitted here as they optional. they can be filled using the other methods of this class
        ];
    }

    public function withBaseColor(string $colorScheme): Factory
    {
        return $this->state([
            'color_scheme' => $colorScheme,
        ]);
    }

    public function withDiagonal(string $colorScheme): Factory
    {
        return $this->state([
            'color_scheme_right' => $colorScheme,
        ]);
    }

    public function withBorder(int $edgeSize, string $colorScheme, int $borderCount = 1, string $colorSchemeRight = null): Factory
    {
        return $this->state([
            'edge_size' . $borderCount               => $edgeSize,
            'edge_color_scheme' . $borderCount       => $colorScheme,
            'edge_color_scheme_right' . $borderCount => $colorSchemeRight,
        ]);
    }

    public function withImage(string $extension): Factory
    {
        return $this->state([
            'image_path' => $extension,
        ]);
    }

    public function withText(string $text, string $color, string $font): Factory
    {
        return $this->state([
            'text'  => $text,
            'text_color' => $color,
            'text_font'  => $font,
        ]);
    }
}
