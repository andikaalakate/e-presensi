<div class="bg-[#fff7fc] flex items-center justify-center font-[Poppins] h-screen">
    <div class="p-4 rounded-lg bg-slate-300 shadow-2xl">
        <h1 class="text-2xl mb-4">Masuk Sebagai </h1>
        <div class="flex-col flex gap-1">
            <Link href="{{ route('admin.login') }}" class="flex items-center justify-center p-2 bg-[#005A8D] rounded-md text-white">Admin</Link>
            <Link href="{{ route('login') }}" class="flex items-center justify-center p-2 bg-[#005A8D] rounded-md text-white">Siswa</Link>
        </div>
    </div>
</div>