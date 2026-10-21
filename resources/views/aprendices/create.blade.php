@extends('layouts.app')
@section('title', 'Nuevo Aprendiz')
@section('content')
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 style="margin: 0; font-size: 24px; color: #0f172a;">Nuevo Aprendiz</h2>
        <a href="{{ route('aprendices.index') }}" style="color: #64748b; text-decoration: none; font-size: 14px;">← Volver al listado</a>
    </div>

    <form action="{{ route('aprendices.store') }}" method="POST">
        @csrf
        <label>
            Nombre
            <input type="text" name="nombre" placeholder="Ej. Bryan Gómez" required>
        </label>

        <label>
            Documento
            <input type="text" name="documento" placeholder="Ej. 1020304050" required>
        </label>

        <label>
            Correo
            <input type="email" name="correo" placeholder="Ej. bryan@ejemplo.com" required>
        </label>

        <div style="margin-top: 24px;">
            <button type="submit" class="btn">Guardar</button>
            <a href="{{ route('aprendices.index') }}" style="margin-left: 12px; color: #64748b; text-decoration: none; font-size: 14px;">Cancelar</a>
        </div>
    </form>
</div>
@endsection
