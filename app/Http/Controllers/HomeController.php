<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use App\Models\Asignatura_Usuario_Horario;
use App\Models\User;
use App\Models\Ciclo;
use App\Models\Reunion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $homeUrl = route('home');

            if ($request->url() !== $homeUrl) {
                throw new NotFoundHttpException();
            }

            return $next($request);
        });
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        if ($user->role_id == 2 || $user->role_id == 1) {
            $alumnos = User::where('role_id', 4)->get();
            $ciclos = Ciclo::orderBy('id')->get();
            $personal = User::where('role_id', 3)->get();
            $usersSinRol = User::whereNull('role_id')->get();
            $asignaturas = Asignatura::orderBy('id')->get();
            $reunionesHoyAceptada = Reunion::whereDate('fecha-hora-inicio', Carbon::today())->where('estado', 'aceptado')->get();
            $reunionesHoyPendiente = Reunion::whereDate('fecha-hora-inicio', Carbon::today())->where('estado', 'pendiente')->get();
            $reunionesApartirHoy = Reunion::whereDate('fecha-hora-inicio', '>=',Carbon::today())->where('estado', 'pendiente')->orWhere('estado', 'aceptado')->get();
            return view('admin', [
                'alumnos' => $alumnos,
                'personal' => $personal,
                'ciclos' => $ciclos,
                'usersSinRol' => $usersSinRol,
                'asignaturas' => $asignaturas,
                'reunionesHoyAceptada' => $reunionesHoyAceptada,
                'reunionesHoyPendiente' => $reunionesHoyPendiente,
                'reunionesApartirHoy' => $reunionesApartirHoy
            ]);
        } else if ($user->role_id == 3) {
            $asignatura_Usuario_Horarios = Asignatura_Usuario_Horario::where('usuario_id', $user->id)->with('asignatura')->get();
            return view('profesor', ['asignatura_Usuario_Horarios' => $asignatura_Usuario_Horarios]);
        } else if ($user->role_id == 4) {
            $asignatura_Usuario_Horarios = Asignatura_Usuario_Horario::where('usuario_id', $user->id)->with('usuario')->get();
            $cicloUsuarios = $user->cicloUsuarios()->with('ciclo.asignaturas')->get();
            return view('alumno', ['cicloUsuarios' => $cicloUsuarios, 'asignatura_Usuario_Horarios' => $asignatura_Usuario_Horarios]);
        } else {
            return view('home');
        }
    }
}
