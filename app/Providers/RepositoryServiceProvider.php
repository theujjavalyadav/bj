<?php

namespace App\Providers;

use App\Repositories\BusinessRepository;
use app\Repositories\BusinessRepositoryInterface;
use App\Repositories\LocationRepositoryInterface;
use App\Repositories\LocationRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(BusinessRepositoryInterface::class,BusinessRepository::class);
        $this->app->bind(LocationRepositoryInterface::class,LocationRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
