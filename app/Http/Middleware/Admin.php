<?php

namespace App\Http\Middleware;

use Closure;

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
        if ($request->user()->id_perfil!=1) {
            return redirect()->back()->with('mensaje','No Tienes Permisos Para Realizar Esta Acción');
        }
        return $next($request);
    }
}
