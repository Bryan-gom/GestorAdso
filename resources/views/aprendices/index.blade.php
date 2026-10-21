@extends('layouts.app')
@section('title', 'Aprendices')
@section('content')
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
        <h2 style="margin: 0; font-size: 24px; color: #0f172a;">Aprendices</h2>
        <a href="{{ route('aprendices.create') }}" class="btn">+ Nuevo</a>
    </div>
    <div style="background: #f8fafc; border: 1px dashed #cbd5e1; border-radius: 6px; padding: 24px; text-align: center; color: #64748b;">
        <p style="margin: 0; font-size: 15px; font-weight: 500; color: #475569;">Listado vacío temporal (Semana 2).</p>
        <p style="margin: 8px 0 0 0; font-size: 13px;">En la Semana 4 se conectará a BD con Eloquent.</p>
    </div>
</div>
@endsection
