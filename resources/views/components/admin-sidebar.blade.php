{{-- admin-sidebar.blade.php --}}
<aside :class="{ 'left-[15px] max-[768px]:left-[10px] border-r border-r-white': navigation.isOpen, '-left-full': !navigation.isOpen }"
    class="fixed z-10 w-80 h-[calc(100vh-84px)] bg-[#005A8D] rounded-lg bottom-[15px] font-[Oswald] duration-500 ease-in-out text-white py-8 uppercase max-[768px]:h-[calc(100vh-74px)] max-[768px]:bottom-[10px] max-[768px]:w-[calc(100%-20px)]">
    <Link href="{{ route('admin.dashboard') }}" class="fill-white flex items-center gap-2 p-2 text-3xl">
    <box-icon name='dashboard' type='solid'></box-icon>Dashboard
    </Link>
    <ul class="h-[calc(100%-86px)]">
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
        <li>
            <Link href="{{ route('admin.presensi') }}"
                class="{{ request()->is('admin/presensi*') ? 'bg-[#083f5a]' : '' }} hover:bg-[#083f5a] duration-300 gap-2 p-2 text-2xl fill-white flex items-center">
            <box-icon name='calendar-check' type='solid'></box-icon>Presensi</Link>
        </li>
        <li>
            <Link href="{{ route('admin.peringkat') }}"
                class="{{ request()->is('admin/peringkat*') ? 'bg-[#083f5a]' : '' }} hover:bg-[#083f5a] duration-300 gap-2 p-2 text-2xl fill-white flex items-center">
            <box-icon name='trophy' type='solid'></box-icon>Peringkat</Link>
        </li>
        <li>
            <Link href="{{ route('admin.profil') }}"
                class="{{ request()->is('admin/profil*') ? 'bg-[#083f5a]' : '' }} hover:bg-[#083f5a] duration-300 gap-2 p-2 text-2xl fill-white flex items-center">
            <box-icon name='user-circle' type='solid'></box-icon>Profil</Link>
        </li>
        <li>
            <Link href="{{ route('admin.tentang') }}"
                class="{{ request()->is('admin/tentang*') ? 'bg-[#083f5a]' : '' }} hover:bg-[#083f5a] duration-300 gap-2 p-2 text-2xl fill-white flex items-center">
            <box-icon name='info-circle' type='solid'></box-icon>Tentang</Link>
        </li>
    </ul>
</aside>
