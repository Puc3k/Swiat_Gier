<?php

declare(strict_types=1);

namespace App\Repository\Eloquent;

use App\Models\User;
use App\Repository\UserRepository as UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    private $userModel;

    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }
    public function updateModel(User $user, array $data): void
    {
        $user->email = $data['email'] ?? $user->email;
        $user->name = $data['name'] ?? $user->name;
        $user->phone = $data['phone'] ?? $user->phone;
        $user->avatar = $data['avatar'] ?? null;

        $user->save();
    }

}
