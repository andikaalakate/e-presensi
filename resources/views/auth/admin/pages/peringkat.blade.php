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
                        <th class="p-2">Nama</th>
                        <th class="p-2 w-24">Kelas</th>
                        <th class="p-2 w-36">Urutan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="even:bg-slate-400 font-medium border-b border-slate-400">
                        <td class="p-2 flex flex-col ">
                            <p class="text-xl">M. Gilang Chandrawinata</p>
                            <small class="text-xs opacity-75">365 Hadir, 0 Sakit, 0 Izin, 0 Absen</small>
                        </td>
                        <td class="p-2 text-center">XII RPL</td>
                        <td class="p-2 text-center bg-[#f0c740] fill-[#644d01] "><box-icon class=" size-8"
                                type='solid' name='medal'></box-icon></td>
                    </tr>
                    <tr class="even:bg-slate-400 font-medium border-b border-slate-400">
                        <td class="p-2 flex flex-col border-r border-slate-300">
                            <p class="text-xl">Andika Pratama</p>
                            <small class="text-xs opacity-75">365 Hadir, 0 Sakit, 0 Izin, 0 Absen</small>
                        </td>
                        <td class="p-2 text-center">XII RPL</td>
                        <td class="p-2 text-center bg-[#c1c9c2] fill-[#585858] border-l border-slate-300"><box-icon
                                class=" size-8" type='solid' name='medal'></box-icon></td>
                    </tr>
                    <tr class="even:bg-slate-400 font-medium border-b border-slate-400">
                        <td class="p-2 flex flex-col ">
                            <p class="text-xl">Khalis Tofari</p>
                            <small class="text-xs opacity-75">365 Hadir, 0 Sakit, 0 Izin, 0 Absen</small>
                        </td>
                        <td class="p-2 text-center">XII RPL</td>
                        <td class="p-2 text-center bg-[#cd7f32] fill-[#663b10] "><box-icon class=" size-8"
                                type='solid' name='medal'></box-icon></td>
                    </tr>
                    <tr class="even:bg-slate-400 font-medium border-b border-slate-400">
                        <td class="p-2 flex flex-col border-r border-slate-300">
                            <p class="text-xl">Atikah Lubis</p>
                            <small class="text-xs opacity-75">365 Hadir, 0 Sakit, 0 Izin, 0 Absen</small>
                        </td>
                        <td class="p-2 text-center">XII RPL</td>
                        <td class="p-2 text-center border-l border-slate-300">#<span class="text-3xl">4</span></td>
                    </tr>
                    <tr class="even:bg-slate-400 font-medium border-b border-slate-400">
                        <td class="p-2 flex flex-col border-r border-slate-300">
                            <p class="text-xl">Davin Adriano</p>
                            <small class="text-xs opacity-75">365 Hadir, 0 Sakit, 0 Izin, 0 Absen</small>
                        </td>
                        <td class="p-2 text-center">XII RPL</td>
                        <td class="p-2 text-center border-l border-slate-300">#<span class="text-3xl">5</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="bg-slate-200 p-2 md:p-4 rounded-md my-4 mb-0">
        <x-pagination-items :paginator="$peringkat" route="{{ route('admin.peringkat') }}" />
    </div>
</x-layouts.admin>
