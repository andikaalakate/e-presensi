<nav @click.outside="navigation.isOpen = false, profile.isOpen = false"
    class="py-2 px-4 flex items-center justify-between">
    <div @click.stop="navigation.isOpen = !navigation.isOpen"
        class="size-[50px] bg-[#005A8D] flex items-center justify-center rounded-lg cursor-pointer">
        <x-splade-state>
            <!-- Kondisi untuk menampilkan icon -->
            <template v-if="navigation.isOpen">
                <box-icon name='x' class="fill-white size-8"></box-icon>
            </template>
            <template v-else>
                <box-icon name='menu' class="fill-white size-8"></box-icon>
            </template>
        </x-splade-state>
    </div>
    <div class="flex gap-4 items-center" @click.outside="profile.isOpen = false">
        <h1 class="text-2xl font-[Oswald] text-gray-600 uppercase">e-Presensi</h1>
        <div class="relative">
            <img src="{{ asset('assets/logo-gadak-std.png') }}" alt="Profil"
                class="cursor-pointer flex size-12 rounded-full border-2 border-slate-300 shadow-lg"
                @click.stop="profile.isOpen = !profile.isOpen">
            <x-splade-state>
                <template v-if="profile.isOpen">
                    <div v-show="profile.isOpen = true"
                        class="bg-slate-400 absolute flex flex-col right-0 rounded-lg overflow-hidden gap-[1px] border border-slate-400 shadow-lg z-10">
                        <Link href="{{ route('admin.profil') }}"
                            class="px-4 py-2 flex bg-slate-300 items-center gap-1 text-gray-600 fill-gray-800"><box-icon
                            name='user-circle' type='solid'></box-icon>Profil</Link>
                        <x-splade-form action="{{ route('admin.logout') }}" method="post" confirm="Keluar?"
                            confirm-text="Apa kamu yakin?" confirm-button="Ya, aku ingin keluar dari akunku!"
                            cancel-button="Tidak">
                            @method('POST')
                            @csrf
                            <button type="submit"
                                class="px-4 py-2 flex bg-slate-300 items-center gap-1 text-gray-600 fill-gray-800">
                                <box-icon box-icon name='exit' type='solid'></box-icon>
                                Keluar
                            </button>
                        </x-splade-form>
                    </div>
                </template>
            </x-splade-state>
        </div>
    </div>
</nav>

{{-- Aside --}}
@if (auth()->guard('admin')->check())
    <x-admin-sidebar />
@elseif (auth()->guard('siswa')->check())
    <x-siswa-sidebar />
@endif
