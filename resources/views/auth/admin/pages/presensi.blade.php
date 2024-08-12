@extends('layouts.admin')

@section('body')
    <form action="{{ route('admin.presensi.store') }}" method="POST">
        @method('POST')
        @csrf
        <div>
            <label for="nisn" class="block text-sm font-medium text-gray-700">NISN</label>
            <input type="text" name="nisn" id="nisn" autofocus
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
        </div>

        <div>
            <label for="foto" class="block text-sm font-medium text-gray-700">Foto</label>
            <div class="relative w-32 h-32 rounded-full border-2 border-black overflow-hidden">
                <img class="object-cover w-full h-full">
            </div>
        </div>

        <div>
            <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
            <input type="text" id="nama" readonly
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm bg-gray-100">
        </div>

        <div>
            <label for="kelas" class="block text-sm font-medium text-gray-700">Kelas</label>
            <input type="text" id="kelas" readonly
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm bg-gray-100">
        </div>

        <div>
            <label for="jurusan" class="block text-sm font-medium text-gray-700">Jurusan</label>
            <input type="text" id="jurusan" readonly
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm bg-gray-100">
        </div>

        <div>
            <label for="tahunAjaran" class="block text-sm font-medium text-gray-700">Tahun Ajaran</label>
            <input type="text" id="tahunAjaran" readonly
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm bg-gray-100">
        </div>

        <button type="submit"
            class="mt-4 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Submit
        </button>
    </form>
@endsection