<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Film;

class FilmController extends Controller
{

    /**
     * Read films from storage
     */
    public static function readFilms(): array
    {
        $filmsDb = FilmController::getFilmFromDb();
        $filmsJson = Storage::json('/public/films.json');

        $films = array_merge($filmsDb, $filmsJson);
        return $films;
    }

    public function listOldFilms($year = null)
    {
        $old_films = [];
        if (is_null($year))
            $year = 2000;

        $title = "Listado de Pelis Antiguas (Antes de $year)";
        $films = FilmController::readFilms();

        foreach ($films as $film) {
            //foreach ($this->datasource as $film) {
            if ($film['year'] < $year)
                $old_films[] = $film;
        }
        return view('films.list', ["films" => $old_films, "title" => $title]);
    }
    /**
     * List films younger than input year
     * if year is not infomed 2000 year will be used as criteria
     */
    public function listNewFilms($year = null)
    {
        $new_films = [];
        if (is_null($year))
            $year = 2000;

        $title = "Listado de Pelis Nuevas (Después de $year)";
        $films = FilmController::readFilms();

        foreach ($films as $film) {
            if ($film['year'] >= $year)
                $new_films[] = $film;
        }
        return view('films.list', ["films" => $new_films, "title" => $title]);
    }
    /**
     * Lista TODAS las películas o filtra x año o categoría.
     */
    public function listFilmsByYear($year = null)
    {
        $films_filtered = [];

        $title = "Listado de todas las pelis";
        $films = FilmController::readFilms();

        //if year and genre are null
        if (is_null($year))
            return view('films.list', ["films" => $films, "title" => $title]);

        //list based on year or genre informed
        foreach ($films as $film) {
            if ((!is_null($year)) && $film['year'] == $year) {
                $title = "Listado de todas las pelis filtrado x año";
                $films_filtered[] = $film;
            }
        }
        return view("films.list", ["films" => $films_filtered, "title" => $title]);
    }
    public function listFilmsByGenre($genre = null)
    {
        $films_filtered = [];

        $title = "Listado de todas las pelis";
        $films = FilmController::readFilms();

        //if year and genre are null
        if (is_null($genre))
            return view('films.list', ["films" => $films, "title" => $title]);

        //list based on year or genre informed
        foreach ($films as $film) {
            if ((!is_null($genre)) && strtolower($film['genre']) == strtolower($genre)) {
                $title = "Listado de todas las pelis filtrado x categoria";
                $films_filtered[] = $film;
            }
        }
        return view("films.list", ["films" => $films_filtered, "title" => $title]);
    }

    /**
     * List all films sorted by year in descending order
     */
    public function sortFilms()
    {
        $films = FilmController::readFilms();
        usort($films, function ($a, $b) {
            return $b['year'] <=> $a['year'];
        });

        $title = "Listado de Pelis Ordenadas por Año (Más Nuevas a Más Antiguas)";
        return view('films.list', ["films" => $films, "title" => $title]);
    }

    public function countFilms()
    {

        $title = "Contador de Pelis";
        $films = FilmController::readFilms();
        $count = count($films);
        return view('films.count', ["count" => $count, "title" => $title]);
    }


    public function listFilms($year = null, $genre = null)
    {
        $films_filtered = [];

        $title = "Listado de todas las pelis";
        $films = FilmController::readFilms();
        $count = count($films);

        if (is_null($year) && is_null($genre))
            return view('films.list', ["films" => $films, "count" => $count, "title" => $title]);

        foreach ($films as $film) {
            if ((!is_null($year) && is_null($genre)) && $film['year'] == $year) {
                $title = "Listado de todas las pelis filtrado x año";
                $films_filtered[] = $film;
            } else if ((is_null($year) && !is_null($genre)) && strtolower($film['genre']) == strtolower($genre)) {
                $title = "Listado de todas las pelis filtrado x categoria";
                $films_filtered[] = $film;
            } else if (!is_null($year) && !is_null($genre) && strtolower($film['genre']) == strtolower($genre) && $film['year'] == $year) {
                $title = "Listado de todas las pelis filtrado x categoria y año";
                $films_filtered[] = $film;
            }
        }
        return view("films.list", ["films" => $films_filtered,  "title" => $title]);
    }

    private function isFilm($films, $name)
    {
        foreach ($films as $film) {
            if ($film['name'] == $name) {
                return true;
            }
        }
        return false;
    }
    public static function getFilmFromDb()
    {
        return Film::select('name', 'year', 'genre', 'country', 'duration', 'img_url')
            ->get()
            ->toArray();
    }
    public function createFilmOnJson(Request $request)
    {
        $newFilm  =
            [
                "name" => $request->name,
                "year" => $request->year,
                "genre" => $request->genre,
                "country" => $request->country,
                "duration" => $request->duration,
                "img_url" => $request->img_url,
            ];

        $films = Storage::json('/public/films.json');
        if (FilmController::isFilm($films, $newFilm['name'])) {
            Session::flash('error', 'Esta película ya existe.');
            return redirect('/');
        }
        array_push($films, $newFilm);
        Storage::put('/public/films.json', json_encode($films));


        $title = "Pelicula añadida";
        $films = FilmController::readFilms();
    }

    public function createFilmOnDb(Request $request)
    {
        $newFilm  =
            [
                "name" => $request->name,
                "year" => $request->year,
                "genre" => $request->genre,
                "country" => $request->country,
                "duration" => $request->duration,
                "img_url" => $request->img_url,
            ];
        Film::table('films')->insert($newFilm);
    }

    public function createFilm(Request $request)
    {
        // FilmController::createFilmOnJson($request);
        FilmController::createFilmOnDb($request);
        return view('welcome');
    }
}
