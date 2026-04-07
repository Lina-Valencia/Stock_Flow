@extends('layouts.app')

@section('title', $usuario->nombre)

@section('content')
<div class="max-w-2xl space-y-6">
    <div class="bg-white rounded-xl shadow-sm p-6">
        <dl class="space-y-4">
            <div>
                <dt class="text-xs font-medium text-gray-500 uppercase tracking-wider">ID / Cédula</dt>
                <dd class="mt-1 text-sm text-gray-900">{{ $usuario->id }}</dd>
            </div>
            <div>
                <dt class="text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</dt>
                <dd class="mt-1 text-sm text-gray-900">{{ $usuario->nombre }}</dd>
            </div>
            <div>
                <dt class="text-xs font-medium text-gray-500 uppercase tracking-wider">Email</dt>
                <dd class="mt-1 text-sm text-gray-900">{{ $usuario->email }}</dd>
            </div>
            <div>
                <dt class="text-xs font-medium text-gray-500 uppercase tracking-wider">Contacto</dt>
                <dd class="mt-1 text-sm text-gray-900">{{ $usuario->contacto ?? '—' }}</dd>
            </div>
            <div>
                <dt class="text-xs font-medium text-gray-500 uppercase tracking-wider">Rol</dt>
                <dd class="mt-1 text-sm text-gray-900">{{ $usuario->rol->nombre ?? '—' }}</dd>
            </div>
            <div>
                <dt class="text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</dt>
                <dd class="mt-1">
                    <span class="inline-block px-2 py-0.5 rounded-full text-xs font-medium
                        {{ $usuario->activo ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-500' }}">
                        {{ $usuario->activo ? 'Activo' : 'Inactivo' }}
                    </span>
                </dd>
            </div>
            <div>
                <dt class="text-xs font-medium text-gray-500 uppercase tracking-wider">Registrado</dt>
                <dd class="mt-1 text-sm text-gray-900">{{ $usuario->created_at->format('d/m/Y H:i') }}</dd>
            </div>
        </dl>
    </div>

    <div class="flex items-center gap-3">
        <a href="{{ route('usuarios.edit', $usuario->id) }}"
           class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-4 py-2 rounded-lg transition-colors">
            Editar
        </a>
        @if ($usuario->id !== Auth::id())
            <form method="POST" action="{{ route('usuarios.destroy', $usuario->id) }}"
                  onsubmit="return confirm('¿Eliminar este usuario?')">
                @csrf @method('DELETE')
                <button type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white text-sm font-medium px-4 py-2 rounded-lg transition-colors">
                    Eliminar
                </button>
            </form>
        @endif
        <a href="{{ route('usuarios.index') }}" class="text-sm text-gray-500 hover:text-gray-700">Volver</a>
    </div>
</div>
@endsection
