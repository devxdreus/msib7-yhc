<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">

    {{-- The navbar with `sticky` and `full-width` --}}
    <livewire:nav />

    {{-- The main content with `full-width` --}}
    <div class="bg-base-300">
        <x-main with-nav full-width>

            {{-- This is a sidebar that works also as a drawer on small screens --}}
            {{-- Notice the `main-drawer` reference here --}}
            <x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-100">

            {{-- Activates the menu item when a route matches the `link` property --}}
                <x-menu activate-by-route active-bg-color="text-white bg-gradient-to-r from-cyan-500 to-blue-500">
                    <x-menu-item title="Dashboard" icon="o-home" :link="route('dashboard')" />
                    <x-menu-item title="Course" icon="o-book-open" :link="route('courses.index')" />
    {{--                <x-menu-sub title="Settings" icon="o-cog-6-tooth">--}}
    {{--                    <x-menu-item title="Wifi" icon="o-wifi" link="####" />--}}
    {{--                    <x-menu-item title="Archives" icon="o-archive-box" link="####" />--}}
    {{--                </x-menu-sub>--}}
                </x-menu>
            </x-slot:sidebar>

            {{-- The `$slot` goes here --}}
            <x-slot:content>
                    {{ $slot }}
            </x-slot:content>
        </x-main>
    </div>

    @livewireScripts

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <x-livewire-alert::scripts />

    {{--  TOAST area --}}
    <x-toast />
    </body>
</html>
