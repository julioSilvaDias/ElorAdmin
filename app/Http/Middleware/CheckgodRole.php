<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckgodRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $authUser = Auth::user();
        $userToDelete = $request->route("user");

        if(!$userToDelete){
            return redirect()->route('users.index')->with('error', 'El usuario no existe.');
        }

        if($userToDelete->role_id === 1 && $authUser->role_id !== 1){
            return redirect()->route('users.index')->with('error','No tienes permisos para borrar ese usuario.');
        }

        return $next($request);
    }
}
