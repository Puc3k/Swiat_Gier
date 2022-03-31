@extends('layout.main')

@section('content')
    <br>
    <div class="card mt3">
        <div class="card">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Gry</div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Lp</th>
                        <th>Id</th>
                        <th>Tytuł</th>
                        <th>Ocena</th>
                        <th>Gatunek</th>
                        <th>Opcja</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Lp</th>
                        <th>Id</th>
                        <th>Tytuł</th>
                        <th>Ocena</th>
                        <th>Gatunek</th>
                        <th>Opcja</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($games ?? [] as $game)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $game->id }}</td>
                            <td>{{ $game->title }}</td>
                            <td>{{ $game->score }}</td>
                            <td>{{ $game->genre->name }}</td>
                            <td><a href="{{ route('game.e.show', ['gameId'=> $game->id]) }}">Szczegóły</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {{ $games->links("pagination::bootstrap-4") }}
            </div>

        </div>
    </div>
@endsection
