<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        livewireのテスト <span class="font-bold text-red-400">register</span>
        <livewire:register />
        @livewireScripts
    </body>
</html>
