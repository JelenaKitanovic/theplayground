<?php

namespace App\Providers;

use App\Service\CustomerService;
use App\Service\CustomerServiceInterface;
use App\Service\CustomerStrengthService;
use App\Service\CustomerStrengthServiceInterface;
use App\Service\UserService;
use App\Service\UserServiceInterface;
use Illuminate\Support\ServiceProvider;

class ServiceServiceProvider extends ServiceProvider
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
        $this->app->bind(CustomerServiceInterface::class, CustomerService::class);
        $this->app->bind(CustomerStrengthServiceInterface::class, CustomerStrengthService::class);
        $this->app->bind(UserServiceInterface::class, UserService::class);
    }
}
