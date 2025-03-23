<?php

namespace App\Http\Controllers;

use App\Models\Actor;

class ActorController extends Controller

{
    public function listActors()


    {
        $actors = Actor::select(
            'name',
            'surname',
            'birthdate',
            'country',
            'img_url',
        )->get()->toArray();

        $actors = json_decode(json_encode($actors), true);
        return view('actors.list', ["actors" => $actors, "title" => "Listado de Actores"]);
    }

    public function countActors()
    {
        $count = Actor::count();
        return view('actors.count', ["count" => $count, "title" => "Contador de Actores"]);
    }

    public function getByDecade($decade)
    {
        $startDate = $decade . '-01-01';
        $endDate = ($decade + 9) . '-12-31';

        $actors = Actor::select('name', 'surname', 'birthdate', 'country', 'img_url')
            ->whereBetween('birthdate', [$startDate, $endDate])
            ->get()->toArray();

        $actors = json_decode(json_encode($actors), true);

        return view('actors.list', ["actors" => $actors, "title" => "Listado de Actores de la década $decade"]);
    }

    public function deleteActor($id)
    {
        $deleted = Actor::where('id', '=', $id)->delete();
        if ($deleted) {
            return response()->json(['action' => 'delete', 'status' => true]);
        } else {
            return response()->json(['action' => 'delete', 'status' => false]);
        }
    }
}
