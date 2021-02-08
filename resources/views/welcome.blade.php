<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body class="antialiased">
        <div class="container mx-auto relative justify-center min-h-screen bg-white  sm:items-center sm:pt-0">
            @if (Route::has('login'))
                <div class="sticky block top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ route('dashboard.links.index') }}" class="text-sm text-gray-700 underline right-0">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="container mx-auto">
                <h1 class="sm:text-9xl text-gray-700 font-bold text-center gray p-4 text-7xl">Laralinks</h1>
                <p class="text-gray-700 text-xl text-center p-2">Unify your links in one place.</p>
            </div>
        </div>
    </body>
</html>
