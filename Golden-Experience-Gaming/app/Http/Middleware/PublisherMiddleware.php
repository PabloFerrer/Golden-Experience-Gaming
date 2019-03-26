<?php

namespace App\Http\Middleware;

use Closure;

class PublisherMiddleware
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
        if(auth()->user()->role != 2) //not a publisher
            return redirect('home')

        return $next($request);
    }
}
