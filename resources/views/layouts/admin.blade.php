<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="e-Presensi siswa di SMK Swasta Jambi Medan" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="application-name" content="PWA">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="PWA">
    <meta name="theme-color" content="#ffffff">
    <meta name="copyright" content="GADAK Studio 2024 - ePresensi SMK Swasta Jambi Medan">
    <meta name="author" content="Andika Pratama, M. Gilang Chandrawinata">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    {{-- <link rel="manifest" type="application/manifest+json" href="{{ asset('__manifest.json') }}"> --}}
    <title>Admin - {{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('head')
</head>

<body class="bg-slate-200 font-[Poppins]" x-data="{ isOpen: false }" @click.away="isOpen = false">
    <x-navbar></x-navbar>
    <div class=" h-[calc(100vh-66px)] p-4 max-[768px]:p-3">
        <h1 class="m-2 text-3xl text-black font-semibold">{{ $title }}</h1>
        <div class="bg-[#fff7fc] p-4 h-[calc(100%-50px)] shadow-[0_0_10px_0_rgba(0,0,0,.5)] rounded-lg overflow-auto">
            @yield('body')
        </div>
    </div>

    @yield('script')
</body>

</html>
