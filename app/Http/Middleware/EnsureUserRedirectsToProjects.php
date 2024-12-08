<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUserRedirectsToProjects
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->path() === 'dashboard') {
            return redirect('/projects');
        }

        return $next($request);
    }
}
