<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/css/custom.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="welcome-page">
            <header class="navigation-menu">
                <div class="logo">ObraFacil</div>
                @if (Route::has('login'))
                    <nav>
                        <ul>
                            @auth
                                <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                            @else
                                <li><a href="{{ route('login') }}">Log in</a></li>

                                @if (Route::has('register'))
                                    <li><a href="{{ route('register') }}">Register</a></li>
                                @endif
                            @endauth
                        </ul>
                    </nav>
                @endif
            </header>

            <div class="main-content">
                <div class="logo-main">ObraFacil</div>
                <h1>Gerencie sua obra de forma fácil e eficiente</h1>
                <p>Controle tarefas, materiais e colaboradores em um só lugar.</p>
                <a href="{{ route('register') }}" class="cta-button">Comece Agora</a>
            </div>

            <footer class="py-16 text-center text-sm text-black">
                ObraFacil &copy; 2025
            </footer>
        </div>
    </body>
</html>