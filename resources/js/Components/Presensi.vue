<template>
    <div class="bg-slate-200 p-2 md:p-4 rounded-md">
        <div class="flex justify-start mb-4 items-center flex-wrap gap-2">
            <h1 class="font-semibold text-xl">Buat Presensi</h1>
        </div>
        <div class="flex flex-wrap gap-8">
            <div class="max-w-96 flex-grow min-w-60">
                <img
                    :src="forms.foto"
                    :alt="forms.nama"
                    class="bg-slate-300 aspect-[3/4]"
                />
            </div>
            <div class="flex-grow flex flex-col gap-4">
                <label class="flex flex-col">
                    <span>NISN</span>
                    <input
                        type="text"
                        id="nisn"
                        inputmode="numeric"
                        autofocus
                        v-model="form.nisn"
                        class="w-full rounded-xl bg-[#fff] border-b-2 border-[#4f4f4f]"
                    />
                </label>
                <label class="flex flex-col">
                    <span>Nama</span>
                    <input
                        v-model="forms.nama"
                        type="text"
                        class="w-full rounded-xl bg-[#fff] border-b-2 border-[#4f4f4f]"
                        readonly
                        disabled
                    />
                </label>
                <label class="flex flex-col">
                    <span>Jenis Kelamin</span>
                    <input
                        v-model="forms.jenis_kelamin"
                        type="text"
                        class="w-full rounded-xl bg-[#fff] border-b-2 border-[#4f4f4f]"
                        readonly
                        disabled
                    />
                </label>
                <label class="flex flex-col">
                    <span>Kelas</span>
                    <input
                        v-model="forms.kelas"
                        type="text"
                        class="w-full rounded-xl bg-[#fff] border-b-2 border-[#4f4f4f]"
                        readonly
                        disabled
                    />
                </label>
                <label class="flex flex-col">
                    <span>Jurusan</span>
                    <input
                        v-model="forms.jurusan"
                        type="text"
                        class="w-full rounded-xl bg-[#fff] border-b-2 border-[#4f4f4f]"
                        readonly
                        disabled
                    />
                </label>
                <button
                    class="text-[#fff7fc] font-medium mt-2 p-2 cursor-pointer bg-[#005A8D] rounded-xl"
                    type="submit"
                    value="Kirim"
                >Kirim</button>
            </div>
        </div>
    </div>
</template>

<script setup>
defineProps({
    form: {
        type: Object,
        required: true,
    },
});
</script>

<script>
export default {
    data() {
        return {
            forms: {
                nisn: "",
                foto: "",
                nama: "",
                kelas: "",
                jenis_kelamin: "",
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
            const nisnInput = document.getElementById("nisn");

            nisnInput.addEventListener("input", (event) => {
                const nisn = event.target.value;
                if (nisn.length >= 11) {
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
                    this.forms.nisn = data.nisn || "";
                    this.forms.foto = data.foto || "";
                    this.forms.nama = data.nama || "Tidak ada data siswa";
                    this.forms.jenis_kelamin =
                        data.jenis_kelamin || "Tidak ada data siswa";
                    this.forms.kelas = data.kelas_nama || "Tidak ada data siswa";
                    this.forms.jurusan =
                        data.jurusan_nama || "Tidak ada data siswa";
                    this.forms.tahunAjaran =
                        data.tahun_mulai && data.tahun_berakhir
                            ? `${data.tahun_mulai} - ${data.tahun_berakhir}`
                            : "Tidak ada data siswa";
                })
                .catch(() => {
                    this.resetFields();
                });
        },
        resetFields() {
            this.forms.foto = "";
            this.forms.nama = "Tidak ada data siswa";
            this.forms.jenis_kelamin = "Tidak ada data siswa";
            this.forms.kelas = "Tidak ada data siswa";
            this.forms.jurusan = "Tidak ada data siswa";
            this.forms.tahunAjaran = "Tidak ada data siswa";
        },
    },
};
</script>
