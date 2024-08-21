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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    @spladeHead
    @vite(['resources/js/app.js'])
</head>

<body class="{{ request()->routeIs('admin.login', 'login') ? 'bg-[#1d1d1d]' : 'bg-[#fff7fc]' }}
font-[Poppins]">
    @splade()
</body>

</html>
