<?php

declare(strict_types=1);

namespace App\Repository;

interface GameRepository
{

    public function get(int $id);
    public function all();
    public function allPaginated(int $limit);
    public function best();
    public function stats();
    public function scoreStats();

}
