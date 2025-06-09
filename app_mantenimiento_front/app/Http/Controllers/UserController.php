<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = User::all(); 
        $usuarios_activos = User::where('estado', 'Activo')->get();
        $usuarios_inactivos = User::where('estado', 'Inactivo')->get();
        $usuarios_vacaciones = User::where('estado', 'Vacaciones')->get();

        return view('usuario', compact('usuarios', 'usuarios_activos', 'usuarios_inactivos', 'usuarios_vacaciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $new_user = User::create([
            
            'nombre'  =>  $request->nombre,
            'img_user' => $request->img_user,
            'estado'  =>  $request->estado,
            'email'  =>  $request->email,
            'rol'  =>  $request->rol,
            'password'  =>  $request->password
        ]);
        $new_user->save();

        return back()->with('success', 'Equipo creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            // Encuentra el equipo por ID
            $equipo = User::findOrFail($id);

            // Actualiza los campos del equipo
            $equipo->update([
                'nombre' => $request->nombre,
                'img_user' => $request->apellido,
                'estado' => $request->estado,
                'email' => $request->email,
                'rol' => $request->rol,
                'password' => $request->password
            ]);

            // Retorna una respuesta JSON para que JavaScript la pueda manejar
            return response()->json(['message' => 'Usuario actualizado correctamente.'], 200);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Si el equipo no se encuentra
            return response()->json(['message' => 'Usuario no encontrado.'], 404);
        } catch (\Exception $e) {
            // Para cualquier otro error durante la actualización
            return response()->json(['message' => 'Error al actualizar el Usuario: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         try {
            // Opción 1: Usando Eloquent (RECOMENDADO)
            $usuario = User::findOrFail($id); // Encuentra el usuario o lanza 404
            $usuario->delete(); // Elimina el usuario

            // Retorna una respuesta JSON para que JavaScript la pueda manejar
            return response()->json(['message' => 'Usuario eliminado correctamente.'], 200);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Si el usuario no se encuentra
            return response()->json(['message' => 'Usuario no encontrado.'], 404);
        } catch (\Exception $e) {
            // Para cualquier otro error durante la eliminación
            return response()->json(['message' => 'Error al eliminar el usuario: ' . $e->getMessage()], 500);
        }
    }
}
