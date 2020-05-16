<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use \App\Models\User;
use App\Role;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ... $roles)
    {
        if(empty($roles)) $roles = ['admin'];


        foreach ($roles as $role) {

            try {
    
                Role::whereName($role)->firstOrFail(); // make sure we got a "real" role
    
                if (\Auth::user()->hasRole($role)) {
                    return $next($request);
                }
    
            } catch (ModelNotFoundException $exception) {
    
                dd('Could not find role ' . $role);
    
            }
        }
        /*foreach($roles as $role) {
            if($request->user()->role === $role) { 
                return $next($request); 
            } 
        }

        foreach($roles as $role){
            if ($request->user()->hasRole($role)){
                return $next($request);
            }
        }*/ 
        return redirect('/'); 
    }
}
