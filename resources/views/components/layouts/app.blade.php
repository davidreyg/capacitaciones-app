<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($title) ? $title.' - '.config('app.name') : config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">

    {{-- The navbar with `sticky` and `full-width` --}}
    <x-nav sticky full-width class="h-20">

        <x-slot:brand>
            {{-- Drawer toggle for "main-drawer" --}}
            <label for="main-drawer" class="lg:hidden mr-3">
                <x-icon name="o-bars-3" class="cursor-pointer" />
            </label>

            {{-- Brand --}}
            <div>Sistema de Capacitaciones</div>
        </x-slot:brand>

        {{-- Right side actions --}}
        <x-slot:actions>
            <x-button label="Messages" icon="o-envelope" link="###" class="btn-ghost btn-sm" responsive />
            <x-button label="Notifications" icon="o-bell" link="###" class="btn-ghost btn-sm" responsive />
            <x-dropdown>
                <x-slot:trigger>
                    <x-button icon="o-bell" class="btn-circle btn-outline" />
                </x-slot:trigger>

                <x-menu-item title="Home" icon="o-envelope" />
                <x-menu-item title="Messages" icon="o-paper-airplane" badge="78+" />
                <x-menu-item title="Hello" icon="o-sparkles" badge="new" badge-classes="!badge-warning" />

                <x-menu-item title="Internal link" icon="o-arrow-down" link="/docs/components/alert" />

                <x-menu-item onclick="document.getElementById('form').submit()" icon="o-power">
                    Cerrar Sesión
                    <form id="form" action="{{ route('logout') }}" method="POST">@csrf</form>

                </x-menu-item>

            </x-dropdown>
        </x-slot:actions>
    </x-nav>

    {{-- The main content with `full-width` --}}
    <x-main with-nav full-width>

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
    </x-main>

    {{-- TOAST area --}}
    <x-toast />
</body>

</html>