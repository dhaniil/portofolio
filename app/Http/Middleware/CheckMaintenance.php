<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckMaintenance
{
    public function handle(Request $request, Closure $next)
    {
        if (env('MAINTENANCE_MODE') === 'true' || env('MAINTENANCE_MODE') === true) {
            return response()->view('maintenance');
        }

        return $next($request);
    }
}