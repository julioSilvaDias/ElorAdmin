<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Rol;

class CheckAdminCreateUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $authUser = auth()->user();

        if($authUser ->role_id !==2) {
            return redirect()->route('users.index')
                ->with('error','No tienes permisos para crear usuarios');
        }

        $roleId = $request->input('role_id');
        $godRole= Rol::where('name', 'god')->first();

        if($godRole && $roleId == $godRole->id){
            return redirect()->route('users.index')
            ->with('error','No puedes crear un usuario con el rol GOD');

        }
        return $next($request);
    }
}
