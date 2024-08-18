<x-layouts.admin>
    @seoTitle('Admin - Profil')
    <x-slot:title>
        {{ isset($title) ? $title : '' }}
    </x-slot:title>
    <div class="bg-slate-200 p-2 md:p-4 rounded-md">
        <div class="flex flex-wrap gap-8">
            <div class="max-w-96 flex-grow min-w-60">
                <img src="" class="bg-slate-300 aspect-[3/4] " alt="Potoh Siswahh">
            </div>
            <div class="flex-grow flex flex-col gap-4 ">
                <label class="flex flex-col">
                    <span>Nama</span>
                    <input type="text" id="nisn" inputmode="numeric" class=" w-full rounded-xl bg-[#fff] border-b-2 border-[#4f4f4f]" name="nisn">
                </label>
                <label class="flex flex-col">
                    <span>Role</span>
                    <input type="text" name="role" class=" w-full rounded-xl bg-[#fff] border-b-2 border-[#4f4f4f]">
                </label>
                <label class="flex flex-col">
                    <span>Jenis Kelamin</span>
                    <input type="text" name="jenis_kelamin" class=" w-full rounded-xl bg-[#fff] border-b-2 border-[#4f4f4f]">
                </label>
                <label class="flex flex-col">
                    <span>Email</span>
                    <input type="text" name="email" class=" w-full rounded-xl bg-[#fff] border-b-2 border-[#4f4f4f]">
                </label>
                <label class="flex flex-col">
                    <span>No Telp</span>
                    <input type="text" name="no_telp" class=" w-full rounded-xl bg-[#fff] border-b-2 border-[#4f4f4f]">
                </label>
                <label class="flex flex-col">
                    <span>Password</span>
                    <input type="password" name="password" class=" w-full rounded-xl bg-[#fff] border-b-2 border-[#4f4f4f]">
                </label>
            </div>
        </div>
        <div class="flex justify-end">
            <input class="text-[#fff7fc] font-medium mt-2 p-2 px-4 cursor-pointer bg-[#005A8D] rounded-md" type="submit" value="Kirim">
        </div>
    </div>
</x-layouts.admin>
