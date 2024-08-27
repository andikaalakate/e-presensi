<x-layouts.admin :breadcrumbs="$breadcrumbs">
    @seoTitle('Admin - Tambah Kelas')
    <x-slot:title>
        {{ isset($title) ? $title : '' }}
    </x-slot:title>
    <x-splade-form action="{{ route('admin.kelas.store') }}" method="POST" class="p-4 bg-slate-300 flex flex-col gap-4 rounded-md overflow-auto"
        confirm="Buat Data Kelas" confirm-text="Apakah kamu yakin akan membuatnya?"
        confirm-button="Ya, aku ingin membuatnya!" cancel-button="Tidak">
        @method('POST')
        @csrf
        <div class="flex flex-col gap-4 flex-grow">
            <label class="flex flex-col gap-1">
                <span class="font-medium">Nama Kelas</span>
                <x-splade-input type="text" name="nama_kelas" class="w-full py-1 rounded-md outline-none"/>
            </label>
            <label class="flex flex-col gap-1">
                <span class="font-medium">Jurusan</span>
                <x-splade-select name="jurusan_id" class="w-full py-1 rounded-md outline-none">
                    <option value="1">Rekayasa Perangkat Lunak</option>
                    <option value="2">Manajemen Perkantoran dan Layanan Bisnis</option>
                    <option value="3">Pemasaran</option>
                    <option value="4">Akuntansi dan Keuangan Lembaga</option>
                    <option value="5">Teknik Jaringan Komputer dan Telekomunis</option>
                </x-splade-select>
            </label>
            <label class="flex flex-col gap-1">
                <span class="font-medium">Tahun Ajaran</span>
                <x-splade-select name="jurusan_id" class="w-full py-1 rounded-md outline-none">
                    <option value="1">2019/20</option>
                    <option value="2">2020/21</option>
                    <option value="3">2021/22</option>
                    <option value="4">2022/23</option>
                    <option value="5">2023/24</option>
                </x-splade-select>
            </label>
            <label class="flex flex-col gap-1">
                <span class="font-medium">Wali Kelas</span>
                <x-splade-select name="wali_kelas_id" class="w-full py-1 rounded-md outline-none">
                    <option value="1">Zainal Gaptech</option>
                    <option value="2">Kajur Gaptech</option>
                    <option value="3">Aduh Pening kali Bapak</option>
                    <option value="4">Uda makan kolis ?</option>
                    <option value="5">Uda siap Dapin</option>
                </x-splade-select>
            </label>
        </div>
        <x-splade-submit class="w-full py-1 rounded-md bg-[#005A8D] text-white cursor-pointer" value="Kirim" />
    </x-splade-form>
</x-layouts.admin>