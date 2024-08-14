<div class="bg-slate-200 p-2 md:p-4 rounded-md my-4">
    <div class="border border-slate-300 rounded-md overflow-auto">
        <table class="w-full bg-slate-300">
            @foreach ($fields as $field)
                <tr class="odd:bg-slate-400">
                    <td class="font-semibold p-2 w-40">{{ $field['title'] }}</td>
                    <td class="p-2">:</td>
                    <td class="p-2">{{ $field['data'] }}</td>
                </tr>
            @endforeach
            @if (isset($actions))
                <tr class="odd:bg-slate-400">
                    <td class="font-semibold p-2 w-40">Action</td>
                    <td class="p-2">:</td>
                    <td class="p-2" class="flex justify-start gap-4">
                        <Link href="{{ $actions['edit']['url'] }}" class="bg-[#788d00] text-white py-1 px-3 rounded-sm">
                            {{ $actions['edit']['label'] }}
                        </Link>
                        <form action="{{ $actions['delete']['url'] }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-[#8d0500] text-white py-1 px-3 rounded-sm">
                                {{ $actions['delete']['label'] }}
                            </button>
                        </form>
                    </td>
                </tr>
            @endif
        </table>
    </div>
</div>
