<?php

namespace MichielKempen\NovaOrderField;

use Illuminate\Support\Facades\Route;
use Laravel\Nova\Nova;
use Laravel\Nova\Events\ServingNova;
use Illuminate\Support\ServiceProvider;

class OrderFieldServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Nova::serving(function (ServingNova $event) {
            Nova::script('order-field', __DIR__.'/../dist/js/field.js');
        });

        Nova::router()
            ->group(function ($router) {
                $router->get('index-order-field', function ($request) {
                    return inertia('IndexOrderField');
                });
            });

        $this->app->booted(function () {
            $this->loadRoutes();
        });
    }

    /**
     * Register the field's routes.
     *
     * @return void
     */
    protected function loadRoutes()
    {
        Nova::router()
            ->group(function ($router) {
                $router->get('index-order-field', function ($request) {
                    return inertia('IndexOrderField');
                });
            });

        if ($this->app->routesAreCached()) {
            return;
        }

        Route::middleware(['nova', 'api'])
            ->prefix('nova-vendor/michielkempen/nova-order-field')
            ->group(__DIR__.'/../routes/api.php');
    }
}
