@extends('layouts.app')

@section('title', $articulo->nombre)

@section('content')
<div class="max-w-2xl space-y-6">
    <div class="bg-white rounded-xl shadow-sm p-6">
        @if ($articulo->foto)
            <img src="{{ Storage::url($articulo->foto) }}" alt="{{ $articulo->nombre }}"
                 class="h-48 w-full object-cover rounded-lg mb-6">
        @endif
        <dl class="space-y-4">
            <div>
                <dt class="text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</dt>
                <dd class="mt-1 text-sm text-gray-900">{{ $articulo->nombre }}</dd>
            </div>
            <div>
                <dt class="text-xs font-medium text-gray-500 uppercase tracking-wider">Categoría</dt>
                <dd class="mt-1 text-sm text-gray-900">{{ $articulo->categoria->nombre ?? '—' }}</dd>
            </div>
            <div>
                <dt class="text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</dt>
                <dd class="mt-1">
                    @php
                        $badgeColor = match($articulo->estado) {
                            'disponible'    => 'bg-green-100 text-green-800',
                            'en_prestamo'   => 'bg-yellow-100 text-yellow-800',
                            'mantenimiento' => 'bg-red-100 text-red-800',
                            default         => 'bg-gray-100 text-gray-600',
                        };
                    @endphp
                    <span class="inline-block px-2 py-0.5 rounded-full text-xs font-medium {{ $badgeColor }}">
                        {{ ucfirst(str_replace('_', ' ', $articulo->estado)) }}
                    </span>
                </dd>
            </div>
            <div>
                <dt class="text-xs font-medium text-gray-500 uppercase tracking-wider">Ubicación</dt>
                <dd class="mt-1 text-sm text-gray-900">{{ $articulo->ubicacion ?? '—' }}</dd>
            </div>
            <div>
                <dt class="text-xs font-medium text-gray-500 uppercase tracking-wider">Activo</dt>
                <dd class="mt-1 text-sm text-gray-900">{{ $articulo->activo ? 'Sí' : 'No' }}</dd>
            </div>
            <div>
                <dt class="text-xs font-medium text-gray-500 uppercase tracking-wider">Registrado</dt>
                <dd class="mt-1 text-sm text-gray-900">{{ $articulo->created_at->format('d/m/Y H:i') }}</dd>
            </div>
        </dl>
    </div>

    <div class="flex items-center gap-3">
        <a href="{{ route('articulos.edit', $articulo->id) }}"
           class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-4 py-2 rounded-lg transition-colors">
            Editar
        </a>
        <form method="POST" action="{{ route('articulos.destroy', $articulo->id) }}"
              onsubmit="return confirm('¿Eliminar este artículo?')">
            @csrf @method('DELETE')
            <button type="submit"
                    class="bg-red-600 hover:bg-red-700 text-white text-sm font-medium px-4 py-2 rounded-lg transition-colors">
                Eliminar
            </button>
        </form>
        <a href="{{ route('articulos.index') }}" class="text-sm text-gray-500 hover:text-gray-700">Volver</a>
    </div>
</div>
@endsection
