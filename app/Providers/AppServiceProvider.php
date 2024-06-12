<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{

    /**
     * All of the container bindings that should be registered.
     *
     * @var array
     */
    public $bindings = [

        ServerProvider::class => RealRashid\SweetAlert\SweetAlertServiceProvider::class,

    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
    }

}
