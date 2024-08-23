<x-layouts.admin>
    @seoTitle('Admin - Peringkat')
    <x-slot:title>
        {{ isset($title) ? $title : '' }}
    </x-slot:title>
    <div class="bg-slate-200 p-2 md:p-4 rounded-md">
        <div class="flex items-center justify-between gap-2">
            <x-search-form route="{{ route('admin.peringkat') }}" value="{{ request('search') }}" placeholder="Cari..." />
        </div>
    </div>
    <div class="bg-slate-200 p-2 md:p-4 rounded-md my-4">
        <div class="border border-slate-300 rounded-md overflow-auto">
            <table class="w-full bg-slate-300">
                <thead class="bg-[#083f5a] text-white border-y border-slate-400">
                    <tr class="font-bold">
                        <th class="p-2 w-24">NISN</th>
                        <th class="p-2 w-34 text-left">Nama</th>
                        <th class="p-2 w-24">Skor</th>
                        <th class="p-2 w-24">Kelas</th>
                        <th class="p-2 w-36">Urutan</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $peringkatGlobal = Cache::get('peringkat_global', collect());

                        $medaliKelas = [
                            1 => 'bg-[#f0c740] fill-[#644d01]',
                            2 => 'bg-[#c1c9c2] fill-[#585858]',
                            3 => 'bg-[#cd7f32] fill-[#663b10]',
                        ];
                    @endphp

                    @foreach ($peringkat as $skor)
                        @php
                            $peringkatGlobalItem = $peringkatGlobal->firstWhere('id', $skor->id);
                            $isMedali = $peringkatGlobalItem ? $peringkatGlobalItem->global_rank <= 3 : false;
                            $rankingKelas = $isMedali
                                ? $medaliKelas[$peringkatGlobalItem->global_rank]
                                : 'bg-slate-200 fill-black';
                        @endphp

                        <tr class="even:bg-slate-400 font-medium border-b border-slate-400">
                            <td class="p-2 text-center">{{ $skor->siswa->nisn }}</td>
                            <td class="p-2 flex flex-col">
                                <p class="text-xl">{{ $skor->siswa->nama_lengkap }}</p>
                                <small class="text-xs opacity-75">
                                    {{ $skor->presensi->where('status', 'Hadir')->count() + $skor->presensi->where('status', 'Terlambat')->count() }}
                                    Hadir,
                                    {{ $skor->presensi->where('status', 'Sakit')->count() }} Sakit,
                                    {{ $skor->presensi->where('status', 'Izin')->count() }} Izin,
                                    {{ $skor->presensi->where('status', 'Alpha')->count() }} Absen
                                </small>
                            </td>
                            <td class="p-2 text-center">{{ $skor->skor }}</td>
                            <td class="p-2 text-center">{{ $skor->siswa->kelas->nama_kelas }}</td>
                            <td class="p-2 text-center {{ $rankingKelas }}">
                                @if ($isMedali)
                                    <box-icon class="size-8" type='solid' name='medal'></box-icon>
                                @else
                                    #{{ $peringkatGlobalItem->global_rank ?? '' }}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="bg-slate-200 p-2 md:p-4 rounded-md my-4 mb-0">
        <x-pagination-items :paginator="$peringkat" route="{{ route('admin.peringkat') }}" />
    </div>
</x-layouts.admin>
