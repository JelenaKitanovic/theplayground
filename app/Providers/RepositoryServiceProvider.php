<?php

namespace App\Providers;

use App\Repository\EloquentStrengthRepository;
use App\Repository\EloquentUserRepository;
use App\Repository\EloquentCustomerStrengthRepository;
use App\Repository\StrengthRepositoryInterface;
use App\Repository\CustomerRepositoryInterface;
use App\Repository\CustomerStrengthRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
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
        $this->app->bind(CustomerRepositoryInterface::class, EloquentUserRepository::class);
        $this->app->bind(StrengthRepositoryInterface::class, EloquentStrengthRepository::class);
        $this->app->bind(CustomerStrengthRepositoryInterface::class, EloquentCustomerStrengthRepository::class);
    }
}
