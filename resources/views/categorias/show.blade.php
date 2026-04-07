@extends('layouts.app')

@section('title', $categoria->nombre)

@section('content')
<div class="max-w-2xl space-y-6">
    <div class="bg-white rounded-xl shadow-sm p-6">
        <dl class="space-y-4">
            <div>
                <dt class="text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</dt>
                <dd class="mt-1 text-sm text-gray-900">{{ $categoria->nombre }}</dd>
            </div>
            <div>
                <dt class="text-xs font-medium text-gray-500 uppercase tracking-wider">Artículos asociados</dt>
                <dd class="mt-1 text-sm text-gray-900">{{ $categoria->articulos()->count() }}</dd>
            </div>
            <div>
                <dt class="text-xs font-medium text-gray-500 uppercase tracking-wider">Creada</dt>
                <dd class="mt-1 text-sm text-gray-900">{{ $categoria->created_at->format('d/m/Y H:i') }}</dd>
            </div>
        </dl>
    </div>

    <div class="flex items-center gap-3">
        <a href="{{ route('categorias.edit', $categoria->id) }}"
           class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-4 py-2 rounded-lg transition-colors">
            Editar
        </a>
        <form method="POST" action="{{ route('categorias.destroy', $categoria->id) }}"
              onsubmit="return confirm('¿Eliminar esta categoría?')">
            @csrf @method('DELETE')
            <button type="submit"
                    class="bg-red-600 hover:bg-red-700 text-white text-sm font-medium px-4 py-2 rounded-lg transition-colors">
                Eliminar
            </button>
        </form>
        <a href="{{ route('categorias.index') }}" class="text-sm text-gray-500 hover:text-gray-700">Volver</a>
    </div>
</div>
@endsection
