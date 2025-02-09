@extends('layouts.app')

@section('title', $title)

@section('content')

<div class="container mt-5">
    <h1 class="header-title">{{ $title }}</h1>
    <div class="text-center">
        <span class="badge badge-primary badge-count" style="font-size: 3rem;">{{ $count }}</span>
    </div>
    <p class="count-text text-center mt-3">Total de películas</p>
</div>

@endsection