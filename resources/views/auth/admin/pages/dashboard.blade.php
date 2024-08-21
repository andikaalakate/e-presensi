<x-layouts.admin>
    @seoTitle('Admin - Dashboard')
    <x-slot:title>
        {{ isset($title) ? $title : '' }}
    </x-slot:title>

    <div class="flex rounded-sm gap-4 flex-wrap">
        {{-- @if (auth()->user()->hasRole('superadmin')) --}}
        <Link href="{{ route('admin.siswa') }}"
            class="min-w-52 group rounded-lg flex-grow h-40 bg-[#005A8D] p-5 transition relative duration-300 cursor-pointer hover:translate-y-[3px] hover:shadow-[0_-8px_0px_0px_#2196f3]">
        <div class="absolute left-[10%] top-[50%] translate-y-[-50%]">
            <p class="text-white text-4xl">{{ isset($siswa) ? $siswa : 0 }}</p>
            <p class="text-white text-sm">Siswa</p>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" viewBox="0 0 24 24"
            style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:; enable-background:new 0 0 512 512"
            class="group-hover:opacity-100 absolute right-[10%] top-[50%] translate-y-[-50%] opacity-20 transition group-hover:scale-110 duration-300">
            <path
                d="M16.604 11.048a5.67 5.67 0 0 0 .751-3.44c-.179-1.784-1.175-3.361-2.803-4.44l-1.105 1.666c1.119.742 1.8 1.799 1.918 2.974a3.693 3.693 0 0 1-1.072 2.986l-1.192 1.192 1.618.475C18.951 13.701 19 17.957 19 18h2c0-1.789-.956-5.285-4.396-6.952z">
            </path>
            <path
                d="M9.5 12c2.206 0 4-1.794 4-4s-1.794-4-4-4-4 1.794-4 4 1.794 4 4 4zm0-6c1.103 0 2 .897 2 2s-.897 2-2 2-2-.897-2-2 .897-2 2-2zm1.5 7H8c-3.309 0-6 2.691-6 6v1h2v-1c0-2.206 1.794-4 4-4h3c2.206 0 4 1.794 4 4v1h2v-1c0-3.309-2.691-6-6-6z">
            </path>
        </svg>
        </Link>
        {{-- @endif --}}
        {{-- @if (auth()->user()->hasRole('admin')) --}}
        <Link href="{{ route('admin.jurusan') }}"
            class="min-w-52 group rounded-lg flex-grow h-40 bg-[#005A8D] p-5 transition relative duration-300 cursor-pointer hover:translate-y-[3px] hover:shadow-[0_-8px_0px_0px_#2196f3]">
        <div class="absolute left-[10%] top-[50%] translate-y-[-50%]">
            <p class="text-white text-4xl">{{ isset($jurusan) ? $jurusan : 0 }}</p>
            <p class="text-white text-sm">Jurusan</p>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" viewBox="0 0 24 24"
            style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:; enable-background:new 0 0 512 512"
            class="group-hover:opacity-100 absolute right-[10%] top-[50%] translate-y-[-50%] opacity-20 transition group-hover:scale-110 duration-300">
            <path
                d="M4 11h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1zm10 0h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1zM4 21h6a1 1 0 0 0 1-1v-6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1zm13 0c2.206 0 4-1.794 4-4s-1.794-4-4-4-4 1.794-4 4 1.794 4 4 4z">
            </path>
        </svg>
        </Link>
        {{-- @endif --}}
        <Link href="{{ route('admin.kelas') }}"
            class="min-w-52 group rounded-lg flex-grow h-40 bg-[#005A8D] p-5 transition relative duration-300 cursor-pointer hover:translate-y-[3px] hover:shadow-[0_-8px_0px_0px_#2196f3]">
        <div class="absolute left-[10%] top-[50%] translate-y-[-50%]">
            <p class="text-white text-4xl">{{ isset($kelas) ? $kelas : 0 }}</p>
            <p class="text-white text-sm">Kelas</p>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" viewBox="0 0 24 24"
            style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:; enable-background:new 0 0 512 512"
            class="group-hover:opacity-100 absolute right-[10%] top-[50%] translate-y-[-50%] opacity-20 transition group-hover:scale-110 duration-300">
            <path
                d="M20 4H4c-1.103 0-2 .897-2 2v10c0 1.103.897 2 2 2h4l-1.8 2.4 1.6 1.2 2.7-3.6h3l2.7 3.6 1.6-1.2L16 18h4c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2zM5 13h4v2H5v-2z">
            </path>
        </svg>
        </Link>
        <Link href="{{ route('admin.tahun-ajaran') }}"
            class="min-w-52 group rounded-lg flex-grow h-40 bg-[#005A8D] p-5 transition relative duration-300 cursor-pointer hover:translate-y-[3px] hover:shadow-[0_-8px_0px_0px_#2196f3]">
        <div class="absolute left-[10%] top-[50%] translate-y-[-50%]">
            <p class="text-white text-4xl">{{ isset($tahunAjaran) ? $tahunAjaran : 0 }}</p>
            <p class="text-white text-sm">Tahun Ajaran</p>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" viewBox="0 0 24 24"
            style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:; enable-background:new 0 0 512 512"
            class="group-hover:opacity-100 absolute right-[10%] top-[50%] translate-y-[-50%] opacity-20 transition group-hover:scale-110 duration-300">
            <path
                d="M21 20V6c0-1.103-.897-2-2-2h-2V2h-2v2H9V2H7v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2zM9 18H7v-2h2v2zm0-4H7v-2h2v2zm4 4h-2v-2h2v2zm0-4h-2v-2h2v2zm4 4h-2v-2h2v2zm0-4h-2v-2h2v2zm2-5H5V7h14v2z">
            </path>
        </svg>
        </Link>
    </div>
    <div class="flex gap-4 mt-4 flex-wrap">
        <Link href="{{ route('admin.pengguna') }}"
            class="min-w-52 group rounded-lg flex-grow h-40 bg-[#005A8D] p-5 transition relative duration-300 cursor-pointer hover:translate-y-[3px] hover:shadow-[0_-8px_0px_0px_#2196f3]">
        <div class="absolute left-[10%] top-[50%] translate-y-[-50%]">
            <p class="text-white text-4xl">{{ isset($pengguna) ? $pengguna : 0 }}</p>
            <p class="text-white text-sm">Pengguna</p>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" viewBox="0 0 24 24"
            style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:; enable-background:new 0 0 512 512"
            class="group-hover:opacity-100 absolute right-[10%] top-[50%] translate-y-[-50%] opacity-20 transition group-hover:scale-110 duration-300">
            <path
                d="M6 22h13a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h1zm6-17.001c1.647 0 3 1.351 3 3C15 9.647 13.647 11 12 11S9 9.647 9 7.999c0-1.649 1.353-3 3-3zM6 17.25c0-2.219 2.705-4.5 6-4.5s6 2.281 6 4.5V18H6v-.75z">
            </path>
        </svg>
        </Link>
        <Link href="{{ route('admin.presensi') }}"
            class="min-w-52 group rounded-lg flex-grow h-40 bg-[#005A8D] p-5 transition relative duration-300 cursor-pointer hover:translate-y-[3px] hover:shadow-[0_-8px_0px_0px_#2196f3]">
        <div class="absolute left-[10%] top-[50%] translate-y-[-50%]">
            <p class="text-white text-4xl">{{ isset($presensiHadir) ? $presensiHadir : 0 }}</p>
            <p class="text-white text-sm">Presensi</p>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" viewBox="0 0 24 24"
            style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:; enable-background:new 0 0 512 512"
            class="group-hover:opacity-100 absolute right-[10%] top-[50%] translate-y-[-50%] opacity-20 transition group-hover:scale-110 duration-300">
            <path
                d="M5 22h14c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2h-2V2h-2v2H9V2H7v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2zm6-3.586-3.707-3.707 1.414-1.414L11 15.586l4.293-4.293 1.414 1.414L11 18.414zM5 7h14v2H5V7z">
            </path>
        </svg>
        </Link>
    </div>
    <div class="flex gap-4 mt-4 flex-wrap">
        <Link href="{{ route('admin.presensi') }}"
            class="min-w-52 group rounded-lg flex-grow h-40 bg-[#005A8D] p-5 transition relative duration-300 cursor-pointer hover:translate-y-[3px] hover:shadow-[0_-8px_0px_0px_#2196f3]">
        <div class="absolute left-[10%] top-[50%] translate-y-[-50%]">
            <p class="text-white text-4xl">{{ isset($presensiSakit) ? $presensiSakit : 0 }}</p>
            <p class="text-white text-sm">Sakit</p>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" viewBox="0 0 24 24"
            style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:; enable-background:new 0 0 512 512"
            class="group-hover:opacity-100 absolute right-[10%] top-[50%] translate-y-[-50%] opacity-20 transition group-hover:scale-110 duration-300">
            <path
                d="M19.649 5.286 14 8.548V2.025h-4v6.523L4.351 5.286l-2 3.465 5.648 3.261-5.648 3.261 2 3.465L10 15.477V22h4v-6.523l5.649 3.261 2-3.465-5.648-3.261 5.648-3.261z">
            </path>
        </svg>
        </Link>
        <Link href="{{ route('admin.presensi') }}"
            class="min-w-52 group rounded-lg flex-grow h-40 bg-[#005A8D] p-5 transition relative duration-300 cursor-pointer hover:translate-y-[3px] hover:shadow-[0_-8px_0px_0px_#2196f3]">
        <div class="absolute left-[10%] top-[50%] translate-y-[-50%]">
            <p class="text-white text-4xl">{{ isset($presensiAbsen) ? $presensiAbsen : 0 }}</p>
            <p class="text-white text-sm">Alfa</p>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" viewBox="0 0 24 24"
            style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:; enable-background:new 0 0 512 512"
            class="group-hover:opacity-100 absolute right-[10%] top-[50%] translate-y-[-50%] opacity-20 transition group-hover:scale-110 duration-300">
            <circle cx="17" cy="4" r="2"></circle>
            <path
                d="M15.777 10.969a2.007 2.007 0 0 0 2.148.83l3.316-.829-.483-1.94-3.316.829-1.379-2.067a2.01 2.01 0 0 0-1.272-.854l-3.846-.77a1.998 1.998 0 0 0-2.181 1.067l-1.658 3.316 1.789.895 1.658-3.317 1.967.394L7.434 17H3v2h4.434c.698 0 1.355-.372 1.715-.971l1.918-3.196 5.169 1.034 1.816 5.449 1.896-.633-1.815-5.448a2.007 2.007 0 0 0-1.506-1.33l-3.039-.607 1.772-2.954.417.625z">
            </path>
        </svg>
        </Link>
        <Link href="{{ route('admin.presensi') }}"
            class="min-w-52 group rounded-lg flex-grow h-40 bg-[#005A8D] p-5 transition relative duration-300 cursor-pointer hover:translate-y-[3px] hover:shadow-[0_-8px_0px_0px_#2196f3]">
        <div class="absolute left-[10%] top-[50%] translate-y-[-50%]">
            <p class="text-white text-4xl">{{ isset($presensiIzin) ? $presensiIzin : 0 }}</p>
            <p class="text-white text-sm">Izin</p>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" viewBox="0 0 24 24"
            style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:; enable-background:new 0 0 512 512"
            class="group-hover:opacity-100 absolute right-[10%] top-[50%] translate-y-[-50%] opacity-20 transition group-hover:scale-110 duration-300">
            <path
                d="M23 7a8.44 8.44 0 0 0-5 1.31c-.36-.41-.73-.82-1.12-1.21l-.29-.27.14-.12a3.15 3.15 0 0 0 .9-3.49A3.9 3.9 0 0 0 14 1v2a2 2 0 0 1 1.76 1c.17.4 0 .84-.47 1.31l-.23.21a16.71 16.71 0 0 0-3.41-2.2c-2.53-1.14-3.83-.61-4.47 0a2.18 2.18 0 0 0-.46.68l-.18.53L5.1 8.87C6.24 11.71 9 16.76 15 18.94l5-1.66a1 1 0 0 0 .43-.31l.21-.18c1.43-1.44.51-4.21-1.41-6.9A6.63 6.63 0 0 1 23 9zm-3.79 8.37h-.06c-.69.37-3.55-.57-6.79-3.81-.34-.34-.66-.67-.95-1-.1-.11-.19-.23-.29-.35l-.53-.64-.28-.39c-.14-.19-.28-.38-.4-.56s-.16-.26-.24-.39-.22-.34-.31-.51-.13-.24-.19-.37-.17-.28-.23-.42-.09-.23-.14-.34-.11-.27-.15-.4S8.6 6 8.58 5.9s-.06-.24-.08-.34a2 2 0 0 1 0-.24 1.15 1.15 0 0 1 0-.26l.11-.31c.17-.18.91-.23 2.23.37a13.83 13.83 0 0 1 2.49 1.54A4.17 4.17 0 0 1 12 7v2a6.43 6.43 0 0 0 3-.94l.49.46c.44.43.83.86 1.19 1.27A5.31 5.31 0 0 0 16 13.2l2-.39a3.23 3.23 0 0 1 0-1.14c1.29 1.97 1.53 3.39 1.21 3.7zM4.4 11l-2.23 6.7A3.28 3.28 0 0 0 5.28 22a3.21 3.21 0 0 0 1-.17l6.52-2.17A18.7 18.7 0 0 1 4.4 11z">
            </path>
        </svg>
        </Link>
    </div>
</x-layouts.admin>
