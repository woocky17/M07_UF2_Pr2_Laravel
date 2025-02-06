<x-app-layout>
    <div>
        <h1 class="mt-4">Lista de Peliculas</h1>
        <ul>
            <li><a href=/filmout/countFilms>Pelis totales</a></li>
            <li><a href="/filmout/films">Lista peliculas</a></li>
            <li><a href=/filmout/oldFilms>Pelis antiguas</a></li>
            <li><a href=/filmout/newFilms>Pelis nuevas</a></li>
            <li><a href={{route("byGenre", ['genre' => 'Comedia'])}}>Pelis genre</a></li>
            <li><a href={{route("byYear", ['year' => "1985"])}}>Pelis year</a></li>
            <li><a href={{route("sortFilms")}}>Pelis sorted by year</a></li>
        </ul>
        <h1>Añadir Pelicula</h1>
        <form action={{route("createFilm")}} method="post">
            @csrf
            <div class="form-group">
                <label>Nombre</label>
                <input name="name" type="text" class="form-control custom-width" />
            </div>
            <div class="form-group">
                <label>Año</label>
                <input name="year" type="number" class="form-control custom-width" />
            </div>
            <div class="form-group">
                <label>Genero</label>
                <input name="genre" type="text" class="form-control custom-width" />
            </div>
            <div class="form-group">
                <label>Pais</label>
                <input name="country" type="text" class="form-control custom-width" />
            </div>
            <div class="form-group">
                <label>Duración</label>
                <input name="duration" type="number" class="form-control custom-width" />
            </div>
            <div class="form-group">
                <label>Imagen URL</label>
                <input name="img_url" type="text" class="form-control custom-width" />

            </div>

            <button class="btn btn-primary">Añadir</button>
            @if (!empty($error))
                <p style="color:red">{{ $error }}</p>
            @endif

        </form>
    </div>
</x-app-layout>