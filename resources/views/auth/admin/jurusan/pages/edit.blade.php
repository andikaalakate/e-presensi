<x-layouts.admin :breadcrumbs="$breadcrumbs">
    @seoTitle('Admin - Edit Jurusan')
    <x-slot:title>
        {{ isset($title) ? $title : '' }}
    </x-slot:title>
    <x-splade-form :default="[
        'nama_jurusan' => $jurusan->nama_jurusan,
        'singkatan_jurusan' => $jurusan->singkatan_jurusan,
        'kepala_jurusan_id' => $jurusan->kepala_jurusan_id,
    ]" action="{{ route('admin.jurusan.update', $jurusan->id) }}" method="PUT"
        class="p-4 bg-slate-300 flex flex-col gap-4 rounded-md overflow-auto" confirm="Edit Data Jurusan"
        confirm-text="Apakah kamu yakin akan mengeditnya?" confirm-button="Ya, aku ingin membuatnya!"
        cancel-button="Tidak">
        @method('POST')
        @csrf
        <div class="flex flex-col gap-4 flex-grow">
            <label class="flex flex-col gap-1">
                <span class="font-medium">Nama</span>
                <x-splade-input type="text" name="nama_jurusan" class="w-full py-1 rounded-md outline-none" />
            </label>
            <label class="flex flex-col gap-1">
                <span class="font-medium">Singkatan</span>
                <x-splade-input type="text" name="singkatan_jurusan" class="w-full py-1 rounded-md outline-none" />
            </label>
            <label class="flex flex-col gap-1">
                <span class="font-medium">Kepala Jurusan</span>
                <x-splade-select name="kepala_jurusan_id" class="w-full py-1 rounded-md outline-none">
                    <option value="Laki-Laki">Zainal Gaptech</option>
                    <option value="Perempuan">Kajur Gaptech</option>
                    <option value="Perempuan">Aduh Pening kali Bapak</option>
                    <option value="Perempuan">Uda makan kolis ?</option>
                    <option value="Perempuan">Uda siap Dapin</option>
                </x-splade-select>
                
            </label>
        </div>
        <x-splade-submit class="w-full py-1 rounded-md bg-[#005A8D] text-white cursor-pointer" value="Kirim" />
    </x-splade-form>
</x-layouts.admin>
