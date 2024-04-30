<?php
namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    protected function redirectTo(Request $request): ?string
    {
        if (! $request->expectsJson()) {
            // не аутентифицированных пользователей отправляем
            // на страницу формы входа в личный кабинет
            return route('auth.login');
        }
    }
}
