<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Actor;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Actor>
 */
class ActorFactory extends Factory
{
    /**
     * El modelo asociado a la fábrica.
     *
     * @var string
     */
    protected $model = Actor::class;

    /**
     * Define el estado por defecto del modelo.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName,
            'surname' => $this->faker->lastName,
            'birthdate' => $this->faker->date('Y-m-d', '-20 years'), // Actor mayor de 20 años
            'country' => $this->faker->country,
            'img_url' => $this->faker->imageUrl(640, 480, 'people'),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
