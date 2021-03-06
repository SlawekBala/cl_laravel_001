<?php

namespace App\Http\Middleware;

use Closure;

class Acl
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

        $user = $request->user();
        if(!$user) {
            return redirect(route('login'));
        }

        $actions = $request->route()->getAction();
        if (!$user->isRole($actions['roles'])){
            return redirect(route('401'));
        }

        return $next($request);
    }
}
