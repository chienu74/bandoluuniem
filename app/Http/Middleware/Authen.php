<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Authen
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (!auth()->check()) {
            return redirect('Admin/Login');
            // return redirect()->route('admin.login');
        }
        // if (isset($_SESSION['login'])) {
        //     return redirect('Admin/Login');
        // }
        return $next($request);
    }
}
