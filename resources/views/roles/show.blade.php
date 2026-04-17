@extends('layouts.app')

@section('title', $rol->nombre)

@section('content')
<div class="max-w-2xl space-y-6">
    <div class="bg-white rounded-xl shadow-sm p-6">
        <dl class="space-y-4">
            <div>
                <dt class="text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</dt>
                <dd class="mt-1 text-sm text-gray-900">{{ $rol->nombre }}</dd>
            </div>
            <div>
                <dt class="text-xs font-medium text-gray-500 uppercase tracking-wider">Usuarios asignados</dt>
                <dd class="mt-1 text-sm text-gray-900">{{ $rol->usuarios->count() }}</dd>
            </div>
            <div>
                <dt class="text-xs font-medium text-gray-500 uppercase tracking-wider">Creado</dt>
                <dd class="mt-1 text-sm text-gray-900">{{ $rol->created_at?->format('d/m/Y H:i') ?? '—' }}</dd>
            </div>
        </dl>

        @if ($rol->usuarios->isNotEmpty())
            <div class="mt-6 border-t border-gray-100 pt-4">
                <h3 class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-3">Usuarios con este rol</h3>
                <ul class="space-y-1">
                    @foreach ($rol->usuarios as $usuario)
                        <li class="text-sm text-gray-700">
                            <a href="{{ route('usuarios.show', $usuario->id) }}"
                               class="hover:text-indigo-600">{{ $usuario->nombre }}</a>
                            <span class="text-gray-400">— {{ $usuario->email }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <div class="flex items-center gap-3">
        <a href="{{ route('roles.edit', $rol->id) }}"
           class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-4 py-2 rounded-lg transition-colors">
            Editar
        </a>
        <form method="POST" action="{{ route('roles.destroy', $rol->id) }}"
              onsubmit="return confirm('¿Eliminar este rol?')">
            @csrf @method('DELETE')
            <button type="submit"
                    class="bg-red-600 hover:bg-red-700 text-white text-sm font-medium px-4 py-2 rounded-lg transition-colors">
                Eliminar
            </button>
        </form>
        <a href="{{ route('roles.index') }}" class="text-sm text-gray-500 hover:text-gray-700">Volver</a>
    </div>
</div>
@endsection
