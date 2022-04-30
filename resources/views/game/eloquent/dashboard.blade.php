@extends('layout.main')

@section('content')
    <div class="row mt-3">
        <div class="col-x col-xl-3 col-md-6 mb-4">
            <div class="card border-left shadow-sm py-2 h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Liczba gier</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['count'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-gamepad fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow-sm py-2 h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Liczba gier 70+</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['countScoreGtSeventy'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-star-half-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow-sm py-2 h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Średnia ocena</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['avg'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-thermometer-half fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow-sm py-2 h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Maksymalna ocena</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['max'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-thermometer-full fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow-sm py-2 h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Minimalna ocena</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['min'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-thermometer-empty fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Statystyka ocen</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Ocena</th>
                        <th>Liczba gier z oceną</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tbody>
                    @foreach($scoreStats ?? [] as $statRow)
                        <tr>
                            <td>{{ $statRow->score }}</td>
                            <td>{{ $statRow->count }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Best of the best</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Lp</th>
                        <th>Tytuł</th>
                        <th>Ocena</th>
                        <th>Steam Id</th>
                        <th>Kategoria</th>
                        <th>Opcje</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($bestGames ?? [] as $game)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $game->name }}</td>
                            <td>{{ $game->score }}</td>
                            <td>{{ $game->steamId }}</td>
                            <td>{{ $game->genres->implode('name', ', ') }}</td>
                            <td>
                                <a href="{{ route('games.show', ['game' => $game->id]) }}">Szczegóły</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
