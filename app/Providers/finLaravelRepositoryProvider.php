<?php

namespace finLaravel\Providers;

use Illuminate\Support\ServiceProvider;

class finLaravelRepositoryProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot() {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
        $this->app->bind(\finLaravel\Repositories\UserRepository::class, \finLaravel\Repositories\UserRepositoryEloquent::class);

        $this->app->bind(\finLaravel\Repositories\BancoRepository::class, \finLaravel\Repositories\BancoRepositoryEloquent::class);

        $this->app->bind(\finLaravel\Repositories\ContaBancariaRepository::class, \finLaravel\Repositories\ContaBancariaRepositoryEloquent::class);
    }

}
