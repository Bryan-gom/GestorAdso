@extends('layouts.app')
@section('title', 'Nuevo Aprendiz')

@section('content')
<div class="card" style="max-width: 620px; margin: 0 auto;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <div>
            <h2 style="margin: 0; font-size: 22px; color: #0f172a;">Nuevo Aprendiz</h2>
            <p style="margin: 4px 0 0 0; font-size: 13px; color: #64748b;">Registro con validación Form Request y persistencia</p>
        </div>
        <a href="{{ route('aprendices.index') }}" style="color: #64748b; text-decoration: none; font-size: 14px; font-weight: 500;">
            ← Volver al listado
        </a>
    </div>

    <form action="{{ route('aprendices.store') }}" method="POST">
        @include('aprendices._form', ['aprendiz' => $aprendiz])
    </form>
</div>
@endsection
