<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Film>
 */
class FilmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3),
            'year' => $this->faker->numberBetween(1900, 2024),
            'genre' => $this->faker->word,
            'country' => $this->faker->country,
            'duration' => $this->faker->numberBetween(90, 180),
            'img_url' => $this->faker->imageUrl(640, 480, 'movies'),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
