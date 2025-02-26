<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Film;
use App\Models\User;
use App\Models\Screenwriter;

class ScreenwritersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $films = Film::all();
        $users = User::all();

        if ($films->isEmpty() || $users->isEmpty()) {
            return;
        }

        foreach ($films as $film) {
            $randomUsers = $users->random(rand(1, 3));

            foreach ($randomUsers as $user) {
                Screenwriter::firstOrCreate([
                    'film_id' => $film->id,
                    'user_id' => $user->id,
                ]);
            }
        }
    }
}
