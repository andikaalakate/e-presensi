<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @laravelPWA
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="e-Presensi siswa di SMK Swasta Jambi Medan" />
    <meta name="copyright" content="GADAK Studio 2024 - ePresensi SMK Swasta Jambi Medan">
    <meta name="author" content="Andika Pratama, M. Gilang Chandrawinata">

    @googlefonts('poppins')
    @googlefonts('oswald')
    @spladeHead
    @vite(['resources/js/app.js'])
</head>

<body class="{{ request()->routeIs('admin.login', 'login') ? 'bg-[#1d1d1d]' : '' }} font-[Poppins] overflow-hidden">
    @splade()
</body>

</html>
