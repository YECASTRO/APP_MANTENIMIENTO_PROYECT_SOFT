<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equipos = Equipo::all(); 
        return view('equipo', compact('equipos'));
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
        $new_equipo = Equipo::create([
            'nombre'  =>  $request->nombre,
            'marca' => $request->marca,
            'modelo'  =>  $request->modelo,
            'numero_serie'  =>  $request->numero_serie,
            'fecha_adquisicion'  =>  $request->fecha_adquisicion,
            'ubicacion'  =>  $request->ubicacion,
            'manual_usuario'  =>  $request->manual_usuario,
            'img_equipo'  =>  $request->img_equipo,
            'color_equipo'  =>  $request->color_equipo,
        ]);
        $new_equipo->save();

        return back()->with('success', 'Equipo creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Equipo $equipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Equipo $equipo)
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
            $equipo = Equipo::findOrFail($id);

            // Actualiza los campos del equipo
            $equipo->update([
                'nombre' => $request->nombre,
                'marca' => $request->marca,
                'modelo' => $request->modelo,
                'numero_serie' => $request->numero_serie,
                'fecha_adquisicion' => $request->fecha_adquisicion,
                'ubicacion' => $request->ubicacion,
                'manual_usuario' => $request->manual_usuario,
                'img_equipo' => $request->img_equipo,
                'color_equipo' => $request->color_equipo,
            ]);

            // Retorna una respuesta JSON para que JavaScript la pueda manejar
            return response()->json(['message' => 'Equipo actualizado correctamente.'], 200);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Si el equipo no se encuentra
            return response()->json(['message' => 'Equipo no encontrado.'], 404);
        } catch (\Exception $e) {
            // Para cualquier otro error durante la actualización
            return response()->json(['message' => 'Error al actualizar el equipo: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         try {
            // Opción 1: Usando Eloquent (RECOMENDADO)
            $equipo = Equipo::findOrFail($id); // Encuentra el equipo o lanza 404
            $equipo->delete(); // Elimina el equipo

            // Opción 2: Usando el Query Builder (como lo tenías, pero menos Laravel-ish)
            // DB::table('equipos')->where('id', $id)->delete();

            // Retorna una respuesta JSON para que JavaScript la pueda manejar
            return response()->json(['message' => 'Equipo eliminado correctamente.'], 200);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Si el equipo no se encuentra
            return response()->json(['message' => 'Equipo no encontrado.'], 404);
        } catch (\Exception $e) {
            // Para cualquier otro error durante la eliminación
            return response()->json(['message' => 'Error al eliminar el equipo: ' . $e->getMessage()], 500);
        }
    }
}
