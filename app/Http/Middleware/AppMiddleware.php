<?php
declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AppMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
    }

    public function __invoke(Middleware $middleware): void
    {
        $middleware->alias([
            'admin' => CheckAdminAccess::class,
            'role' => CheckRole::class
        ]);

        $middleware->appendToGroup('web', [
            EnsureTokenIsValid::class
        ]);

        $middleware->appendToGroup('admin', [
            CheckAdminAccess::class
        ]);

        $middleware->priority([
            \App\Http\Middleware\CheckAdminAccess::class,
            \Illuminate\Cookie\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \Illuminate\Foundation\Http\Middleware\ValidateCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            \App\Http\Middleware\EnsureTokenIsValid::class,
        ]);
    }
}
