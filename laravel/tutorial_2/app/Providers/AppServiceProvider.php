<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
         // Dao Registration
        $this->app->bind('App\Contracts\Dao\Task\TaskDaoInterface', 'App\Dao\Task\TaskDao');
        $this->app->bind('App\Contracts\Dao\Auth\AuthDaoInterface', 'App\Dao\Auth\AuthDao');
        $this->app->bind('App\Contracts\Dao\Auth\ForgetPasswordDaoInterface', 'App\Dao\Auth\ForgetPasswordDao');

        // Business logic registration
        $this->app->bind('App\Contracts\Services\Task\TaskServiceInterface', 'App\Services\Task\TaskService');
        $this->app->bind('App\Contracts\Services\Auth\AuthServiceInterface', 'App\Services\Auth\AuthService');
        $this->app->bind('App\Contracts\Services\Auth\ForgetPasswordServiceInterface', 'App\Services\Auth\ForgetPasswordService');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
