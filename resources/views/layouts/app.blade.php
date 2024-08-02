<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr" class="light nav-floating">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href={{ asset('images/icon.png') }}>
    <title>SAMA - AMAL</title>

    @vite(['resources/css/app.scss', 'resources/js/custom/store.js'])

</head>

<body class="font-inter dashcode-app" id="body_class">
    <div class="app-wrapper">
        <x-sidebar-menu />
        <div class="flex flex-col justify-between min-h-screen">
            <div>
                <x-dashboard-header />
                <div class="content-wrapper transition-all duration-150 ltr:ml-0 xl:ltr:ml-[248px] rtl:mr-0 xl:rtl:mr-[248px]"
                    id="content_wrapper">
                    <div class="page-content">
                        <div class="transition-all duration-150 container-fluid" id="page_layout">
                            <main id="content_layout">
                                {{ $slot }}
                            </main>
                        </div>
                    </div>
                </div>
            </div>
            <x-dashboard-footer />
        </div>
    </div>
    @vite(['resources/js/app.js', 'resources/js/main.js'])
    @stack('scripts')
</body>

</html>
