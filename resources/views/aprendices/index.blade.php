@extends('layouts.app')
@section('title', 'Aprendices')

@section('content')
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px; flex-wrap: wrap; gap: 12px;">
        <div>
            <h2 style="margin: 0; font-size: 22px; color: #0f172a;">Listado de Aprendices</h2>
            <p style="margin: 4px 0 0 0; font-size: 13px; color: #64748b;">
                Gestión integral (Página {{ $aprendices->currentPage() }} de {{ $aprendices->lastPage() }} | Total registros: {{ $aprendices->total() }})
            </p>
        </div>
        <a href="{{ route('aprendices.create') }}" class="btn">+ Nuevo Aprendiz</a>
    </div>

    <!-- Barra de búsqueda con conservación de query string -->
    <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 12px 16px; margin-bottom: 18px;">
        <form method="GET" action="{{ route('aprendices.index') }}" style="display: flex; gap: 10px; align-items: center; flex-wrap: wrap;">
            <label style="margin: 0; font-size: 14px; font-weight: 600; color: #475569;">Buscar:</label>
            <input 
                type="text" 
                name="q" 
                value="{{ $q ?? '' }}" 
                placeholder="Nombre o documento..." 
                style="margin: 0; max-width: 320px;"
            >
            <button type="submit" class="btn" style="padding: 7px 16px;">Filtrar</button>
            @if(!empty($q))
                <a href="{{ route('aprendices.index') }}" style="font-size: 13px; color: #64748b; text-decoration: none; padding: 6px 10px; background: #e2e8f0; border-radius: 4px;">
                    ✕ Limpiar filtro
                </a>
                <span style="font-size: 13px; color: #0284c7; font-weight: 500;">
                    Filtrando por: <strong>"{{ $q }}"</strong>
                </span>
            @endif
        </form>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 50px;">ID</th>
                <th>Nombre</th>
                <th>Documento</th>
                <th>Correo Electrónico</th>
                <th>Ficha</th>
                <th style="width: 170px; text-align: center;">Acciones</th>
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
                    <td style="text-align: center;">
                        <a href="{{ route('aprendices.edit', $aprendiz) }}" class="btn-sm btn-edit">Editar</a>
                        <form action="{{ route('aprendices.destroy', $aprendiz) }}" method="POST" onsubmit="return confirm('¿Eliminar?')" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-sm btn-delete">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center; padding: 32px; color: #64748b;">
                        @if(!empty($q))
                            No se encontraron aprendices coincidentes con el criterio <strong>"{{ $q }}"</strong>.
                        @else
                            No hay aprendices registrados actualmente en la base de datos.
                        @endif
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
