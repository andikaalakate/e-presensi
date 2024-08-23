{{-- siswa-sidebar.blade.php --}}
<aside :class="{ 'left-[15px] max-[768px]:left-[10px] border-r border-r-white': navigation.isOpen, '-left-full': !navigation.isOpen }"
    class="fixed z-10 w-80 h-[calc(100vh-84px)] bg-[#005A8D] rounded-lg bottom-[15px] font-[Oswald] duration-500 ease-in-out text-white py-8 uppercase max-[768px]:h-[calc(100vh-74px)] max-[768px]:bottom-[10px] max-[768px]:w-[calc(100%-20px)]">
    <Link href="{{ route('siswa.dashboard') }}" class="fill-white flex items-center gap-2 p-2 text-3xl">
    <box-icon name='dashboard' type='solid'></box-icon>Dashboard
    </Link>
    <ul class="h-[calc(100%-86px)]">
        <li>
            <Link href="{{ route('siswa.presensi') }}"
                class="{{ request()->is('siswa/presensi*') ? 'bg-[#083f5a]' : '' }} hover:bg-[#083f5a] duration-300 gap-2 p-2 text-2xl fill-white flex items-center">
            <box-icon name='calendar-check' type='solid'></box-icon>Presensi</Link>
        </li>
        <li>
            <Link href="{{ route('siswa.peringkat') }}"
                class="{{ request()->is('siswa/peringkat*') ? 'bg-[#083f5a]' : '' }} hover:bg-[#083f5a] duration-300 gap-2 p-2 text-2xl fill-white flex items-center">
            <box-icon name='trophy' type='solid'></box-icon>Peringkat</Link>
        </li>
        <li>
            <Link href="{{ route('siswa.profil') }}"
                class="{{ request()->is('siswa/profil*') ? 'bg-[#083f5a]' : '' }} hover:bg-[#083f5a] duration-300 gap-2 p-2 text-2xl fill-white flex items-center">
            <box-icon name='user-circle' type='solid'></box-icon>Profil</Link>
        </li>
        <li>
            <Link href="{{ route('siswa.tentang') }}"
                class="{{ request()->is('siswa/tentang*') ? 'bg-[#083f5a]' : '' }} hover:bg-[#083f5a] duration-300 gap-2 p-2 text-2xl fill-white flex items-center">
            <box-icon name='info-circle' type='solid'></box-icon>Tentang</Link>
        </li>
    </ul>
    <ul>
        <li>
            <x-splade-form action="{{ route('siswa.logout') }}" method="post" confirm="Keluar?"
                confirm-text="Apa kamu yakin?" confirm-button="Ya, aku ingin keluar dari akunku!" cancel-button="Tidak">
                @method('POST')
                @csrf
                <button type="submit" class="gap-2 p-2 text-2xl fill-white flex items-center  w-full">
                    <box-icon name='exit' type='solid'></box-icon>KELUAR
                </button>
            </x-splade-form>
        </li>
    </ul>
</aside>
