<?php

use App\Models\User;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use Illuminate\Foundation\Configuration\Middleware;

Route::get('/', function () {
    return view('welcome', ['title' => 'Welcome Page']);
})->name('welcome');

Route::match(['get', 'post'], '/', function () {
    return view('home', ['title' => 'Home Page']);
})->name('home');

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

Route::redirect('/blog', '/posts', 301);

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return 'Admin main page';
    });

    Route::get('/posts', function () {
        return 'Admin posts page';
    });

    Route::get('/posts/{id}', function (int $id) {
        return 'Admin posts' . $id;
    });
});

Route::controller(Controllers\OrderController::class)->group(function () {
    Route::get('/orders/{id}', 'show');
    Route::post('/orders', 'store');
});

Route::get('/users/{user}', function (User $user) {

});

Route::fallback(function () {
    abort(404, '404 Page not found');
    //return response('404 Page not found', 404);
});
