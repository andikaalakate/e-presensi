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
    <meta name="copyright" content="GADAK Studio 2024 - ePresensi SMK Swasta Jambi Medan">
    <meta name="author" content="Andika Pratama, M. Gilang Chandrawinata">
    <meta name="theme-color" content="#ffffff">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <title>Masuk - Siswa</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#1d1d1d]">
    <div class="fixed left-0 w-[520px] h-screen bg-slate-200 max-[524px]:w-full py-24 z-10">
        <h1 class="text-3xl font-[Poppins] text-center font-semibold ">Masuk</h1>
        <form action="{{ route('siswa.proses-login') }}" method="post" class="p-4 py-12 flex flex-col gap-8">
            @method('POST')
            @csrf
            <label class="flex flex-col gap-2">
                <span class="ml-4">Nomor Induk Siswa</span>
                <div class="flex items-center gap-3">
                    <box-icon name='user-circle' class="size-8"></box-icon>
                    <input type="text" name="nisn"
                        class="flex w-full py-2 px-3 outline-none rounded-xl bg-[#fff] duration-700 border-b-2 border-[#4f4f4f]" required>
                </div>
            </label>
            <label class="flex flex-col gap-2">
                <span class="ml-4">Kata Sandi</span>
                <div class="flex items-center gap-3">
                    <box-icon name='key' class="size-8"></box-icon>
                    <input type="password" name="password"
                        class="flex w-full py-2 px-3 outline-none rounded-xl bg-[#fff] duration-700 border-b-2 border-[#4f4f4f]" required>
                </div>
            </label>
            <button type="submit" class="my-4 bg-[#005A8D] py-2 px-3 text-[#fff7fc] rounded-lg">Masuk</button>
        </form>
        <div class="absolute bottom-0 right-0 p-2 w-full">
            <h2 class="font-medium">Partner :</h2>
            <div class="flex flex-wrap justify-end">
                <img class="h-20 " src="{{ asset('assets/logo-gadak-std.png') }}" alt="GADAK Studio">
            </div>
        </div>
    </div>
    <img src="{{ asset('assets/background-login-2.jpg') }}" class="fixed top-0 left-0 h-screen w-full opacity-35" alt="SMK Swasta Jambi Medan">
</body>

</html>
