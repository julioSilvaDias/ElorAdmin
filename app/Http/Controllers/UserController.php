<?php

namespace App\Http\Controllers;

use App\Models\Ciclo;
use App\Models\CicloUsuario;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Rol;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('id')->get();
        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Rol::all();
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->{"tel-1"} = $request->input('tel-1');
        $user->{"tel-2"} = $request->input('tel-2');
        $user->address = $request->address;
        $user->dni = $request->dni;
        $user->save();
    
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $rol = $user->roles;
        $ciclos = Ciclo::all();
        return view('users.show', ['user' => $user, 'rol' => $rol, 'ciclos' => $ciclos]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->user = $request->user;
        $user->tel1 = $request->tel1;
        $user->tel2 = $request->tel2;
        $user->address = $request->address;
        $user->dni = $request->dni;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        return view('users.show', ['user' => $user]);
    }

    public function matricularCiclo (Request $request, User $user ) {
        
        //Verifica que el usuario tenga rol Alumno
        if ($user -> roles->name !== 'Alumno') {
            return redirect()->back()->withErrors(['error' => 'El usuario no se puede matricular porque no es estudiante. ']);
        }

        $ciclo = Ciclo::findOrFail($request->ciclo_id);

        $user->ciclosMatriculados()->attach($ciclo->id, ['fecha_matricula' => now()]);

        foreach ($ciclo->asignaturas as $asignaturas) {
            $user->asignaturasMatriculadas()->attach($asignaturas->id);
        }

        return redirect()->route('user.show', $user->id)->with('success','El usuario se ha matriculado correctamete. ');

    }

    public function matricular(Request $request, $userId)
    {
        $request->validate([
            'ciclo_id' => 'required|exists:ciclos,id',
        ]);

        CicloUsuario::create([
            'usuario_id' => $userId,
            'ciclo_id' => $request->ciclo_id,
            'fecha_matricula' => now(),
        ]);

        return redirect()->route('users.show', $userId)->with('success', 'Usuario matriculado correctamente en el ciclo.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }

    public function personal() 
    {
        $users = User::orderBy('surname', 'desc')->get();
        return view('personal', ['users' => $users]);
    }

    public function alumnos() 
    {
        $paginationCount = env('PAGINATION_COUNT');
        $users = User::where('role_id', 4)->orderBy('id')->paginate($paginationCount);
        return view('alumnos', ['users' => $users]);
    }
}