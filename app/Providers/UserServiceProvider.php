<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\UserRepository as UserRepositoryInterface;
use App\Repository\Eloquent\UserRepository;


class UserServiceProvider extends ServiceProvider
{
    public function register()
   {
      $this->app->singleton(
          UserRepositoryInterface::class,
          UserRepository::class
      );
    }

}
