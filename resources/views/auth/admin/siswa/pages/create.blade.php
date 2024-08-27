<x-layouts.admin :breadcrumbs="$breadcrumbs">
    @seoTitle('Admin - Buat Siswa')
    <x-slot:title>
        {{ isset($title) ? $title : '' }}
    </x-slot:title>
    <x-splade-form action="{{ route('admin.siswa.store') }}" method="POST"
        class="p-4 bg-slate-300 flex flex-col gap-4 rounded-md overflow-auto" confirm="Buat Data Siswa"
        confirm-text="Apakah kamu yakin akan membuatnya?" confirm-button="Ya, aku ingin membuatnya!" cancel-button="Tidak">
        @method('POST')
        @csrf
        <div class="flex flex-wrap gap-4">
            <div class="flex flex-col gap-4 flex-grow">
                <label class="flex flex-col gap-1">
                    <span class="font-medium">NISN</span>
                    <x-splade-input type="text" name="nisn" class="w-full py-1 rounded-md outline-none" />
                </label>
                <label class="flex flex-col gap-1">
                    <span class="font-medium">Nama Lengkap</span>
                    <x-splade-input type="text" name="nama_lengkap" class="w-full py-1 rounded-md outline-none" />
                </label>
                <label class="flex flex-col gap-1">
                    <span class="font-medium">Jenis Kelamin</span>
                    <x-splade-select name="jenis_kelamin" class="w-full py-1 rounded-md outline-none">
                        <option value="Laki-Laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </x-splade-select>
                </label>
                <label class="flex flex-col gap-1">
                    <span class="font-medium">Tanggal Lahir</span>
                    <x-splade-input type="date" name="tanggal_lahir" class="w-full py-1 rounded-md outline-none" />
                </label>
            </div>
            <div class="flex flex-col gap-4 flex-grow">
                <label class="flex flex-col gap-1">
                    <span class="font-medium">Email</span>
                    <x-splade-input type="email" name="email" class="w-full py-1 rounded-md outline-none" />
                </label>
                <label class="flex flex-col gap-1">
                    <span class="font-medium">Nomor Telepon</span>
                    <x-splade-input type="text" name="no_telp" class="w-full py-1 rounded-md outline-none" />
                </label>
                {{-- <label class="flex flex-col gap-1">
                    <span class="font-medium">Foto</span>
                    <x-splade-input type="file" name="" class="hidden">
                    <span class="w-full py-1 rounded-md outline-none flex items-center justify-center bg-[#005A8D] text-white cursor-pointer font-semibold hover:drop-shadow-xl duration-300">Upload</span>
                    <div class="p-4 pb-0 flex items-center justify-center">
                        <img src="" class="bg-red-500 size-28 rounded-full overflow-hidden" alt="">
                    </div>
                </label> --}}
                <label class="flex flex-col gap-1">
                    <span class="font-medium">Kelas</span>
                    <x-splade-select name="kelas_id" class="w-full py-1 rounded-md outline-none">
                        <option selected disabled>Pilih Kelas</option>
                        @foreach ($kelas as $k)
                            <option value="{{ $k->id }}" {{ old('kelas_id') == $k->id ? 'selected' : '' }}>
                                {{ $k->nama_kelas }}</option>
                        @endforeach
                    </x-splade-select>
                </label>
                <label class="flex flex-col gap-1">
                    <span class="font-medium">Password</span>
                    <x-splade-input type="password" name="password" class="w-full py-1 rounded-md outline-none" />
                </label>
            </div>
        </div>
        <label class="flex flex-col gap-1">
            <span class="font-medium">Alamat</span>
            <x-splade-textarea name="alamat" cols="30" rows="10"
                class="resize-none  py-1 rounded-md outline-none"></x-splade-textarea>
        </label>
        <x-splade-submit class="w-full py-1 rounded-md bg-[#005A8D] text-white cursor-pointer" value="Kirim" />
    </x-splade-form>
</x-layouts.admin>
