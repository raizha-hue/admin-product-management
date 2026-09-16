<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WebAdminAuth
{
    public function handle(
        Request $request,
        Closure $next
    ): Response {

        if (!session()->has('admin_id')) {
            return redirect('/admin/login')
                ->with('error', 'Please login first.');
        }

        return $next($request);
    }
}