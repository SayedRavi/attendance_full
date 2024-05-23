<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
//        $middleware->append(\App\Http\Middleware\RedirectMiddleware::class);
        $middleware->alias([
            'redirect' => \App\Http\Middleware\RedirectMiddleware::class,
            'adminAuth' => \App\Http\Middleware\AdminMiddleware::class,
            'teacherAuth' => \App\Http\Middleware\TeacherMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
