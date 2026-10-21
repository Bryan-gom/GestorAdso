@extends('layouts.app')
@section('title', 'Aprendices')

@section('content')
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
        <div>
            <h2 style="margin: 0; font-size: 22px; color: #0f172a;">Listado de Aprendices</h2>
            <p style="margin: 4px 0 0 0; font-size: 13px; color: #64748b;">
                Registros activos en base de datos (Página actual: {{ $aprendices->currentPage() }} de {{ $aprendices->lastPage() }} | Total: {{ $aprendices->total() }})
            </p>
        </div>
        <a href="{{ route('aprendices.create') }}" class="btn">+ Nuevo Aprendiz</a>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 60px;">ID</th>
                <th>Nombre</th>
                <th>Documento</th>
                <th>Correo Electrónico</th>
                <th>Ficha</th>
                <th>Registrado</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($aprendices as $aprendiz)
                <tr>
                    <td><span class="badge badge-id">#{{ $aprendiz->id }}</span></td>
                    <td style="font-weight: 600; color: #0f172a;">{{ $aprendiz->nombre }}</td>
                    <td><code>{{ $aprendiz->documento }}</code></td>
                    <td>{{ $aprendiz->correo }}</td>
                    <td>
                        @if($aprendiz->ficha_id)
                            <span class="badge badge-ficha">Ficha {{ $aprendiz->ficha_id }}</span>
                        @else
                            <span style="color: #94a3b8; font-size: 13px;">Sin asignar</span>
                        @endif
                    </td>
                    <td style="font-size: 13px; color: #64748b;">
                        {{ $aprendiz->created_at ? $aprendiz->created_at->format('d/m/Y H:i') : 'N/A' }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center; padding: 32px; color: #64748b;">
                        No hay aprendices registrados actualmente en la base de datos.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="pagination-container">
        {{ $aprendices->links() }}
    </div>
</div>
@endsection
