<x-layouts.admin>
    @seoTitle('Admin - Tahun Ajaran')
    <x-slot:title>
        {{ isset($title) ? $title : '' }}
    </x-slot:title>
    <div class="bg-slate-200 p-2 md:p-4 rounded-md">
        <div class="flex items-center justify-between gap-2">
            <x-search-form route="" value="{{ request('search') }}" placeholder="Cari..." />
            <x-action-button class="bg-[#008d3b] fill-white p-1 rounded-sm "
                route="{{ route('admin.tahun-ajaran.create') }}" icon="plus" />
        </div>
    </div>
    <div class="bg-slate-200 p-2 md:p-4 rounded-md my-4 ">
        <div class="flex justify-between mb-4 items-center flex-wrap gap-2">
            <h1 class="font-semibold text-xl">Daftar Tahun Ajaran</h1>
            <div class="flex gap-2">
                <Link class="items-center gap-2 flex bg-[#083f5a] p-2 rounded-md fill-white text-white"
                    href="{{ route('admin.tahun-ajaran') }}"><box-icon name='download'></box-icon> Export</Link>
            </div>
        </div>
        <div class="rounded-md overflow-auto bg-slate-300">
            <table class="w-full bg-salte-300">
                <thead class="bg-[#083f5a] text-white border-y border-slate-400">
                    <tr>
                        <th class="p-2">No</th>
                        <th class="p-2">Tahun Mulai</th>
                        <th class="p-2">Tahun Selesai</th>
                        <th class="p-2">Jumlah Kelas</th>
                        <th class="p-2">Jumlah Murid</th>
                        <th class="p-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <x-splade-lazy>
                        <x-slot:placeholder>
                            <tr>
                                <td class="text-center p-8" colspan="6">
                                    Sedang memuat list Tahun Ajaran...
                                </td>
                            </tr>
                        </x-slot:placeholder>
                        @if ($tahunAjarans->count())
                            @foreach ($tahunAjarans as $index => $ta)
                                @php
                                    $totalSiswa = 0;
                                    foreach ($ta->kelas as $kelas) {
                                        $totalSiswa += $kelas->siswa()->count();
                                    }

                                    $fields = [
                                        ['data' => $index + 1],
                                        ['data' => $ta->tahun_mulai],
                                        ['data' => $ta->tahun_selesai],
                                        ['data' => $ta->kelas->count()],
                                        ['data' => $totalSiswa],
                                    ];
                                    $actions = [
                                        'edit' => [
                                            'url' => route('admin.tahun-ajaran.edit', $ta->id),
                                            'label' => 'Edit',
                                        ],
                                        'delete' => [
                                            'url' => route('admin.tahun-ajaran.destroy', $ta->id),
                                            'label' => 'Hapus',
                                        ],
                                    ];
                                @endphp
                                <x-items-h-table :fields="$fields" :actions="$actions" />
                            @endforeach
                        @else
                            <tr>
                                <td class="text-center p-8" colspan="6">Tidak ada tahun ajaran yang ditemukan.</td>
                            </tr>
                        @endif
                    </x-splade-lazy>
                </tbody>
            </table>
        </div>
    </div>

    @if ($tahunAjarans->hasPages())
        <div class="bg-slate-200 p-2 md:p-4 rounded-md my-4 mb-0">
            <x-pagination-items :paginator="$tahunAjarans" route="{{ route('admin.tahun-ajaran') }}" />
        </div>
    @endif
</x-layouts.admin>
