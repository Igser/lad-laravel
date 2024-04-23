<?php

namespace App\Providers;


use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Route::pattern('id', '[0-9]+');

        Route::model('user', User::class);

        // Изменение логики связывания
        /*Route::bind('user', function (string $value) {
            return User::where('name', $value)->firstOrFail();
        });*/
    }
}
