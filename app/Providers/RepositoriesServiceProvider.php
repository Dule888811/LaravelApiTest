<?php

namespace App\Providers;

use App\Repositories\ApiRepository;
use App\Repositories\ApiRepositoryIterface;
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
        $this->app->bind(ApiRepositoryIterface::class,ApiRepository::class);
    }
}
