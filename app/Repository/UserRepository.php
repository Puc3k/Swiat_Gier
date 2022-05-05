<?php

declare(strict_types=1);

namespace App\Repository;
use App\Models\User;
use Illuminate\Support\Collection;

interface UserRepository
{
    public function updateModel(User $user, array $data): void;
    public function all(): Collection;
    public function get(int $id): User;
}
