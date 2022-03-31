@extends('layout.main')

@section('content')
    <br>
    <div class="row mt3">
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
        <div class="col-x col-xl-3 col-md-6 mb-4">
            <div class="card border-left shadow-sm py-2 h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Liczba gier 7+</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['countScoreGtSeven'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-star-half-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-x col-xl-3 col-md-6 mb-4">
            <div class="card border-left shadow-sm py-2 h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">średnia ocena</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['avg'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-thermometer-half fa-2x text-gray-300"></i>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-x col-xl-3 col-md-6 mb-4">
            <div class="card border-left shadow-sm py-2 h-100">
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
        <div class="col-x col-xl-3 col-md-6 mb-4">
            <div class="card border-left shadow-sm py-2 h-100">
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
               <table class="table table-bordered" id="dataTable" width="100%">
                   <thead>
                   <tr>
                       <th>Ocena</th>
                       <th>Liczba gier z oceną</th>
                   </tr>
                   </thead>
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
    <br>
    <div class="mt3">
        <div class="card mb-3">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Best of the best</div>
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
                    @foreach($bestGames ?? [] as $game)
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
            </div>
        </div>
    </div>
@endsection
