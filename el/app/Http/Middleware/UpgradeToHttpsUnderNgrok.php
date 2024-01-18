<?php

namespace App\Http\Middleware;


use Closure;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\URL;

class UpgradeToHttpsUnderNgrok extends Middleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (str_ends_with($request->getHost(), '.ngrok-free.app')) {
            URL::forceScheme('https');
        }

        return $next($request);
    }
}

