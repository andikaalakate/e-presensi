@extends('layouts.admin')

@section('body')
    <div class="bg-slate-200 p-2 md:p-4 rounded-md">
        <div class="flex items-center justify-between gap-2">
            <input type="text" name="search" id="search" placeholder="Cari NISN..." class="py-1 px-3 rounded-md max-w-96 w-full">
            <a href="#" class="flex items-center justify-center bg-[#008d3b] fill-white p-1 rounded-sm"><box-icon
                    name='plus'></box-icon></a>
        </div>
        <div class="py-4">
            <table class="w-full ">
                <tr>
                    <th class="p-2 max-[768px]:block">NISN</th>
                    <th class="p-2 max-[768px]:block">Nama</th>
                    <th class="p-2 max-[768px]:block">Kelas</th>
                    <th class="p-2 max-[768px]:block">Jenis Kelamin</th>
                    <th class="p-2 max-[768px]:block">Tanggal Lahir</th>
                </tr>
                <tr>
                    <td class="p-2 max-[768px]:block md:text-center">123456</td>
                    <td class="p-2 max-[768px]:block md:text-center">Budi</td>
                    <td class="p-2 max-[768px]:block md:text-center">X</td>
                    <td class="p-2 max-[768px]:block md:text-center">Cowok Maskulin</td>
                    <td class="p-2 max-[768px]:block md:text-center">17 Agustus 1945</td>
                </tr>
            </table>
        </div>
    </div>
@endsection
