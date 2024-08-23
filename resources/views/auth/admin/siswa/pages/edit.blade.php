@extends('layouts.admin')

@section('body')
    <x-splade-form :default="[
        'nisn' => $siswa->nisn,
        'nama_lengkap' => $siswa->nama_lengkap,
        'jenis_kelamin' => $siswa->jenis_kelamin,
        'tanggal_lahir' => $siswa->tanggal_lahir,
        'email' => $siswa->email,
        'kelas_id' => $siswa->kelas_id,
        'alamat' => $siswa->alamat,
        'no_telp' => $siswa->no_telp,
    ]" action="{{ route('admin.siswa.update', $siswa->nisn) }}" method="put"
        confirm="Edit Data Siswa" confirm-text="Apakah kamu yakin akan mengeditnya?"
        confirm-button="Ya, aku ingin mengeditnya!" cancel-button="Tidak"
        class="p-4 bg-slate-300 flex flex-col gap-4 rounded-md overflow-auto">
        @method('PUT')
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
                    <x-splade-select name="jenis_kelamin" :options="$jk" option-label="nama" option-value="value"
                        placeholder="Pilih Jenis Kelamin" class="w-full py-1 rounded-md outline-none" />
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
                    <x-splade-select name="kelas_id" :options="$kelas" option-label="nama_kelas" option-value="id"
                        placeholder="Pilih Kelas" class="w-full py-1 rounded-md outline-none" />
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
                class="resize-none  py-1 rounded-md outline-none" />
        </label>
        <x-splade-submit class="w-full py-1 rounded-md bg-[#005A8D] text-white cursor-pointer" value="Kirim" />
    </x-splade-form>
@endsection
