<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class FoliosMiddleware
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
        if(!$user)
            return redirect()->route('login');

        if($user->timbres == 0)
            return redirect()->route('payment.index');

        return $next($request);
    }
}
