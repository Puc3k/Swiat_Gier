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
           ->select('id','title','score','genre_id')
           ->get();

        return view('game.list',[
            'games'=>$games,
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
