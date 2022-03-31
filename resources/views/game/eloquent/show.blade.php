@extends('layout.main')

@section('content')
<div class="card">
    @if(!empty($game))
        <h5 class="card-header">{{ $game->title }}</h5>
        <div class="card-body">
            <ul>
                <li>Id: {{ $game->id }}</li>
                <li>Nazwa: {{ $game->title }}</li>
                <li>Wydawca: {{ $game->publisher }}</li>
                <li>Gatunek:
                    <span> ID: {{ $game->genre_id }} </span>
                    <span> Nazwa: {{ $game->genre->name}} </span>
                    </li>
                <li>Opis: {{ $game->description }}</li>
            </ul>
            <a href="{{ route('games.e.list') }}" class="btn btn-light">Powrót</a>

        </div>

    @else
        <h5 class="card-header">Brak danych do wyświetlenia</h5>
    @endif

</div>
@endsection
