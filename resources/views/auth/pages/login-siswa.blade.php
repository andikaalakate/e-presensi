<div class="bg-[#1d1d1d]">
    <div class="fixed left-0 w-[520px] h-screen bg-slate-200 max-[524px]:w-full py-24 z-10">
        <h1 class="text-3xl font-[Poppins] text-center font-semibold ">Masuk</h1>
        <form action="{{ route('siswa.proses-login') }}" method="post" class="p-4 py-12 flex flex-col gap-8">
            @method('POST')
            @csrf
            <label class="flex flex-col gap-2">
                <span class="ml-4">Nomor Induk Siswa</span>
                <div class="flex items-center gap-3">
                    <box-icon name='user-circle' class="size-8"></box-icon>
                    <input type="text" name="nisn" inputmode="numeric"
                        class="flex w-full py-2 px-3 outline-none rounded-xl bg-[#fff] duration-700 border-b-2 border-[#4f4f4f]"
                        required>
                </div>
            </label>
            <label class="flex flex-col gap-2">
                <span class="ml-4">Kata Sandi</span>
                <div class="flex items-center gap-3">
                    <box-icon name='key' class="size-8"></box-icon>
                    <input type="password" name="password"
                        class="flex w-full py-2 px-3 outline-none rounded-xl bg-[#fff] duration-700 border-b-2 border-[#4f4f4f]"
                        required>
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
    <img src="{{ asset('assets/background-login-2.jpg') }}" class=" fixed top-0 left-0 h-screen w-full opacity-35"
        alt="SMK Swasta Jambi Medan">
</div>
