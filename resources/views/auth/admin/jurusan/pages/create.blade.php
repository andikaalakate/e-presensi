<x-layouts.admin :breadcrumbs="$breadcrumbs">
    @seoTitle('Admin - Tambah Jurusan')
    <x-slot:title>
        {{ isset($title) ? $title : '' }}
    </x-slot:title>
    <x-splade-form action="{{ route('admin.jurusan.store') }}" method="POST" class="p-4 bg-slate-300 flex flex-col gap-4 rounded-md overflow-auto"
        confirm="Buat Data Jurusan" confirm-text="Apakah kamu yakin akan membuatnya?"
        confirm-button="Ya, aku ingin membuatnya!" cancel-button="Tidak">
        @method('POST')
        @csrf
        <div class="flex flex-col gap-4 flex-grow">
            <label class="flex flex-col gap-1">
                <span class="font-medium">Nama</span>
                <x-splade-input type="text" name="nama_jurusan" class="w-full py-1 rounded-md outline-none"/>
            </label>
            <label class="flex flex-col gap-1">
                <span class="font-medium">Singkatan</span>
                <x-splade-input type="text" name="singkatan_jurusan" class="w-full py-1 rounded-md outline-none"/>
            </label>
            <label class="flex flex-col gap-1">
                <span class="font-medium">Kepala Jurusan</span>
                <x-splade-select name="kepala_jurusan_id" class="w-full py-1 rounded-md outline-none">
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
