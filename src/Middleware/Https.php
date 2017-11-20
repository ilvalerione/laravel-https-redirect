<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class Https
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->secure() && in_array(App::environment(), config('force_https.environments'))) {
            return redirect()->secure($request->getRequestUri());
        }


        return $next($request);
    }
}
