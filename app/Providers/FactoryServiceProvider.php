<?php

namespace App\Providers;

use App\Factory\CustomerFactory;
use App\Factory\CustomerFactoryInterface;
use App\Factory\CustomerStrengthFactory;
use App\Factory\CustomerStrengthFactoryInterface;
use App\Factory\StrengthFactory;
use App\Factory\StrengthFactoryInterface;
use App\Factory\UserFactory;
use App\Factory\UserFactoryInterface;
use Illuminate\Support\ServiceProvider;

class FactoryServiceProvider extends ServiceProvider
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
        $this->app->bind(CustomerFactoryInterface::class, CustomerFactory::class);
        $this->app->bind(CustomerStrengthFactoryInterface::class, CustomerStrengthFactory::class);
        $this->app->bind(UserFactoryInterface::class, UserFactory::class);
        $this->app->bind(StrengthFactoryInterface::class, StrengthFactory::class);
    }
}
