<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()){
            $role = auth()->user()->role;
            switch ($role){
                case 'admin':
                    return redirect()->route('admin.index')->with([
                        'message' => 'Welcome to Admin Dashboard',
                        'classes' => 'green rounded'
                    ]);
                    break;
                case 'teacher':
                    return redirect()->route('teacher.dashboard')->with([
                        'message' => 'Welcome to Teacher Dashboard',
                        'classes' => 'green rounded'
                    ]);
                    break;
            }
            return $next($request);
        }else{
           return redirect()->route('login')->with([
               'message' => 'Please Login',
               'classes' => 'red'
           ]);
        }
    }
}
