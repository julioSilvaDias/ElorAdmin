<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProtectDefaultRoles
{
    private $protectRoles = ['God', 'Administrador', 'Profesor', 'Alumno'];
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $roleToDelete = $request->route('rol');

        if (in_array($roleToDelete->name, $this->protectRoles)){
            return redirect()->route('rols.index')->with('error','No puedes eliminar este rol');
        }

        return $next($request);
    }
}
