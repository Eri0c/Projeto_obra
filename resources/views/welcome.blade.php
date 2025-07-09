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
                <div class="logo">Sua Empresa</div>
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
                <div class="logo-main">[LOGO DA EMPRESA AQUI]</div>
                <h1>Bem-vindo à Sua Empresa!</h1>
                <p>Soluções inovadoras para o seu negócio.</p>
                <a href="{{ route('register') }}" class="cta-button">Comece Agora</a>
            </div>

            <footer class="py-16 text-center text-sm text-black">
                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
            </footer>
        </div>
    </body>
</html>