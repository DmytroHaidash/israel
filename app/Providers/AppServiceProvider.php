<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Direction;
use App\Models\Setting;
use App\Services\Navigation;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
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
    public function boot()
    {
        Schema::defaultStringLength(191);

        app()->singleton('settings', function () {
            return Setting::with('translates')->first();
        });

        app()->singleton('nav', function () {
            return new Navigation();
        });

        View::composer(['app.*', 'auth.*'], function () {
            View::share('locales', collect(config('app.locales'))->filter(function ($l) {
                return $l !== app()->getLocale();
            }));

            View::share('departments', Direction::where('published', 1)->get());
        });

        View::composer(['admin.commands.*', 'admin.directions.*', 'admin.services.*'], function() {
           View::share('categories', Category::all());
        });
    }
}
