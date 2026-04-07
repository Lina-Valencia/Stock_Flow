@extends('layouts.app')

@section('title', 'Usuarios')

@section('content')
<div class="flex items-center justify-between mb-6">
    <p class="text-sm text-gray-500">{{ $usuarios->count() }} usuarios registrados</p>
    <a href="{{ route('usuarios.create') }}"
       class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium
              px-4 py-2 rounded-lg transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
        Nuevo usuario
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    @if ($usuarios->isEmpty())
        <div class="text-center py-16 text-gray-400">
            <p class="text-sm">No hay usuarios registrados.</p>
        </div>
    @else
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-gray-600 uppercase text-xs tracking-wider">
                <tr>
                    <th class="px-6 py-3 text-left">Nombre</th>
                    <th class="px-6 py-3 text-left">Email</th>
                    <th class="px-6 py-3 text-left">Rol</th>
                    <th class="px-6 py-3 text-left">Estado</th>
                    <th class="px-6 py-3 text-right">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach ($usuarios as $usuario)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 font-medium text-gray-900">{{ $usuario->nombre }}</td>
                        <td class="px-6 py-4 text-gray-500">{{ $usuario->email }}</td>
                        <td class="px-6 py-4 text-gray-500">{{ $usuario->rol->nombre ?? '—' }}</td>
                        <td class="px-6 py-4">
                            <span class="inline-block px-2 py-0.5 rounded-full text-xs font-medium
                                {{ $usuario->activo ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-500' }}">
                                {{ $usuario->activo ? 'Activo' : 'Inactivo' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <a href="{{ route('usuarios.show', $usuario->id) }}"
                               class="text-indigo-600 hover:text-indigo-800 font-medium">Ver</a>
                            <a href="{{ route('usuarios.edit', $usuario->id) }}"
                               class="text-yellow-600 hover:text-yellow-800 font-medium">Editar</a>
                            @if ($usuario->id !== Auth::id())
                                <form method="POST" action="{{ route('usuarios.destroy', $usuario->id) }}"
                                      class="inline" onsubmit="return confirm('¿Eliminar este usuario?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 font-medium">Eliminar</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
