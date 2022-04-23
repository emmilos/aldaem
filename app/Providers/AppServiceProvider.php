<?php

namespace App\Providers;
use App\Models\Client;
use Orchid\Platform\Dashboard;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dashboard $dashboard)
    {
        $dashboard->registerSearch([
            //Client::class,
            //...Models
          ]);
    }
}
