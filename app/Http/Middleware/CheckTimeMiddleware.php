<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckTimeMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $currentTime = now()->format('H:i');

        if ($this->isWithinAllowedTimeRange($currentTime)) {
            return $next($request);
        }

        return response()->view('error', [], 404); 
    }

    private function isWithinAllowedTimeRange($time)
    {
        return ($time >= '10:00' && $time <= '18:00');
    }
}
