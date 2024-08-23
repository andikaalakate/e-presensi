<x-layouts.siswa>
    @seoTitle('Siswa - Presensi')
    <x-slot:title>
        {{ isset($title) ? $title : '' }}
    </x-slot:title>
    <div class="flex flex-col gap-3">
        <div class="bg-slate-200 p-2 md:p-4 rounded-md">
            <h1 class="text-3xl text-center mb-4">
                Presensi {{ $status }}
            </h1>
            <div class="flex flex-wrap gap-8">
                <div class="max-w-96 min-w-60 flex-grow overflow-auto">
                    {{-- {{ QrCode::size(100)->generate(auth()->user()->nisn) }} --}}
                </div>
                <div class="flex-grow flex flex-col gap-4 ">
                    <label class="flex flex-col">
                        <span>NISN</span>
                        <input type="text" id="nisn" inputmode="numeric"
                            class=" w-full rounded-xl bg-[#fff] border-b-2 border-[#4f4f4f]" name="nisn">
                    </label>
                    <label class="flex flex-col">
                        <span>Nama</span>
                        <input type="text" class=" w-full rounded-xl bg-[#fff] border-b-2 border-[#4f4f4f]" readonly>
                    </label>
                    <label class="flex flex-col">
                        <span>Jenis Kelamin</span>
                        <input type="text" class=" w-full rounded-xl bg-[#fff] border-b-2 border-[#4f4f4f]" readonly>
                    </label>
                    <label class="flex flex-col">
                        <span>Kelas</span>
                        <input type="text" class=" w-full rounded-xl bg-[#fff] border-b-2 border-[#4f4f4f]" readonly>
                    </label>
                    <label class="flex flex-col">
                        <span>Jurusan</span>
                        <input type="text" class=" w-full rounded-xl bg-[#fff] border-b-2 border-[#4f4f4f]" readonly>
                    </label>
                    <input class="text-[#fff7fc] font-medium mt-2 p-2 cursor-pointer bg-[#005A8D] rounded-xl" type="submit"
                        value="Kirim">
                </div>
            </div>
        </div>
    </div>
</x-layouts.siswa>
