<?php

namespace App\Ship\Providers;

use App\Ship\Parents\Providers\MainServiceProvider as ParentMainServiceProvider;
use App\Ship\Providers\Filament\AdminPanelProvider;
use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use Carbon\Carbon;
use Jenssegers\Date\Date;
use Filament\Support\Facades\FilamentView;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;

class ShipProvider extends ParentMainServiceProvider
{
    /**
     * Register any Service Providers on the Ship layer (including third party packages).
     */
    public array $serviceProviders = [
        EventServiceProvider::class,
        RouteServiceProvider::class,
    ];

    /**
     * Register any Alias on the Ship layer (including third party packages).
     */
    protected array $aliases = [];

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        parent::boot();
        FilamentView::spa(true);
        Carbon::setLocale(config('app.locale'));
        Date::setLocale(config('app.locale'));
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        parent::register();

        /*
         * Load the ide-helper service provider only in non production environments.
         */
        if ($this->app->isLocal()) {
            $this->app->register(IdeHelperServiceProvider::class);
        }
        $this->app->register(AdminPanelProvider::class);

        Config::macro('unset', function ($key) {
            Arr::forget($this->items, $key);
        });
    }
}
