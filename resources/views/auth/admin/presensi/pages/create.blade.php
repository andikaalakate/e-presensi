<x-layouts.admin>
    @seoTitle('Admin - Buat Presensi')
    <x-slot:title>
        {{ isset($title) ? $title : '' }}
    </x-slot:title>

    <x-splade-form action="{{ route('admin.presensi.store') }}" method="POST" class="flex flex-col gap-3">
        @method('POST')
        @csrf

        <!-- Vue Component -->
        <Presensi :form="form" />
    </x-splade-form>

    <div class="bg-slate-200 p-2 md:p-4 rounded-md my-4 ">
        <div class="flex justify-between mb-4 items-center flex-wrap gap-2">
            <h1 class="font-semibold text-xl">Daftar Hadir</h1>
            <div class="flex gap-2">
                <Link class="items-center gap-2 flex bg-[#083f5a] p-2 rounded-md fill-white text-white"
                    href="{{ route('admin.pengguna.export') }}"><box-icon name='download'></box-icon> Export
                Laporan</Link>
            </div>
        </div>
        <div class="rounded-md overflow-auto bg-slate-300">
            <table class="w-full bg-salte-300">
                <thead class="bg-[#083f5a] text-white border-y border-slate-400">
                    <tr>
                        <th class="p-2">NISN</th>
                        <th class="p-2">Nama</th>
                        <th class="p-2">Kelas</th>
                        <th class="p-2">Status</th>
                        <th class="p-2">Skor</th>
                        <th class="p-2">Jam Masuk</th>
                        <th class="p-2">Jam Pulang</th>
                    </tr>
                </thead>
                <tbody>
                    <x-splade-lazy>
                        <x-slot:placeholder>
                            <tr>
                                <td class="text-center p-8" colspan="8">
                                    Sedang memuat list Presensi...
                                </td>
                            </tr>
                        </x-slot:placeholder>
                        @if ($presensis->count())
                            @foreach ($presensis as $presensi)
                                <tr class="even:bg-slate-400 font-medium border-b border-slate-400">
                                    <td class="text-center p-2 border-r border-slate-300">{{ $presensi->siswa->nisn }}
                                    </td>
                                    <td class="text-center p-2 border-r border-slate-300">
                                        {{ $presensi->siswa->nama_lengkap }}
                                    </td>
                                    <td class="text-center p-2 border-r border-slate-300">
                                        {{ $presensi->siswa->kelas->nama_kelas }}</td>
                                    <td class="text-center p-2 border-r border-slate-300">{{ $presensi->status }}</td>
                                    @php
                                        switch ($presensi->status) {
                                            case 'Hadir':
                                                $skor = 3;
                                                break;
                                            case 'Terlambat':
                                                $skor = 2;
                                                break;
                                            case 'Sakit':
                                            case 'Izin':
                                                $skor = 1;
                                                break;
                                            case 'Alpha':
                                                $skor = -1;
                                                break;
                                            default:
                                                $skor = 0;
                                        }
                                    @endphp
                                    <td class="text-center p-2 border-r border-slate-300">{{ $skor }}</td>
                                    <td class="text-center p-2 border-r border-slate-300">{{ $presensi->jam_masuk }}
                                    </td>
                                    <td class="text-center p-2 border-r border-slate-300">
                                        {{ isset($presensi->jam_pulang) ? $presensi->jam_pulang : 'Belum Pulang' }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="text-center p-8" colspan="7">
                                    Tidak ada hasil yang ditemukan.
                                </td>
                            </tr>
                        @endif
                    </x-splade-lazy>
                </tbody>
            </table>
        </div>
    </div>
    @if ($presensis->hasPages())
        <div class="bg-slate-200 p-2 md:p-4 rounded-md my-4 mb-0">
            <x-pagination-items :paginator="$presensis" route="{{ route('admin.presensi') }}" />
        </div>
    @endif
</x-layouts.admin>
