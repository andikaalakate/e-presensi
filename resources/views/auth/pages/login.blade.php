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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <title>Masuk</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#1d1d1d]">
    <div class="fixed right-0 w-[520px] h-screen bg-slate-200 max-[524px]:w-full py-24">
        <h1 class="text-3xl font-[Poppins] text-center font-semibold ">Masuk</h1>
        <form action="" class="p-4 py-12 flex flex-col gap-8">
            <label class="flex flex-col gap-2" x-data="{ hasValue: false }">
                <span class="ml-4">Email</span>
                <div class="flex items-center gap-3">
                    <box-icon name='user-circle' class="size-8"></box-icon>
                    <input type="email" name="" id=""
                        class="flex w-full py-2 px-3 outline-none focus-within:rounded-xl bg-[#fff0] duration-700 border-b-2 border-[#4f4f4f]"
                        :class="{ 'bg-white rounded-xl': hasValue || $el === document.activeElement }"
                        @input="hasValue = $el.value.trim() !== ''" @blur="hasValue = $el.value.trim() !== ''" required>
                </div>
            </label>
            <label class="flex flex-col gap-2" x-data="{ hasValue: false }">
                <span class="ml-4">Kata Sandi</span>
                <div class="flex items-center gap-3">
                    <box-icon name='key' class="size-8"></box-icon>
                    <input type="password" name="" id=""
                        class="flex w-full py-2 px-3 outline-none focus-within:rounded-xl bg-[#fff0] duration-700 border-b-2 border-[#4f4f4f]"
                        :class="{ 'bg-white rounded-xl': hasValue || $el === document.activeElement }"
                        @input="hasValue = $el.value.trim() !== ''" @blur="hasValue = $el.value.trim() !== ''" required>
                </div>
            </label>
            <button type="submit" class="my-4 bg-[#005A8D] py-2 px-3 text-[#fff7fc] rounded-lg">Masuk</button>
        </form>
    </div>
</body>

</html>
