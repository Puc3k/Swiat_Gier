<?php

declare(strict_types=1);

namespace App\Http\Controllers\Game;

use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Repository\GameRepository;

use function view;

class GameController extends Controller
{
    private GameRepository $gameRepository;
    public function __construct(GameRepository $repository)
    {
        $this->gameRepository = $repository;
    }
    public function index(): View
    {
        return view('game.list', [
            'games' => $this->gameRepository->allPaginated(10)
        ]);
    }

    public function dashboard(): View
    {
        return view('game.eloquent.dashboard', [
            'stats' => $this->gameRepository->stats(),
            'bestGames' => $this->gameRepository->best(),
            'scoreStats' => $this->gameRepository->scoreStats(),
        ]);
    }

    public function show(int $gameId): View
    {
        return view('game.show', [
            'game' => $this->gameRepository->get($gameId),
        ]);
    }
}
