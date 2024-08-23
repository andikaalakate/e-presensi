<tbody>
    @foreach ($fields as $field)
        <tr class="even:bg-slate-400 font-medium border-b border-slate-400">
            <td class="text-center p-2 border-r border-slate-300">{{ $field['data'] }}</td>
            <td class="p-2 flex justify-center gap-4 border-l border-slate-300">
                <Link href="{{ route('admin.pengguna.edit', $pengguna->id) }}"
                    class="bg-[#788d00] text-white py-1 px-3 rounded-sm">
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
