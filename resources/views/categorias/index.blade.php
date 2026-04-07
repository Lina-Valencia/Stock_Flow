@extends('layouts.app')

@section('title', 'Categorías')

@section('content')
<div class="flex items-center justify-between mb-6">
    <p class="text-sm text-gray-500">{{ $categorias->count() }} categorías registradas</p>
    <a href="{{ route('categorias.create') }}"
       class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium
              px-4 py-2 rounded-lg transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
        Nueva categoría
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    @if ($categorias->isEmpty())
        <div class="text-center py-16 text-gray-400">
            <p class="text-sm">No hay categorías registradas.</p>
        </div>
    @else
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-gray-600 uppercase text-xs tracking-wider">
                <tr>
                    <th class="px-6 py-3 text-left">Nombre</th>
                    <th class="px-6 py-3 text-left">Artículos</th>
                    <th class="px-6 py-3 text-right">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach ($categorias as $categoria)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 font-medium text-gray-900">{{ $categoria->nombre }}</td>
                        <td class="px-6 py-4 text-gray-500">{{ $categoria->articulos()->count() }}</td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <a href="{{ route('categorias.show', $categoria->id) }}"
                               class="text-indigo-600 hover:text-indigo-800 font-medium">Ver</a>
                            <a href="{{ route('categorias.edit', $categoria->id) }}"
                               class="text-yellow-600 hover:text-yellow-800 font-medium">Editar</a>
                            <form method="POST" action="{{ route('categorias.destroy', $categoria->id) }}"
                                  class="inline" onsubmit="return confirm('¿Eliminar esta categoría?')">
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
