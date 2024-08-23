<x-layouts.admin>
    @seoTitle('Admin - Siswa')
    <x-slot:title>
        {{ isset($title) ? $title : '' }}
    </x-slot:title>
    
    <div class="bg-slate-200 p-2 md:p-4 rounded-md">
        <div class="flex items-center justify-between gap-2">
            <x-search-form route="{{ route('admin.siswa') }}" value="{{ request('search') }}" placeholder="Cari..." />

            <x-action-button class="bg-[#008d3b] fill-white p-1 rounded-sm" route="{{ route('admin.siswa.create') }}"
                icon="plus" />
        </div>
    </div>
    <x-splade-lazy>
        <div>
            <x-slot:placeholder class="text-center items-center text-xl font-bold flex w-full">
                Sedang memuat list Siswa...
            </x-slot:placeholder>
        </div>
        @if ($siswas->count())
            @foreach ($siswas as $siswa)
                @php
                    $fields = [
                        ['title' => 'NIS', 'data' => $siswa->nisn],
                        ['title' => 'Nama', 'data' => $siswa->nama_lengkap],
                        ['title' => 'Jenis Kelamin', 'data' => $siswa->jenis_kelamin],
                        ['title' => 'Kelas', 'data' => $siswa->kelas->nama_kelas],
                        ['title' => 'Jurusan', 'data' => $siswa->kelas->jurusan->nama_jurusan],
                    ];
                    $actions = [
                        'edit' => ['url' => route('admin.siswa.edit', $siswa->nisn), 'label' => 'Edit'],
                        'delete' => ['url' => route('admin.siswa.destroy', $siswa->nisn), 'label' => 'Hapus'],
                    ];
                @endphp
                <x-items-table :fields="$fields" :actions="$actions" />
            @endforeach
        @else
            <p class="text-center p-8">Tidak ada hasil yang ditemukan.</p>
        @endif
    </x-splade-lazy>

    <div class="bg-slate-200 p-2 md:p-4 rounded-md my-4 mb-0">
        <x-pagination-items :paginator="$siswas" route="{{ route('admin.siswa') }}" />
    </div>
</x-layouts.admin>
