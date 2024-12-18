<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class User
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->withErrors(['error' => 'You must be logged in to access this page.']);
        }

        if ($user->role_id !== 2) {
            return redirect('/')->withErrors(['error' => 'Access denied for regular users.']);
        }

        return $next($request);
    }
}
