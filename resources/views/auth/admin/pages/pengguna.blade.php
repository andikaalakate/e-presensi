<x-layouts.admin>
    @seoTitle('Admin - Pengguna')
    <x-slot:title>
        {{ isset($title) ? $title : '' }}
    </x-slot:title>
    <div class="bg-slate-200 p-2 md:p-4 rounded-md">
        <div class="flex items-center justify-between gap-2">
            <x-search-form route="" value="{{ request('search') }}" placeholder="Cari..." />
            <x-action-button class="bg-[#008d3b] fill-white p-1 rounded-sm " route="{{ route('admin.pengguna.create') }}"
                icon="plus" />
        </div>
    </div>
    <div class="bg-slate-200 p-2 md:p-4 rounded-md my-4 ">
        <div class="flex justify-between mb-4 items-center flex-wrap gap-2">
            <h1 class="font-semibold text-xl">Daftar Pengguna</h1>
            <div class="flex gap-2">
                <a class="items-center gap-2 flex bg-[#083f5a] p-2 rounded-md fill-white text-white"
                    href="{{ route('admin.pengguna.export') }}"><box-icon name='download'></box-icon> Export
                    User Data</a>
            </div>
        </div>
        <div class="rounded-md overflow-auto bg-slate-300">
            <table class="w-full bg-salte-300">
                <thead class="bg-[#083f5a] text-white border-y border-slate-400">
                    <tr>
                        <th class="p-2">No</th>
                        <th class="p-2">Nama</th>
                        <th class="p-2">Email</th>
                        <th class="p-2">Role</th>
                        <th class="p-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($penggunas as $index => $pengguna)
                        <tr class="even:bg-slate-400 font-medium border-b border-slate-400">
                            <td class="text-center p-2 border-r border-slate-300">{{ $index + 1 }}</td>
                            <td class="text-center p-2 border-r border-slate-300">{{ $pengguna->nama }}</td>
                            <td class="text-center p-2 border-r border-slate-300">{{ $pengguna->email }}</td>
                            <td class="text-center p-2">
                                @if (!empty($pengguna->getRoleNames()))
                                    @foreach ($pengguna->getRoleNames() as $v)
                                        <label class="border border-[#083f5a] rounded-lg px-2 py-1">{{ $v }}</label>
                                    @endforeach
                                @endif
                            </td>
                            <td class="p-2 flex justify-center gap-4 border-l border-slate-300">
                                <Link href="{{ route('admin.pengguna.edit', $pengguna->id) }}" class="bg-[#788d00] text-white py-1 px-3 rounded-sm">
                                Edit
                                </Link>
                                <form action="{{ route('admin.pengguna.destroy', $pengguna->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-[#8d0500] text-white py-1 px-3 rounded-sm">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="bg-slate-200 p-2 md:p-4 rounded-md my-4 mb-0">
        <x-pagination-items :paginator="$penggunas" route="{{ route('admin.pengguna') }}" />
    </div>
</x-layouts.admin>
