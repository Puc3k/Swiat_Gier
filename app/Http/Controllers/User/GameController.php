<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddGameToUserList;
use App\Http\Requests\RateGame;
use App\Http\Requests\RemoveGameFromUserList;
use App\Repository\GameRepository;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    private GameRepository $gameRepository;
    public function __construct(GameRepository $gameRepository)
    {
        $this->gameRepository = $gameRepository;
    }
    public function list()
    {

        $user = Auth::user();

        return view('me.game.list',[
           'games'=> $user->games()->paginate()
        ]);
    }

    public function add(AddGameToUserList $request)
    {
        $data = $request->validated();
        $gameId= (int)$data['gameId'];

        $game = $this->gameRepository->get($gameId);

        $user = Auth::user();
        $user->addGame($game);

        return redirect()
            ->route('games.show',['game'=>$gameId])
            ->with('success','Gra została dodana');
    }

    public function remove(RemoveGameFromUserList $request)
    {
        $data = $request->validated();
        $gameId= (int)$data['gameId'];

        $game = $this->gameRepository->get($gameId);
        $user = Auth::user();

        $user->removeGame($game);

        return redirect()
            ->route('games.show',['game'=>$gameId])
            ->with('success','Gra została usnięta');
    }

    public function rate(RateGame $request)
    {
        $data = $request->validated();
        $gameId= (int)$data['gameId'];
        $rate = $data['rate'] ? (int) $data['rate'] : null;

        $game = $this->gameRepository->get($gameId);

        $user = Auth::user();
        $user->rateGame($game,$rate);
        return redirect()
            ->route('me.games.list')
            ->with('success','Ocena została zapisana');
    }
}
