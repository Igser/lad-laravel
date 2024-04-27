<?php

use App\Http\Middleware\EnsureTokenIsValid;
use App\Models\User;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

Route::middleware([EnsureTokenIsValid::class])->group(function () {
    Route::get('/', function () {
        return view('welcome', ['title' => 'Welcome Page']);
    })
        ->name('welcome')
        ->middleware([\App\Http\Middleware\EnsureTokenIsValid::class]);
});

Route::get('/posts/{id}', [Controllers\PostController::class, 'detail'])
    ->where(['id' => '[0-9]+'])
    ->missing(fn(Request $request) => Redirect::route('welcome'));

Route::get('/posts', [Controllers\PostController::class, 'index']);
Route::post('/posts', function () {
    return 'Store posts';
})->withoutMiddleware(VerifyCsrfToken::class);

Route::get('/search/{search}', function (string $search) {
    return 'Searching';
})->where(['search' => '.*']);

Route::post('/login', function (string $search) {
    return 'Login page';
})->name('name');

Route::prefix('admin')->group(function() {
    Route::middleware(['admin', 'role:admin'])->group(function () {
        Route::get('/', function () {
            return 'Admin main page';
        });

        Route::get('/posts', function () {
            return 'Admin posts page';
        });

        Route::get('/posts/{id}', function (int $id) {
            return 'Admin post page' . $id;
        });
    });
});


Route::resource('users', Controllers\UserController::class);

Route::fallback(function () {
    abort(404, '404 Page not found');
});
