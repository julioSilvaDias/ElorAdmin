<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $page = $request->input('page', 1);

        $users = User::orderBy('created_at')->paginate($perPage);

        return response()->json([
            'Usuarios' => $users->items(),
            'Elementos Totales' => $users->total(),
            'Itens por pagina' => $users->perPage(),
            'Pagina Actual' => $users->currentPage(),
            'ultima pagina' => $users->lastPage(),

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    
    $validatedData = $request->validate([
        'user' => 'required|string|max:255',
        'tel1' => 'required|string|max:15',
        'tel2' => 'nullable|string|max:15',
        'address' => 'required|string|max:255',
        'dni' => 'required|string|unique:users,dni|max:20',
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8|confirmed', 
    ]);

    $user = User::create([
        'user' => $validatedData['user'],
        'tel1' => $validatedData['tel1'],
        'tel2' => $validatedData['tel2'] ?? null,
        'address' => $validatedData['address'],
        'dni' => $validatedData['dni'],
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'password' => bcrypt($validatedData['password']),
    ]);

    $user->save();

    return response()->json($user);
}


    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'user' => 'required|string|max:255',
            'tel1' => 'required|string|max:15',
            'tel2' => 'nullable|string|max:15',
            'address' => 'required|string|max:255',
            'dni' => 'required|string|unique:users,dni|max:20',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed', 
        ]);
    
        $user = User::update([
            'user' => $validatedData['user'],
            'tel1' => $validatedData['tel1'],
            'tel2' => $validatedData['tel2'] ?? null,
            'address' => $validatedData['address'],
            'dni' => $validatedData['dni'],
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        return response()->json(data: $user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['message' => 'Usuario eliminado con exito']);
    }
}
