<x-layouts.admin :breadcrumbs="$breadcrumbs">
    @seoTitle('Admin - Tambah Tahun Ajaran')
    <x-slot:title>
        {{ isset($title) ? $title : '' }}
    </x-slot:title>
    <x-splade-form action="{{ route('admin.tahun-ajaran.store') }}" method="POST"
        class="p-4 bg-slate-300 flex flex-col gap-4 rounded-md overflow-auto" confirm="Buat Data Tahun Ajaran"
        confirm-text="Apakah kamu yakin akan membuatnya?" confirm-button="Ya, aku ingin membuatnya!" cancel-button="Tidak">
        @method('POST')
        @csrf
        <div class="flex flex-wrap gap-4">
            <div class="flex-grow">
                <label class="flex flex-col gap-1">
                    <span class="font-medium">Tahun Semester Ganjil</span>
                    <x-splade-input type="date" name="nisn" class="w-full py-1 rounded-md outline-none" />
                </label>
                <label class="flex flex-col gap-1">
                    <span class="font-medium">Tahun Semester Genap</span>
                    <x-splade-input type="date" name="nisn" class="w-full py-1 rounded-md outline-none" />
                </label>
            </div>
        </div>
        <x-splade-submit class="w-full py-1 rounded-md bg-[#005A8D] text-white cursor-pointer" value="Kirim" />
    </x-splade-form>
</x-layouts.admin>
