<?php

namespace App\Http\Controllers;

use App\Models\Aprendiz;
use Illuminate\Http\Request;

class AprendizController extends Controller
{
    /**
     * Muestra el listado de aprendices paginado.
     */
    public function index()
    {
        $aprendices = Aprendiz::latest()->paginate(10);
        return view('aprendices.index', compact('aprendices'));
    }

    /**
     * Muestra el formulario para crear un nuevo aprendiz.
     */
    public function create()
    {
        return view('aprendices.create');
    }

    /**
     * Almacena un nuevo aprendiz en la base de datos con Eloquent.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required', 'string', 'max:120'],
            'documento' => ['required', 'string', 'max:40', 'unique:aprendices,documento'],
            'correo' => ['required', 'email', 'max:120', 'unique:aprendices,correo'],
            'ficha_id' => ['nullable', 'integer'],
        ]);

        Aprendiz::create($data);

        return redirect()->route('aprendices.index')
            ->with('ok', 'Aprendiz creado');
    }

    public function show(Aprendiz $aprendiz)
    {
        abort(404);
    }

    public function edit(Aprendiz $aprendiz)
    {
        abort(404);
    }

    public function update(Request $request, Aprendiz $aprendiz)
    {
        abort(404);
    }

    public function destroy(Aprendiz $aprendiz)
    {
        abort(404);
    }
}
