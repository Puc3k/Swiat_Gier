<?php

declare(strict_types=1);

namespace App\Repository\Eloquent;

use App\Models\Game;
use App\Repository\GameRepository as GameRepositoryInterface;
use App\Service\FakeService;

class GameRepository implements GameRepositoryInterface
{
    private Game $gameModel;

    //public function __construct(Game $gameModel, FakeService $config)
    public function __construct(Game $gameModel)
    {
        $this->gameModel = $gameModel;
    }

    public function get(int $id)
    {
        return $this->gameModel->find($id);
    }

    public function all()
    {
        return $this->gameModel
            ->with('genres')
            ->orderBy('created_at')
            ->get();
    }

    public function allPaginated(int $limit)
    {
        return $this->gameModel
            ->with('genres')
            ->orderBy('created_at')
            ->paginate($limit);
    }
    public function filterBy(?string $phrase, string $type = self::TYPE_DEFAULT, int $limit = 15)
    {
        $query = $this->gameModel
            ->with('genres')
            ->orderBy('created_at');

        if($phrase)
        {
            $query->whereRaw('name like ?',["$phrase%"]);
        }
        if($type !== GameRepository::TYPE_ALL)
        {
            $query->where('type',$type);
        }
        return $query
            ->paginate($limit);
    }

    public function best()
    {
        return $this->gameModel
            ->with('genres')
            ->best()
            ->get();
    }

    public function stats()
    {
        return [
            'count' => $this->gameModel->count(),
            'countScoreGtSeventy' => $this->gameModel->where('metacritic_score', '>=', 70)->count(),
            'max' => $this->gameModel->max('metacritic_score'),
            'min' => $this->gameModel->min('metacritic_score'),
            'avg' => round($this->gameModel->avg('metacritic_score'), 2),
        ];
    }

    public function scoreStats()
    {
        return $this->gameModel->select(
            $this->gameModel->raw('count(*) as count'), 'metacritic_score'
        )
        ->having('metacritic_score', '>=', 70)
        ->groupBy('metacritic_score')
        ->orderBy('metacritic_score', 'desc')
        ->get();
    }

}
