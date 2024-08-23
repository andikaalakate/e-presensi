<x-layouts.siswa>
    @seoTitle('Siswa - Dashboard')
    <x-slot:title>
        {{ isset($title) ? $title : '' }}
    </x-slot:title>
    <div class="bg-[#005A8D] p-2 rounded-lg mb-4">
        <div class="flex justify-center p-2">
            <img src="" alt="" class="size-48 rounded-full border border-slate-300 bg-white">
        </div>
        <div class="flex flex-wrap mt-6 gap-2">
            <p class="bg-[#008d3b] min-w-44 flex-grow flex justify-center text-xl font-bold text-white p-2 rounded-md">Datang</p>
            <p class="bg-[#a32b2b] min-w-44 flex-grow flex justify-center text-xl font-bold text-white p-2 rounded-md">Pulang</p>
        </div>
    </div>
    <div class="bg-[#005A8D] p-4 rounded-lg mb-4 text-white">
        <table class="w-full my-4">
            <tr class="border-b border-slate-300 border-opacity-50">
                <td class="p-2 font-bold w-40">NIS</td>
                <td class="p-2 w-10 text-center">:</td>
                <td class="p-2">000000</td>
            </tr>
            <tr class="border-b border-slate-300 border-opacity-50">
                <td class="p-2 font-bold w-40">Nama</td>
                <td class="p-2 w-10 text-center">:</td>
                <td class="p-2">User Unknown</td>
            </tr>
            <tr class="border-b border-slate-300 border-opacity-50">
                <td class="p-2 font-bold w-40">Jenis Kelamin</td>
                <td class="p-2 w-10 text-center">:</td>
                <td class="p-2">Ghost</td>
            </tr>
            <tr class="border-b border-slate-300 border-opacity-50">
                <td class="p-2 font-bold w-40">Kelas</td>
                <td class="p-2 w-10 text-center">:</td>
                <td class="p-2">XII</td>
            </tr>
            <tr class="border-b border-slate-300 border-opacity-50">
                <td class="p-2 font-bold w-40">Jurusan</td>
                <td class="p-2 w-10 text-center">:</td>
                <td class="p-2">Rekayasa Perangkat Lunak</td>
            </tr>
        </table>
    </div>
</x-layouts.siswa>