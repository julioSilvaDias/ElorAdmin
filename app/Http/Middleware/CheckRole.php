<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
  /**
   * Handle an incoming request.
   *
   * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
   */
  public function handle(Request $request, Closure $next)
  {

    $user = Auth::user();

    if ($user->role_id !== 1 && $user->role_id !== 2) {
      return response()->json(['error' => 'No tienes permisos para modificar el estado de la reunion'], 403);
    }

    return $next($request);
  }
}
