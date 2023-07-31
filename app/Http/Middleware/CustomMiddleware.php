<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
 use Illuminate\Support\Facades\Auth;
 use Illuminate\Support\Facades\Session;
 
class CustomMiddleware     
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
 

     public function handle(Request $request, Closure $next)
     { 
        if (config('fortify.guard') === 'admin')
        {
          if(Auth::guard("admin")->check()){
            return redirect()->route('admin.index');

          }else
          {
            return $next($request);
                  // return  route('admin/login');
  
          }

        }else if($request->is('admins/*') ) 
         {
            return $next($request);
            // return  route('admin/login');
          }

   
         return $next($request);


   
      }
 
 

  
}
