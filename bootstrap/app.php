<?php

use App\Http\Middleware\AuthCheck;
use App\Http\Middleware\CustomAuthenticate;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use RealRashid\SweetAlert\ToSweetAlert;
use Spatie\Permission\Exceptions\UnauthorizedException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->group('splade', [\ProtoneMedia\Splade\Http\SpladeMiddleware::class]);
        $middleware->alias([
            'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
            'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
            'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class,
            'auth.check' => AuthCheck::class,
        ]);
        $middleware->web(replace: [
            Authenticate::class => CustomAuthenticate::class,
        ]);
        $middleware->web(append: [
            ToSweetAlert::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->renderable(\ProtoneMedia\Splade\SpladeCore::exceptionHandler($exceptions->handler));
        $exceptions->renderable(function (UnauthorizedException $e) {
            return response()->view('auth.errors.unauthorized', [
                'exception' => "Kamu tidak memiliki izin untuk dapat mengakses halaman ini.",
            ], 403);
        });
    })->create();
