<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Film;
use App\Models\Actor;
use App\Models\FilmActor;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FilmActor>
 */
class FilmActorFactory extends Factory
{
    protected $model = FilmActor::class;

    public function definition(): array
    {
        return [
            'film_id' => Film::inRandomOrder()->first()->id ?? Film::factory(),
            'actor_id' => Actor::inRandomOrder()->first()->id ?? Actor::factory(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
