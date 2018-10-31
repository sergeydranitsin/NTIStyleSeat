<?php

namespace App\Http\Middleware;

use Closure;

class CheckBusiness
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
        $user = Auth::user();
        if (empty($user) || !$user->is_business){
            abort (403);
        }
        return $next($request);
    }
}
