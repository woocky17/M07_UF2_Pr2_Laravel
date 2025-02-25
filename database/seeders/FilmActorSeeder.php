<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FilmActor;
use App\Models\Film;
use App\Models\Actor;

class FilmActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $films = Film::all();
        $actors = Actor::all();

        if ($films->isEmpty() || $actors->isEmpty()) {
            return;
        }

        foreach ($films as $film) {
            $randomActors = $actors->random(rand(1, 3));

            foreach ($randomActors as $actor) {
                FilmActor::firstOrCreate([
                    'film_id' => $film->id,
                    'actor_id' => $actor->id,
                ]);
            }
        }
    }
}
