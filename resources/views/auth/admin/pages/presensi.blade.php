@extends('layouts.admin')

@section('body')
    <form action="{{ route('admin.presensi.store') }}" method="POST" x-data="siswaForm()" @submit.prevent="submitForm">
        @method('POST')
        @csrf
        <div>
            <label for="nisn" class="block text-sm font-medium text-gray-700">NISN</label>
            <input type="text" name="nisn" id="nisn" x-model="nisn" @input="fetchSiswa" autofocus
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
        </div>

        <div>
            <label for="foto" class="block text-sm font-medium text-gray-700">Foto</label>
            <div class="relative w-32 h-32 rounded-full border-2 border-black overflow-hidden">
                <img x-bind:src="foto" x-bind:alt="nama" class="object-cover w-full h-full">
            </div>
        </div>

        <div>
            <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
            <input type="text" id="nama" x-model="nama" readonly
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm bg-gray-100">
        </div>

        <div>
            <label for="kelas" class="block text-sm font-medium text-gray-700">Kelas</label>
            <input type="text" id="kelas" x-model="kelas" readonly
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm bg-gray-100">
        </div>

        <div>
            <label for="jurusan" class="block text-sm font-medium text-gray-700">Jurusan</label>
            <input type="text" id="jurusan" x-model="jurusan" readonly
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm bg-gray-100">
        </div>

        <div>
            <label for="tahunAjaran" class="block text-sm font-medium text-gray-700">Tahun Ajaran</label>
            <input type="text" id="tahunAjaran" x-model="tahunAjaran" readonly
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm bg-gray-100">
        </div>

        <button type="submit"
            class="mt-4 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Submit
        </button>
    </form>
@endsection

@section('script')
    <script>
        function siswaForm() {
            return {
                nisn: '',
                nama: '',
                kelas: '',
                jurusan: '',
                tahunAjaran: '',
                foto: '',
                fetchSiswa() {
                    if (this.nisn.length === 11) {
                        fetch(`{{ route('admin.presensi.autofill') }}?nisn=${this.nisn}`)
                            .then(response => response.json())
                            .then(data => {
                                if (data) {
                                    this.nama = data.nama;
                                    this.kelas = data.kelas_nama;
                                    this.jurusan = data.jurusan_nama;
                                    this.tahunAjaran = data.tahun_mulai + ' - ' + data.tahun_berakhir;
                                    this.foto = `{{ asset('storage/') }}/${data.foto}`;
                                } else {
                                    this.clearFields();
                                }
                            });
                    } else {
                        this.clearFields();
                    }
                },
                clearFields() {
                    this.nama = '';
                    this.kelas = '';
                    this.jurusan = '';
                    this.tahunAjaran = '';
                    this.foto = '';
                },
                submitForm() {
                    // Mengirim form secara manual
                    this.$el.submit();
                }
            }
        }
    </script>
@endsection
