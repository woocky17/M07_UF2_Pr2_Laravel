@extends('layouts.app')

@section('title', $title)

@section('content')

<h1 class="text-center mt-3">{{ $title }}</h1>



@if(empty($films))
    <div class="alert alert-danger text-center" role="alert">
        No se ha encontrado ninguna película.
    </div>
@else
    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center">
            <thead class="thead-dark">
                <tr>
                    @foreach($films as $film)
                        @foreach(array_keys($film) as $key)
                            <th>{{ ucfirst($key) }}</th>
                        @endforeach
                        @break
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($films as $film)
                    <tr>
                        <td>{{ $film['name'] }}</td>
                        <td>{{ $film['year'] }}</td>
                        <td>{{ $film['genre'] }}</td>
                        <td>{{ $film['country'] }}</td>
                        <td>{{ $film['duration'] }}</td>
                        <td>
                            <img src="{{ $film['img_url'] }}" class="img-fluid rounded" style="width: 100px; height: 120px;" />
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


@endif

@endsection