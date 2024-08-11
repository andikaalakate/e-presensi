@extends('layouts.admin')

@section('body')
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-6">Tambah Siswa Baru</h2>
            <form action="{{ route('admin.siswa.store') }}" method="POST" enctype="multipart/form-data" x-data="{ showPassword: false }">
                @csrf
                <div class="mb-4">
                    <label for="nisn" class="block text-sm font-medium text-gray-700">NISN</label>
                    <input type="text" id="nisn" name="nisn" value="{{ old('nisn') }}" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    @error('nisn')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="nama_lengkap" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <input type="text" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    @error('nama_lengkap')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                    <select id="jenis_kelamin" name="jenis_kelamin" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Laki-Laki" {{ old('jenis_kelamin') == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki
                        </option>
                        <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan
                        </option>
                    </select>
                    @error('jenis_kelamin')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    @error('tanggal_lahir')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                    <textarea id="alamat" name="alamat" rows="3"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('alamat') }}</textarea>
                    @error('alamat')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="no_telp" class="block text-sm font-medium text-gray-700">No. Telepon</label>
                    <input type="text" id="no_telp" name="no_telp" value="{{ old('no_telp') }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    @error('no_telp')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="foto" class="block text-sm font-medium text-gray-700">Foto</label>
                    <input type="file" id="foto" name="foto"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    @error('foto')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="kelas_id" class="block text-sm font-medium text-gray-700">Kelas</label>
                    <select id="kelas_id" name="kelas_id" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Pilih Kelas</option>
                        @foreach ($kelas as $k)
                            <option value="{{ $k->id }}" {{ old('kelas_id') == $k->id ? 'selected' : '' }}>
                                {{ $k->nama_kelas }}</option>
                        @endforeach
                    </select>
                    @error('kelas_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <div class="relative">
                        <input :type="showPassword ? 'text' : 'password'" id="password" name="password" required
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <button type="button" @click="showPassword = !showPassword"
                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                            <svg x-show="!showPassword" class="h-4 w-4 text-gray-400" fill="none"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M12 4.5C7.305 4.5 3.135 7.325 1.5 12c1.635 4.675 5.805 7.5 10.5 7.5s8.865-2.825 10.5-7.5c-1.635-4.675-5.805-7.5-10.5-7.5zM12 15a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                            </svg>
                            <svg x-show="showPassword" class="h-4 w-4 text-gray-400" fill="none"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M15.563 8.5c-.427-.88-1.002-1.67-1.718-2.297l-1.432-1.432a7.553 7.553 0 0 0-8.91.776l1.412 1.412A5.531 5.531 0 0 1 12 6.5c1.825 0 3.478.779 4.63 2.029l1.418-1.418c-1.558-1.558-3.611-2.563-5.948-2.671l1.473 1.473c.583.581 1.05 1.32 1.354 2.121h2.636l1.395-1.395c-.403-1.325-1.07-2.541-1.97-3.594l-1.393 1.393a9.563 9.563 0 0 0-6.707-2.796 9.527 9.527 0 0 0-6.993 2.794l-1.41-1.41A11.528 11.528 0 0 1 12 3.5c2.583 0 5.057.818 7.063 2.328l1.435-1.434c-2.447-2.448-5.62-3.894-9.065-4.146l1.399 1.398c.859.858 1.611 1.842 2.242 2.937H12z" />
                            </svg>
                        </button>
                    </div>
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Tambah
                        Siswa</button>
                </div>
            </form>
        </div>
    </div>
@endsection
