@extends('layouts.app')
@section('title', 'Nuevo Aprendiz')

@section('content')
<div class="card" style="max-width: 620px; margin: 0 auto;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <div>
            <h2 style="margin: 0; font-size: 22px; color: #0f172a;">Nuevo Aprendiz</h2>
            <p style="margin: 4px 0 0 0; font-size: 13px; color: #64748b;">Registro con persistencia real en MariaDB</p>
        </div>
        <a href="{{ route('aprendices.index') }}" style="color: #64748b; text-decoration: none; font-size: 14px; font-weight: 500;">
            ← Volver al listado
        </a>
    </div>

    @if ($errors->any())
        <div class="alert-danger">
            <strong>Se presentaron errores en el formulario:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('aprendices.store') }}" method="POST">
        @csrf

        <label>
            Nombre completo *
            <input type="text" name="nombre" value="{{ old('nombre') }}" placeholder="Ej. Bryan Gómez" required>
        </label>

        <label>
            Documento de identidad (Único) *
            <input type="text" name="documento" value="{{ old('documento') }}" placeholder="Ej. 1012351439" required>
        </label>

        <label>
            Correo electrónico (Único) *
            <input type="email" name="correo" value="{{ old('correo') }}" placeholder="Ej. bryan@example.com" required>
        </label>

        <label>
            Número de Ficha (Opcional)
            <input type="number" name="ficha_id" value="{{ old('ficha_id') }}" placeholder="Ej. 3412785">
        </label>

        <div style="margin-top: 28px; display: flex; align-items: center; gap: 14px;">
            <button type="submit" class="btn">Guardar Aprendiz</button>
            <a href="{{ route('aprendices.index') }}" style="color: #64748b; text-decoration: none; font-size: 14px;">
                Cancelar
            </a>
        </div>
    </form>
</div>
@endsection
