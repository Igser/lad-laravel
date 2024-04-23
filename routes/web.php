<?php
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use Illuminate\Foundation\Configuration\Middleware;

Route::get('/', function () {
    return view('welcome', ['title' => 'Welcome Page']);
});

Route::match(['get', 'post'], '/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/posts/{id}', function (int $id) {
    return 'Post ID:' . $id;
})->where(['id' => '[0-9]+']);

Route::get('/posts', [Controllers\PostsController::class, 'index']);

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

Route::fallback(function () {
    abort(404, '404 Page not found');
    //return response('404 Page not found', 404);
});
