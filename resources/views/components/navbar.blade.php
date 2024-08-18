<nav @click.outside="navigation.isOpen = false" class="py-2 px-4 flex items-center justify-between">
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
    <h1 class="text-2xl font-[Oswald] text-gray-600 uppercase">e-Presensi</h1>
</nav>

{{-- Aside --}}
@if (auth()->guard('admin')->check())
    <x-admin-sidebar />
@elseif (auth()->guard('siswa')->check())
    <x-siswa-sidebar />
@endif
