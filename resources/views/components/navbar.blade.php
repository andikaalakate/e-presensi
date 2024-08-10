<nav @click.outside="isOpen = false" class="py-2 px-4 flex items-center justify-between">
    <div @click.stop="isOpen = !isOpen"
        class="size-[50px] bg-[#005A8D] flex items-center justify-center rounded-lg cursor-pointer">
        <box-icon name='menu' class="fill-white size-8"></box-icon>
    </div>
    <h1 class="text-2xl font-[Oswald] text-gray-600 uppercase">e-Presensi</h1>
</nav>
{{-- Aside --}}
<aside :class="{ 'left-[15px] max-[768px]:left-[10px]': isOpen, '-left-full': !isOpen }"
    class="fixed w-80 h-[calc(100vh-84px)] bg-[#005A8D] rounded-lg bottom-[15px] font-[Oswald] duration-500 ease-in-out text-white py-8 uppercase max-[768px]:h-[calc(100vh-74px)] max-[768px]:bottom-[10px] max-[768px]:w-[calc(100%-20px)]">
    <a href="{{ route('admin.dashboard') }}" class="fill-white flex items-center gap-2 p-2 text-3xl"><box-icon
            name='dashboard' type='solid'></box-icon>Dashboard</a>
    <ul class="h-[calc(100%-86px)]">
        <li><a href="{{ route('admin.siswa') }}"
                class="{{ request()->routeIs('admin.siswa') ? 'bg-[#083f5a]' : '' }} gap-2 p-2 text-2xl fill-white flex items-center"><box-icon
                    name='group' type='solid'></box-icon>Siswa</a></li>
        <li><a href="{{ route('admin.jurusan') }}"
                class="{{ request()->routeIs('admin.jurusan') ? 'bg-[#083f5a]' : '' }} gap-2 p-2 text-2xl fill-white flex items-center"><box-icon
                    name='category' type='solid'></box-icon>Jurusan</a></li>
        <li><a href="{{ route('admin.kelas') }}"
                class="{{ request()->routeIs('admin.kelas') ? 'bg-[#083f5a]' : '' }} gap-2 p-2 text-2xl fill-white flex items-center"><box-icon
                    name='chalkboard' type='solid'></box-icon>Kelas</a></li>
        <li><a href="{{ route('admin.pengguna') }}"
                class="{{ request()->routeIs('admin.pengguna') ? 'bg-[#083f5a]' : '' }} gap-2 p-2 text-2xl fill-white flex items-center"><box-icon
                    type='solid' name='user-rectangle'></box-icon>Pengguna</a></li>
        <li><a href="{{ route('admin.peringkat') }}"
                class="{{ request()->routeIs('admin.peringkat') ? 'bg-[#083f5a]' : '' }} gap-2 p-2 text-2xl fill-white flex items-center"><box-icon
                    name='trophy' type='solid'></box-icon>Peringkat</a></li>
        <li><a href="{{ route('admin.laporan') }}"
                class="{{ request()->routeIs('admin.laporan') ? 'bg-[#083f5a]' : '' }} gap-2 p-2 text-2xl fill-white flex items-center"><box-icon
                    name='stats'></box-icon>Laporan</a></li>
    </ul>
    <ul>
        <li>
            <form action="{{ route('admin.logout') }}" method="post">
                @method('POST')
                @csrf
                <button class="gap-2 p-2 text-2xl fill-white flex items-center">
                    <box-icon name='exit'type='solid'></box-icon>
                    Keluar
                </button>
            </form>
        </li>
    </ul>
</aside>
