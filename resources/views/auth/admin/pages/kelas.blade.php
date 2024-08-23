<x-layouts.admin>
    @seoTitle('Admin - Kelas')
    <x-slot:title>
        {{ isset($title) ? $title : '' }}
    </x-slot:title>
    <div class="bg-slate-200 p-2 md:p-4 rounded-md">
        <div class="flex items-center justify-between gap-2">
            <x-search-form route="" value="{{ request('search') }}" placeholder="Cari..." />
            <x-action-button class="bg-[#008d3b] fill-white p-1 rounded-sm " route="{{ route('admin.kelas.create') }}"
                icon="plus" />
        </div>
    </div>
    <div class="bg-slate-200 p-2 md:p-4 rounded-md my-4 ">
        <div class="flex justify-between mb-4 items-center flex-wrap gap-2">
            <h1 class="font-semibold text-xl">Daftar Kelas</h1>
            <div class="flex gap-2">
                <a class="items-center gap-2 flex bg-[#083f5a] p-2 rounded-md fill-white text-white"
                    href="{{ route('admin.kelas') }}"><box-icon name='download'></box-icon> Export
                    Kelas Data</a>
            </div>
        </div>
        <div class="rounded-md overflow-auto bg-slate-300">
            <table class="w-full bg-salte-300">
                <thead class="bg-[#083f5a] text-white border-y border-slate-400">
                    <tr>
                        <th class="p-2">No</th>
                        <th class="p-2">Nama Kelas</th>
                        <th class="p-2">Jurusan</th>
                        <th class="p-2">Aksi</th>
                    </tr>
                </thead>
                {{-- <x-items-h-table /> --}}
            </table>
        </div>
    </div>
    <div class="bg-slate-200 p-2 md:p-4 rounded-md my-4 mb-0">
        <x-pagination-items :paginator="$kelas" route="{{ route('admin.kelas') }}" />
    </div>
</x-layouts.admin>

