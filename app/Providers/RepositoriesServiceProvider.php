<?php

namespace App\Providers;

use App\Repository\EloquentStrengthRepository;
use App\Repository\EloquentUserRepository;
use App\Repository\EloquentUserStrengthRepository;
use App\Repository\StrengthRepositoryInterface;
use App\Repository\UserRepositoryInterface;
use App\Repository\UserStrengthRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(UserRepositoryInterface::class, EloquentUserRepository::class);
        $this->app->bind(StrengthRepositoryInterface::class, EloquentStrengthRepository::class);
        $this->app->bind(UserStrengthRepositoryInterface::class, EloquentUserStrengthRepository::class);
    }
}
