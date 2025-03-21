@extends('layouts.app')

@section('title', $title)

@section('content')

    <h1 class="text-center mt-3">{{ $title }}</h1>



    @if(empty($actors))
        <div class="alert alert-danger text-center" role="alert">
            No se ha encontrado ninguna película.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-striped text-center">
                <thead class="thead-dark">
                    <tr>
                        @foreach($actors as $actor)
                            @foreach(array_keys($actor) as $key)
                                <th>{{ ucfirst($key) }}</th>
                            @endforeach
                            @break
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($actors as $actor)
                        <tr>
                            <td>{{ $actor['name'] }}</td>
                            <td>{{ $actor['surname'] }}</td>
                            <td>{{ $actor['birthdate'] }}</td>
                            <td>{{ $actor['country'] }}</td>
                            <td>
                                <img src="{{ $actor['img_url'] }}" class="img-fluid rounded" style="width: 100px; height: 120px;" />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    @endif

@endsection