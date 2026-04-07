<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StockFlow — Iniciar sesión</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans antialiased flex items-center justify-center min-h-screen">

<div class="w-full max-w-md">
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-gray-900">StockFlow</h1>
        <p class="text-gray-500 mt-1 text-sm">Gestión de inventario</p>
    </div>

    <div class="bg-white shadow-md rounded-xl px-8 py-8">
        <h2 class="text-xl font-semibold text-gray-800 mb-6">Iniciar sesión</h2>

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                    Correo electrónico
                </label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none
                              focus:ring-2 focus:ring-indigo-500 focus:border-transparent
                              @error('email') border-red-400 @enderror">
                @error('email')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                    Contraseña
                </label>
                <input type="password" id="password" name="password" required
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none
                              focus:ring-2 focus:ring-indigo-500 focus:border-transparent
                              @error('password') border-red-400 @enderror">
                @error('password')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center">
                <input type="checkbox" id="remember" name="remember"
                       class="h-4 w-4 text-indigo-600 rounded border-gray-300">
                <label for="remember" class="ml-2 text-sm text-gray-600">Recordarme</label>
            </div>

            <button type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-lg
                           text-sm transition-colors focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                Ingresar
            </button>
        </form>
    </div>
</div>

</body>
</html>
