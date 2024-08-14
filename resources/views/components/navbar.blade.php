<nav @click.outside="navigation.isOpen = false" class="py-2 px-4 flex items-center justify-between">
    <div @click.stop="navigation.isOpen = !navigation.isOpen"
        class="size-[50px] bg-[#005A8D] flex items-center justify-center rounded-lg cursor-pointer">
        <box-icon name='menu' class="fill-white size-8"></box-icon>
    </div>
    <h1 class="text-2xl font-[Oswald] text-gray-600 uppercase">e-Presensi</h1>
</nav>

{{-- Aside --}}
<aside v-bind:class="{'left-[15px] max-[768px]:left-[10px]': navigation.isOpen, '-left-full': ! navigation.isOpen }"
    class="fixed z-10 w-80 h-[calc(100vh-84px)] bg-[#005A8D] rounded-lg bottom-[15px] font-[Oswald] duration-500 ease-in-out text-white py-8 uppercase max-[768px]:h-[calc(100vh-74px)] max-[768px]:bottom-[10px] max-[768px]:w-[calc(100%-20px)]">
    @if (auth()->guard('admin')->check())
        <Link href="{{ route('admin.dashboard') }}" class="fill-white flex items-center gap-2 p-2 text-3xl">
        <box-icon name='dashboard' type='solid'></box-icon>Dashboard
        </Link>
    @elseif (auth()->guard('siswa')->check())
        <Link href="{{ route('siswa.dashboard') }}" class="fill-white flex items-center gap-2 p-2 text-3xl">
        <box-icon name='dashboard' type='solid'></box-icon>Dashboard
        </Link>
    @endif
    <ul class="h-[calc(100%-86px)]">
        @auth('admin')
            <li>
                <Link href="{{ route('admin.siswa') }}"
                    class="{{ request()->is('admin/siswa*') ? 'bg-[#083f5a]' : '' }} hover:bg-[#083f5a] duration-300 gap-2 p-2 text-2xl fill-white flex items-center">
                <box-icon name='group' type='solid'></box-icon>Siswa</Link>
            </li>
            @if (auth()->user()->hasRole('admin|superadmin|kepala_sekolah'))
                <li>
                    <Link href="{{ route('admin.jurusan') }}"
                        class="{{ request()->is('admin/jurusan*') ? 'bg-[#083f5a]' : '' }} hover:bg-[#083f5a] duration-300 gap-2 p-2 text-2xl fill-white flex items-center">
                    <box-icon name='category' type='solid'></box-icon>Jurusan</Link>
                </li>
                <li>
                    <Link href="{{ route('admin.kelas') }}"
                        class="{{ request()->is('admin/kelas*') ? 'bg-[#083f5a]' : '' }} hover:bg-[#083f5a] duration-300 gap-2 p-2 text-2xl fill-white flex items-center">
                    <box-icon name='chalkboard' type='solid'></box-icon>Kelas</Link>
                </li>
                <li>
                    <Link href="{{ route('admin.tahun-ajaran') }}"
                        class="{{ request()->is('admin/tahun-ajaran*') ? 'bg-[#083f5a]' : '' }} hover:bg-[#083f5a] duration-300 gap-2 p-2 text-2xl fill-white flex items-center">
                    <box-icon name='calendar' type='solid'></box-icon>Tahun Ajaran</Link>
                </li>
                <li>
                    <Link href="{{ route('admin.pengguna') }}"
                        class="{{ request()->is('admin/pengguna*') ? 'bg-[#083f5a]' : '' }} hover:bg-[#083f5a] duration-300 gap-2 p-2 text-2xl fill-white flex items-center">
                    <box-icon type='solid' name='user-rectangle'></box-icon>Pengguna</Link>
                </li>
                <li>
                    <Link href="{{ route('admin.laporan') }}"
                        class="{{ request()->is('admin/laporan*') ? 'bg-[#083f5a]' : '' }} hover:bg-[#083f5a] duration-300 gap-2 p-2 text-2xl fill-white flex items-center">
                    <box-icon name='stats'></box-icon>Laporan</Link>
                </li>
            @endif
        @endauth

        <li>
            <Link href="{{ auth()->guard('admin')->check() ? route('admin.presensi') : route('siswa.presensi') }}"
                class="{{ request()->is(auth()->guard('admin')->check() ? 'admin/presensi*' : 'siswa/presensi*') ? 'bg-[#083f5a]' : '' }} hover:bg-[#083f5a] duration-300 gap-2 p-2 text-2xl fill-white flex items-center">
            <box-icon name='calendar-check' type='solid'></box-icon>Presensi</Link>
        </li>
        <li>
            <Link href="{{ auth()->guard('admin')->check() ? route('admin.peringkat') : route('siswa.peringkat') }}"
                class="{{ request()->is(auth()->guard('admin')->check() ? 'admin/peringkat*' : 'siswa/peringkat*') ? 'bg-[#083f5a]' : '' }} hover:bg-[#083f5a] duration-300 gap-2 p-2 text-2xl fill-white flex items-center">
            <box-icon name='trophy' type='solid'></box-icon>Peringkat</Link>
        </li>
        <li>
            <Link href="{{ auth()->guard('admin')->check() ? route('admin.tentang') : route('siswa.tentang') }}"
                class="{{ request()->is(auth()->guard('admin')->check() ? 'admin/tentang*' : 'siswa/tentang*') ? 'bg-[#083f5a]' : '' }} hover:bg-[#083f5a] duration-300 gap-2 p-2 text-2xl fill-white flex items-center">
            <box-icon name='info-circle' type='solid'></box-icon>Tentang</Link>
        </li>
    </ul>
    <ul>
        <li>
            <form action="{{ auth()->guard('admin')->check() ? route('admin.logout') : route('siswa.logout') }}"
                method="post">
                @method('POST')
                @csrf
                <button class="gap-2 p-2 text-2xl fill-white flex items-center  w-full">
                    <box-icon name='exit' type='solid'></box-icon>KELUAR
                </button>
            </form>
        </li>
    </ul>
</aside>
