<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        livewireのテスト
        <div>
            @if (session()->has('message'))
                <div class="alert">
                    {{ session('message') }}
                </div>
            @endif
        </div>
        <livewire:counter />
        @livewireScripts
    </body>
</html>
