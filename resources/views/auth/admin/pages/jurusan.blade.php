<x-layouts.admin :breadcrumbs="$breadcrumbs">
    @seoTitle('Admin - Jurusan')
    <x-slot:title>
        {{ isset($title) ? $title : '' }}
    </x-slot:title>
    <div class="bg-slate-200 p-2 md:p-4 rounded-md">
        <div class="flex items-center justify-between gap-2">
            <x-search-form route="{{ route('admin.jurusan') }}" value="{{ request('search') }}" placeholder="Cari..." />

            <x-action-button class="bg-[#008d3b] fill-white p-1 rounded-sm " route="{{ route('admin.jurusan.create') }}"
                icon="plus" />
        </div>
    </div>
    <div class="bg-slate-200 p-2 md:p-4 rounded-md my-4 ">
        <div class="flex justify-between mb-4 items-center flex-wrap gap-2">
            <h1 class="font-semibold text-xl">Daftar Jurusan</h1>
            <div class="flex gap-2">
                <Link class="items-center gap-2 flex bg-[#083f5a] p-2 rounded-md fill-white text-white"
                    href="{{ route('admin.jurusan') }}"><box-icon name='download'></box-icon> Export</Link>
            </div>
        </div>
        <div class="rounded-md overflow-auto bg-slate-300">
            <table class="w-full bg-salte-300">
                <thead class="bg-[#083f5a] text-white border-y border-slate-400">
                    <tr>
                        <th class="p-2">No</th>
                        <th class="p-2">Nama Jurusan</th>
                        <th class="p-2">Singkatan</th>
                        <th class="p-2">Kepala Jurusan</th>
                        <th class="p-2">Jumlah Kelas</th>
                        <th class="p-2">Jumlah Siswa</th>
                        <th class="p-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <x-splade-lazy>
                        <x-slot:placeholder>
                            <tr>
                                <td class="text-center p-8" colspan="7">
                                    Sedang memuat list Jurusan...
                                </td>
                            </tr>
                        </x-slot:placeholder>
                        @if ($jurusans->count())
                            @foreach ($jurusans as $index => $jur)
                                @php
                                    $totalSiswa = 0;
                                    foreach ($jur->kelas as $kelas) {
                                        $totalSiswa += $kelas->siswa()->count();
                                    }

                                    $fields = [
                                        ['data' => $index + 1],
                                        ['data' => $jur->nama_jurusan],
                                        ['data' => $jur->singkatan_jurusan],
                                        ['data' => $jur->kepalaJurusan->user->nama],
                                        ['data' => $jur->kelas->count()],
                                        ['data' => $totalSiswa],
                                    ];
                                    $actions = [
                                        'edit' => ['url' => route('admin.jurusan.edit', $jur->id), 'label' => 'Edit'],
                                        'delete' => [
                                            'url' => route('admin.jurusan.destroy', $jur->id),
                                            'label' => 'Hapus',
                                        ],
                                    ];
                                @endphp
                                <x-items-h-table :fields="$fields" :actions="$actions" />
                            @endforeach
                        @else
                            <p class="text-center p-8">Tidak ada hasil yang ditemukan.</p>
                        @endif
                    </x-splade-lazy>
                </tbody>
            </table>
        </div>
    </div>

    @if ($jurusans->hasPages())
        <div class="bg-slate-200 p-2 md:p-4 rounded-md my-4 mb-0">
            <x-pagination-items :paginator="$jurusans" route="{{ route('admin.jurusan') }}" />
        </div>
    @endif
</x-layouts.admin>
