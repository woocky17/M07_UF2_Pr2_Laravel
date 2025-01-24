<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies List</title>

    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Include any additional stylesheets or scripts here -->
    <style>
        .custom-width {
            max-width: 300px;
        }
    </style>
</head>

<body class="container">

    <h1 class="mt-4">Lista de Peliculas</h1>
    <ul>
        <li><a href=/filmout/countFilms>Pelis totales</a></li>
        <li><a href=/filmout/oldFilms>Pelis antiguas</a></li>
        <li><a href=/filmout/newFilms>Pelis nuevas</a></li>
        <li><a href={{route("byGenre", ['genre' => 'Comedia'])}}>Pelis genre</a></li>
        <li><a href={{route("byYear", ['year' => "1985"])}}>Pelis year</a></li>
        <li><a href={{route("sortFilms")}}>Pelis sorted by year</a></li>
    </ul>
    <h1>Añadir Pelicula</h1>
    <form action={{route("addFilm")}} method="post">
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
    </form>
    <!-- Add Bootstrap JS and Popper.js (required for Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- Include any additional HTML or Blade directives here -->

</body>

</html>