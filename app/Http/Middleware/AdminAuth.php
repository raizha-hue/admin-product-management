<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class AdminAuth
{
    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken();

        if (!$token) {
            return response()->json([
                'message' => 'Authentication token required'
            ], 401);
        }

        $user = User::where('api_token', $token)->first();

        if (!$user || !$user->is_admin) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        $request->setUserResolver(function () use ($user) {
            return $user;
        });

        return $next($request);
    }
}