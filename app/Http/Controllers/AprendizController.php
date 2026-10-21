<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AprendizController extends Controller
{
    /**
     * Muestra el listado del recurso.
     */
    public function index()
    {
        // Semana 2: sin BD; solo devolvemos la vista
        return view('aprendices.index');
    }

    /**
     * Muestra el formulario para crear un nuevo recurso.
     */
    public function create()
    {
        return view('aprendices.create');
    }

    /**
     * Almacena un nuevo recurso en el almacenamiento (simulado en S2).
     */
    public function store(Request $request)
    {
        // Validación mínima (simulación de guardado)
        $data = $request->validate([
            'nombre' => ['required', 'string', 'max:120'],
            'documento' => ['required', 'string', 'max:40'],
            'correo' => ['required', 'email', 'max:120'],
        ]);

        // Aquí NO guardamos en BD (lo haremos en Semana 4 con Eloquent).
        // Objetivo Semana 2: comprobar flujo ruta -> acción -> vista -> redirect.
        return redirect()->route('aprendices.index')
            ->with('ok', 'Aprendiz recibido (simulado)');
    }

    /**
     * Muestra el recurso especificado (no usado en Semana 2).
     */
    public function show(string $id)
    {
        abort(404);
    }

    /**
     * Muestra el formulario para editar el recurso especificado (no usado en Semana 2).
     */
    public function edit(string $id)
    {
        abort(404);
    }

    /**
     * Actualiza el recurso especificado en el almacenamiento (no usado en Semana 2).
     */
    public function update(Request $request, string $id)
    {
        abort(404);
    }

    /**
     * Elimina el recurso especificado del almacenamiento (no usado en Semana 2).
     */
    public function destroy(string $id)
    {
        abort(404);
    }
}
