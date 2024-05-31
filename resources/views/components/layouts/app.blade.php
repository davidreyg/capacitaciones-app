<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($title) ? $title.' - '.config('app.name') : config('app.name') }}</title>

    @filamentStyles
    @vite(['resources/css/app.css'])
</head>

<body class="font-sans antialiased">

    {{-- The navbar with `sticky` and `full-width` --}}
    <x-mary-nav sticky full-width class="h-20">

        <x-slot:brand>
            {{-- Drawer toggle for "main-drawer" --}}
            <label for="main-drawer" class="lg:hidden mr-3">
                <x-mary-icon name="o-bars-3" class="cursor-pointer" />
            </label>

            {{-- Brand --}}
            <div>Sistema de Capacitaciones</div>
        </x-slot:brand>

        {{-- Right side actions --}}
        <x-slot:actions>
            <x-mary-theme-toggle class="btn btn-circle btn-ghost" />
            <x-mary-dropdown>
                <x-slot:trigger>
                    <x-mary-button icon="o-bell" class="btn-circle btn-outline" />
                </x-slot:trigger>

                <x-mary-menu-item title="Home" icon="o-envelope" />
                <x-mary-menu-item title="Messages" icon="o-paper-airplane" badge="78+" />
                <x-mary-menu-item title="Hello" icon="o-sparkles" badge="new" badge-classes="!badge-warning" />

                <x-mary-menu-item title="Internal link" icon="o-arrow-down" link="/docs/components/alert" />

                <x-mary-menu-item onclick="document.getElementById('form').submit()" icon="o-power">
                    Cerrar Sesión
                    <form id="form" action="{{ route('logout') }}" method="POST">@csrf</form>

                </x-mary-menu-item>

            </x-mary-dropdown>
        </x-slot:actions>
    </x-mary-nav>

    {{-- The main content with `full-width` --}}
    <x-mary-main with-nav full-width>

        {{-- This is a sidebar that works also as a drawer on small screens --}}
        {{-- Notice the `main-drawer` reference here --}}
        <x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-200">


            {{-- Activates the menu item when a route matches the `link` property --}}
            @livewire('ship-sidebar')
        </x-slot:sidebar>

        {{-- The `$slot` goes here --}}
        <x-slot:content>
            {{ $slot }}
        </x-slot:content>
    </x-mary-main>

    {{-- TOAST area --}}
    <x-mary-toast />
    @livewire('notifications')
    @filamentScripts
    @vite('resources/js/app.js')
</body>

</html>