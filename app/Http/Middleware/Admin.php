<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
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

        if(!Auth::user()->admin) {
            toastr()->info('Vous n\'êtes pas autorisé à acceder à page ou à effectuer cette action.');
            return redirect()->back();
        }

        return $next($request);
    }
}
