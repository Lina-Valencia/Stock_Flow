@extends('layouts.app')

@section('title', 'Préstamos')

@section('content')
<div class="flex items-center justify-between mb-6">
    <p class="text-sm text-gray-500">{{ $prestamos->count() }} préstamos registrados</p>
    <a href="{{ route('prestamos.create') }}"
       class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium
              px-4 py-2 rounded-lg transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
        Nuevo préstamo
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    @if ($prestamos->isEmpty())
        <div class="text-center py-16 text-gray-400">
            <p class="text-sm">No hay préstamos registrados.</p>
        </div>
    @else
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-gray-600 uppercase text-xs tracking-wider">
                <tr>
                    <th class="px-6 py-3 text-left">Artículo</th>
                    <th class="px-6 py-3 text-left">Solicitante</th>
                    <th class="px-6 py-3 text-left">Custodio</th>
                    <th class="px-6 py-3 text-left">Estado</th>
                    <th class="px-6 py-3 text-left">Fecha límite</th>
                    <th class="px-6 py-3 text-right">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach ($prestamos as $prestamo)
                    @php
                        $badgeColor = match($prestamo->estado) {
                            'pendiente'  => 'bg-yellow-100 text-yellow-800',
                            'aprobado'   => 'bg-blue-100 text-blue-800',
                            'entregado'  => 'bg-orange-100 text-orange-800',
                            'devuelto'   => 'bg-green-100 text-green-800',
                            'rechazado'  => 'bg-red-100 text-red-800',
                            'cancelado'  => 'bg-gray-100 text-gray-500',
                            default      => 'bg-gray-100 text-gray-600',
                        };
                    @endphp
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 font-medium text-gray-900">{{ $prestamo->articulos->nombre ?? '—' }}</td>
                        <td class="px-6 py-4 text-gray-500">{{ $prestamo->solicitante->nombre ?? '—' }}</td>
                        <td class="px-6 py-4 text-gray-500">{{ $prestamo->custodio->nombre ?? '—' }}</td>
                        <td class="px-6 py-4">
                            <span class="inline-block px-2 py-0.5 rounded-full text-xs font-medium {{ $badgeColor }}">
                                {{ ucfirst($prestamo->estado) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-gray-500">
                            {{ $prestamo->fecha_limite ? $prestamo->fecha_limite->format('d/m/Y') : '—' }}
                        </td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <a href="{{ route('prestamos.show', $prestamo->id) }}"
                               class="text-indigo-600 hover:text-indigo-800 font-medium">Ver</a>
                            @if (!in_array($prestamo->estado, ['devuelto', 'rechazado', 'cancelado']))
                                <a href="{{ route('prestamos.edit', $prestamo->id) }}"
                                   class="text-yellow-600 hover:text-yellow-800 font-medium">Editar</a>
                            @endif
                            @if (!in_array($prestamo->estado, ['entregado']))
                                <form method="POST" action="{{ route('prestamos.destroy', $prestamo->id) }}"
                                      class="inline" onsubmit="return confirm('¿Eliminar este préstamo?')">
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
