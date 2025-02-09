@extends('layouts.app')

@section('title', 'Lista de Películas')

@section('content')
<div>


    <h1>Añadir Película</h1>
    <form action="{{ route('createFilm') }}" method="post">
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
            <label>Género</label>
            <input name="genre" type="text" class="form-control custom-width" />
        </div>
        <div class="form-group">
            <label>País</label>
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
            <p class="alert alert-danger">{{ $error }}</p>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    </form>
</div>
@endsection

