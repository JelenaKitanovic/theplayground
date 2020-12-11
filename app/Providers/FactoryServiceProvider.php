<?php

namespace App\Providers;

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
        $this->app->bind(UserFactoryInterface::class, UserFactory::class);
        $this->app->bind(StrengthFactoryInterface::class, StrengthFactory::class);
    }
}
