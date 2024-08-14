<template>
    <div>
        <label for="foto" class="block text-sm font-medium text-gray-700"
            >Foto</label
        >
        <div
            class="relative w-32 h-32 rounded-md border-2 border-black overflow-hidden"
        >
            <img
                :src="form.foto"
                :alt="form.nama"
                class="object-cover w-full h-full"
            />
        </div>
    </div>
    <div>
        <label for="nama" class="block text-sm font-medium text-gray-700"
            >Nama</label
        >
        <input
            type="text"
            id="nama"
            :value="form.nama"
            readonly
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm bg-gray-100"
        />
    </div>
    <div>
        <label for="kelas" class="block text-sm font-medium text-gray-700"
            >Kelas</label
        >
        <input
            type="text"
            id="kelas"
            :value="form.kelas"
            readonly
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm bg-gray-100"
        />
    </div>
    <div>
        <label for="jurusan" class="block text-sm font-medium text-gray-700"
            >Jurusan</label
        >
        <input
            type="text"
            id="jurusan"
            :value="form.jurusan"
            readonly
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm bg-gray-100"
        />
    </div>
    <div>
        <label for="tahunAjaran" class="block text-sm font-medium text-gray-700"
            >Tahun Ajaran</label
        >
        <input
            type="text"
            id="tahunAjaran"
            :value="form.tahunAjaran"
            readonly
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm bg-gray-100"
        />
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: {
                nisn: "",
                foto: "",
                nama: "",
                kelas: "",
                jurusan: "",
                tahunAjaran: "",
            },
        };
    },
    mounted() {
        this.getNISNValue();
    },
    methods: {
        getNISNValue() {
            const nisnInput = document.getElementById('nisn');

            nisnInput.addEventListener('input', (event) => {
                const nisn = event.target.value;
                if (nisn.length >= 8) {
                    this.fetchData(nisn);
                } else {
                    this.resetFields();
                }
            });
        },
        fetchData(nisn) {
            fetch(`/admin/presensi/autofill?nisn=${nisn}`)
                .then((response) => response.json())
                .then((data) => {
                    this.form.foto = data.foto || "";
                    this.form.nama = data.nama || "Tidak ada data siswa";
                    this.form.kelas = data.kelas_nama || "Tidak ada data siswa";
                    this.form.jurusan =
                        data.jurusan_nama || "Tidak ada data siswa";
                    this.form.tahunAjaran =
                        data.tahun_mulai && data.tahun_berakhir
                            ? `${data.tahun_mulai} - ${data.tahun_berakhir}`
                            : "Tidak ada data siswa";
                })
                .catch(() => {
                    this.resetFields();
                });
        },
        resetFields() {
            this.form.foto = "";
            this.form.nama = "Tidak ada data siswa";
            this.form.kelas = "Tidak ada data siswa";
            this.form.jurusan = "Tidak ada data siswa";
            this.form.tahunAjaran = "Tidak ada data siswa";
        },
    },
};
</script>
