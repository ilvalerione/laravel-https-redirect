<?php

namespace AventureCloud\ForceHttps\HttpsRedirect;

use Closure;
use AventureCloud\HttpsRedirect\Facades\HttpsRedirect;
use Illuminate\Support\Facades\App;

class HttpsCheck
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
        if (!$request->secure() && HttpsRedirect::needRedirect(App::environment())) {
            return redirect()->secure($request->getRequestUri());
        }


        return $next($request);
    }
}
