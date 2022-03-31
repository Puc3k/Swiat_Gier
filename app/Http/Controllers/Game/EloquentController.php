<?php

declare(strict_types=1);

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\Game;
use function view;

class EloquentController extends Controller
{
    public function index(): View
    {
        $game = Game::destroy(99);

        $games = Game::with('genre')
        ->orderBy('created_at')
        ->paginate(10);

        return view('game.eloquent.list', [
            'games' => $games
        ]);
    }

    public function dashboard(): View
    {
        $bestGames = Game::best()->get();
        $stat = [
            'count' => Game::count(),
            'countScoreGtSeven' => Game::where('score', '>', 7)->count(),
            'max' => Game::max('score'),
            'min' => Game::min('score'),
            'avg' => Game::avg('score'),
        ];

        $scoreStats = Game::select(Game::raw('count(*) as count'), 'score')
            ->having('count', '>', '10')
            ->groupBy('score')
            ->orderBy('count', 'desc')
            ->get();

        return view('game.eloquent.dashboard', [
            'stats' => $stat,
            'bestGames' => $bestGames,
            'scoreStats' => $scoreStats,
        ]);
    }

    public function show(int $gameId): View
    {
        $game= Game::firstWhere('id',$gameId);

        return view('game.eloquent.show', [
            'game' => $game,
        ]);
    }
}
