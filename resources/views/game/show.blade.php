@extends('layout.main')

@section('content')
<div class="card">
    @if(!empty($game))
        <div class="card-header d-flex align-content-center justify-content-between text-center">
        <h5>{{ $game->name }}</h5>
            @if($userHasGame)
                <form action="{{ route('me.games.remove') }}" method="post" class="float-right m-0">
                    @method('delete')
                    @csrf
                    <div class="form-row">
                        <input type="hidden" name="gameId" value="{{ $game->id }}">
                        <button type="submit" class="btn btn-primary mb-2">Usuń z listy</button>
                    </div>

                </form>
            @else
                <form action="{{ route('me.games.add') }}" method="post" class="float-right m-0">
                    @csrf
                    <div class="form-row">
                        <input type="hidden" name="gameId" value="{{ $game->id }}">
                        <button type="submit" class="btn btn-primary mb-2">Dodaj do mojej listy</button>
                    </div>

                </form>
            @endif

        </div>
        <div2 class="card-body">
            <ul>
                <li>Id: {{ $game->id }}</li>
                <li>Nazwa: {{ $game->name }}</li>
                <li>Wydawca: {{ $game->publishers->implode('name', ', ') }}</li>
                <li>Gatunek:{{ $game->genres->implode('name', ', ') }}</li>
            </ul>
            <div class="my-4">
                <h4>Krótki opis</h3>
                <div class="mx-2">{!! $game->short_description !!}</div>
            </div>

            <div class="my-4">
                <h4>Opis</h3>
                <div class="mx-2">{!! $game->description !!}</div>
            </div>

            <div class="my-4">
                <h4>About</h3>
                <div class="mx-2">{!! $game->about !!}</div>
            </div>

            <a href="{{ url()->previous() }}" class="btn btn-light">Powrót</a>
        </div2>
    @else
        <h5 class="card-header">Brak danych do wyświetlenia</h5>
    @endif
</div>
@endsection
