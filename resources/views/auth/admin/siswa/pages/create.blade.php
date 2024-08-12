@extends('layouts.admin')

@section('body')
    <form class="p-4 bg-slate-300 flex flex-col gap-4 rounded-md overflow-auto">
        <div class="flex flex-wrap gap-4">
            <div class="flex flex-col gap-4 flex-grow">
                <label class="flex flex-col gap-1">
                    <span class="font-medium">NISN</span>
                    <input type="text" name="" id="" class="px-3 w-full py-1 rounded-md outline-none">
                </label>
                <label class="flex flex-col gap-1">
                    <span class="font-medium">Nama Lengkap</span>
                    <input type="text" name="" id="" class="px-3 w-full py-1 rounded-md outline-none" >
                </label>
                <label class="flex flex-col gap-1">
                    <span class="font-medium">Jenis Kelamin</span>
                    <select name="" id="" class="px-3 w-full py-1 rounded-md outline-none">
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </label>
                <label class="flex flex-col gap-1">
                    <span class="font-medium">Tanggal Lahir</span>
                    <input type="date" name="" id="" class="px-3 w-full py-1 rounded-md outline-none">
                </label>
            </div>
            <div class="flex flex-col gap-4 flex-grow">
                <label class="flex flex-col gap-1">
                    <span class="font-medium">Email</span>
                    <input type="email" name="" id="" class="px-3 w-full py-1 rounded-md outline-none">
                </label>
                <label class="flex flex-col gap-1">
                    <span class="font-medium">Nomor Telepon</span>
                    <input type="text" name="" id="" class="px-3 w-full py-1 rounded-md outline-none">
                </label>
                {{-- <label class="flex flex-col gap-1">
                    <span class="font-medium">Foto</span>
                    <input type="file" name="" id="" class="hidden">
                    <span class="px-3 w-full py-1 rounded-md outline-none flex items-center justify-center bg-[#005A8D] text-white cursor-pointer font-semibold hover:drop-shadow-xl duration-300">Upload</span>
                    <div class="p-4 pb-0 flex items-center justify-center">
                        <img src="" class="bg-red-500 size-28 rounded-full overflow-hidden" alt="">
                    </div>
                </label> --}}
                <label class="flex flex-col gap-1">
                    <span class="font-medium">Kelas</span>
                    <select name="" id="" class="px-3 w-full py-1 rounded-md outline-none">
                        <option value="X">X</option>
                        <option value="XI">XI</option>
                        <option value="XII">XII</option>
                    </select>
                </label>
                <label class="flex flex-col gap-1">
                    <span class="font-medium">Password</span>
                    <input type="password" name="" id="" class="px-3 w-full py-1 rounded-md outline-none">
                </label>
            </div>
        </div>
        <label class="flex flex-col gap-1">
            <span class="font-medium">Alamat</span>
            <textarea name="" id="" cols="30" rows="10" class="resize-none px-3  py-1 rounded-md outline-none"></textarea>
        </label>
        <input type="submit" class="px-3 w-full py-1 rounded-md bg-[#005A8D] text-white cursor-pointer" value="Kirim">
    </form>
@endsection
