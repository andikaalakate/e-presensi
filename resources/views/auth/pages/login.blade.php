<div class=" bg-[#1d1d1d]">
    <div class="fixed right-0 w-[520px] h-screen bg-slate-200 max-[524px]:w-full py-24 z-10">
        <h1 class="text-3xl font-[Poppins] text-center font-semibold ">Masuk</h1>
        <x-splade-form action="{{ route('admin.proses-login') }}" method="post" class="p-4 py-12 flex flex-col gap-8">
            @method('POST')
            @csrf
            <label class="flex flex-col gap-2">
                <span class="ml-4">Email</span>
                <div class="flex items-center gap-3">
                    <box-icon name='user-circle' class="size-8"></box-icon>
                    <input v-model="form.email" type="email"
                        class="flex w-full py-2 px-3 outline-none rounded-xl bg-[#fff] duration-700 border-b-2 border-[#4f4f4f]"
                        required>
                </div>
            </label>
            <label class="flex flex-col gap-2">
                <span class="ml-4">Kata Sandi</span>
                <div class="flex items-center gap-3">
                    <box-icon name='key' class="size-8"></box-icon>
                    <input v-model="form.password" type="password"
                        class="flex w-full py-2 px-3 outline-none rounded-xl bg-[#fff] duration-700 border-b-2 border-[#4f4f4f]"
                        required>
                </div>
            </label>
            <x-splade-submit
                class="my-4 w-full bg-[#005A8D] py-2 px-3 text-[#fff7fc] rounded-lg">Masuk</x-splade-submit>
        </x-splade-form>
        <div class="absolute bottom-0 right-0 p-2 w-full">
            <div class="flex flex-wrap justify-end">
                <img class="h-20 " src="{{ asset('assets/logo-gadak-std.png') }}" alt="">
            </div>
        </div>
    </div>
    <img src="{{ asset('assets/background-login-2.jpg') }}" class="fixed top-0 left-0 h-screen w-full opacity-35"
        alt="SMK Swasta Jambi Medan">
    <Link class="fixed top-5 left-0 py-2 px-4 bg-white border-2 border-[#005A8D] rounded-[0_50px_50px_0] border-l-0 z-20 shadow-md font-medium" href="{{ route('login') }}">< Siswa</Link>
</div>
