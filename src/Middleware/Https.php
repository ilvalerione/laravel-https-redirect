<?php

namespace AventureCloud\ForceHttps\Middleware;

use Closure;
use HttpsService;
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
        if (!$request->secure() && HttpsService::needRedirect(App::environment())) {
            return redirect()->secure($request->getRequestUri());
        }


        return $next($request);
    }
}
