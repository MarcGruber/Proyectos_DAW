<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class roleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role )
    {
        
        if (auth()->user()->role == $role || auth()->user()->role == "admin" ) {
            
            // $_SESSION['rol'] = auth()->user()->role;
            // echo( $_SESSION['rol']);
           return $next($request);

       } 
       abort(403);
   }
 }