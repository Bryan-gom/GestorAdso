@csrf

@if ($errors->any())
<div class="danger">
<strong>Errores:</strong>
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif

<div>
<label>Nombre</label>
<input
type="text"
name="nombre"
value="{{ old('nombre', $aprendiz->nombre ?? '') }}"
>
</div>

<div>
<label>Documento</label>
<input
type="text"
name="documento"
value="{{ old('documento', $aprendiz->documento ?? '') }}"
>
</div>

<div>
<label>Correo</label>
<input
type="email"
name="correo"
value="{{ old('correo', $aprendiz->correo ?? '') }}"
>
</div>

<div>
<label>Ficha</label>
<input
type="number"
name="ficha_id"
value="{{ old('ficha_id', $aprendiz->ficha_id ?? '') }}"
>
</div>

<div style="margin-top: 20px; display: flex; align-items: center; gap: 12px;">
<button type="submit" class="btn">Guardar</button>
<a href="{{ route('aprendices.index') }}" style="color: #64748b; text-decoration: none; font-size: 14px;">Cancelar</a>
</div>
