<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{

    public function index(): View
    {
       $games = DB::table('games')
           ->join('genres','games.genre_id','=','genres.id')
           ->select(
               'games.id','games.title','games.score',
               'genres.id as genre_id','genres.name as genre_name')
           ->orderBy('score','desc')
           ->get();

       $stat = [
           'count' => DB::table('games')->count(),
           'countScoreGtSeven' => DB::table('games')->where('score','>',70)->count(),
           'max'=> DB::table('games')->max('score'),
           'min'=>DB::table('games')->min('score'),
           'avg'=>DB::table('games')->avg('score'),
       ];

        $bestGames = DB::table('games')
            ->join('genres','games.genre_id','=','genres.id')
            ->select(
                'games.id','games.title','games.score',
                'genres.id as genre_id','genres.name as genre_name')
            ->where('score','>',90)
            ->get();

        return view('game.list',[
            'games'=>$games,
            'stats'=>$stat,
            'bestGames'=>$bestGames,
        ]);
    }

    public function show(int $gameId): View
    {
        $game = DB::table('games')
            ->find($gameId);

        return view('game.show',[
            'game'=> $game,
        ]);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
