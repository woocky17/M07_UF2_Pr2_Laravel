<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Movies List')</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }

        .navbar {
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: 600;
            font-size: 1.5rem;
        }

        .nav-link {
            font-weight: 400;
            transition: 0.3s ease-in-out;
        }

        .nav-link:hover {
            color: #ffc107 !important;
        }

        .container-content {
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
        }

        .header img,
        .footer img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .footer {
            margin-top: 30px;
            text-align: center;
            padding: 20px;
            background: #343a40;
            color: #ffffff;
            border-radius: 10px;
        }
    </style>
</head>

<body>

    <div class="container mt-4">
        <div class="header">
            <h1>🎬 Bienvenido a MovieApp</h1>
            <p>Explora y descubre tus películas favoritas</p>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">🎬 Películas</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="/filmout/countFilms">Pelis Totales</a></li>
                    <li class="nav-item"><a class="nav-link" href="/filmout/films">Lista Películas</a></li>
                    <li class="nav-item"><a class="nav-link" href="/filmout/oldFilms">Pelis Antiguas</a></li>
                    <li class="nav-item"><a class="nav-link" href="/filmout/newFilms">Pelis Nuevas</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('byGenre', ['genre' => 'Comedia']) }}">🎭
                            Género</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('byYear', ['year' => '1985']) }}">📅 Año</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="/filmout/sortFilms">🔀 Ordenar</a></li>

                </ul>
            </div>
        </div>
    </nav>


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">🎬 Actores</a>

            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="/actorout/listActors">🎭 Actores</a></li>
                    <li class="nav-item">
                        <select class="form-control" onchange="location.href='/actorout/getByDecade/' + this.value">
                            <option value="">📆 Seleccionar década</option>
                            <option value="1980">1980 - 1989</option>
                            <option value="1990">1990 - 1999</option>
                            <option value="2000">2000 - 2009</option>
                            <option value="2010">2010 - 2019</option>
                            <option value="2020">2020 - 2029</option>
                        </select>
                    </li>
                    <li>
                    <li class="nav-item"><a class="nav-link" href="/actorout/countActors">🎭 Actores Totales</a></li>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="container-content">
            @yield('content')
        </div>
    </div>



    <div class="container">
        <div class="footer">
            <p>© {{ date('Y') }} 🎥 MovieApp | Todos los derechos reservados.</p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>