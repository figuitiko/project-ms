<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
          'App\Repositories\QuizzedRepositoryInterface',
            'App\Repositories\QuizzedRepository'
        );
        $this->app->bind(
            'App\Repositories\AppliedGuideRepositoryInterface',
                'App\Repositories\AppliedGuideRepository'
        );

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
