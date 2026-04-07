@extends('layouts.app')

@section('title', 'Artículos')

@section('content')
<div class="flex items-center justify-between mb-6">
    <p class="text-sm text-gray-500">{{ $articulos->count() }} artículos registrados</p>
    <a href="{{ route('articulos.create') }}"
       class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium
              px-4 py-2 rounded-lg transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
        Nuevo artículo
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    @if ($articulos->isEmpty())
        <div class="text-center py-16 text-gray-400">
            <p class="text-sm">No hay artículos registrados.</p>
        </div>
    @else
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-gray-600 uppercase text-xs tracking-wider">
                <tr>
                    <th class="px-6 py-3 text-left">Nombre</th>
                    <th class="px-6 py-3 text-left">Categoría</th>
                    <th class="px-6 py-3 text-left">Estado</th>
                    <th class="px-6 py-3 text-left">Ubicación</th>
                    <th class="px-6 py-3 text-right">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach ($articulos as $articulo)
                    @php
                        $badgeColor = match($articulo->estado) {
                            'disponible'    => 'bg-green-100 text-green-800',
                            'en_prestamo'   => 'bg-yellow-100 text-yellow-800',
                            'mantenimiento' => 'bg-red-100 text-red-800',
                            default         => 'bg-gray-100 text-gray-600',
                        };
                    @endphp
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 font-medium text-gray-900">{{ $articulo->nombre }}</td>
                        <td class="px-6 py-4 text-gray-500">{{ $articulo->categoria->nombre ?? '—' }}</td>
                        <td class="px-6 py-4">
                            <span class="inline-block px-2 py-0.5 rounded-full text-xs font-medium {{ $badgeColor }}">
                                {{ ucfirst(str_replace('_', ' ', $articulo->estado)) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-gray-500">{{ $articulo->ubicacion ?? '—' }}</td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <a href="{{ route('articulos.show', $articulo->id) }}"
                               class="text-indigo-600 hover:text-indigo-800 font-medium">Ver</a>
                            <a href="{{ route('articulos.edit', $articulo->id) }}"
                               class="text-yellow-600 hover:text-yellow-800 font-medium">Editar</a>
                            <form method="POST" action="{{ route('articulos.destroy', $articulo->id) }}"
                                  class="inline" onsubmit="return confirm('¿Eliminar este artículo?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 font-medium">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
