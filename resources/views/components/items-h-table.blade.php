    <tr class="even:bg-slate-400 font-medium border-b border-slate-400">
        @foreach ($fields as $field)
            <td class="text-center p-2 border-r border-slate-300">{{ $field['data'] }}</td>
        @endforeach

        <td class="p-2 flex justify-center gap-4 border-l border-slate-300">
            <Link href="{{ $actions['edit']['url'] }}" class="bg-[#788d00] text-white py-1 px-3 rounded-sm">
            {{ $actions['edit']['label'] }}
            </Link>
            <x-splade-form action="{{ $actions['delete']['url'] }}" method="DELETE" confirm="Hapus Data"
                confirm-text="Apakah kamu yakin akan menghapusnya?" confirm-button="Ya, aku ingin menghapusnya!"
                cancel-button="Tidak">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-[#8d0500] text-white py-1 px-3 rounded-sm">
                    {{ $actions['delete']['label'] }}
                </button>
            </x-splade-form>
        </td>
    </tr>
