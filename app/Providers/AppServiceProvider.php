<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\Rules\ExistsInTable;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('exists_in_table', function ($attribute, $value, $parameters, $validator) {
            $table = $parameters[0];
            $column = $parameters[1];
            return app(ExistsInTable::class, [$table, $column])->passes($attribute, $value);
        });
    }
}
