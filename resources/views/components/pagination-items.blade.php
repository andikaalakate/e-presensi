@props(['paginator', 'route'])

<ul class="flex items-center justify-center gap-4">
    {{-- Tombol pertama dan sebelumnya --}}
    @if ($paginator->onFirstPage())
        <li class="hidden cursor-not-allowed">
            <Link href="#"><box-icon name='arrow-to-left'></box-icon></Link>
        </li>
        <li class="hidden cursor-not-allowed">
            <Link href="#"><box-icon name='left-arrow-alt'></box-icon></Link>
        </li>
    @else
        <li>
            @php
                $query = array_merge(request()->query(), ['page' => 1]);
                $url = $route . '?' . http_build_query($query);
            @endphp
            <Link href="{{ $url }}"><box-icon name='arrow-to-left'></box-icon></Link>
        </li>
        <li>
            @php
                $query = array_merge(request()->query(), ['page' => $paginator->currentPage() - 1]);
                $url = $route . '?' . http_build_query($query);
            @endphp
            <Link href="{{ $url }}"><box-icon name='left-arrow-alt'></box-icon></Link>
        </li>
    @endif

    {{-- Nomor halaman --}}
    @php
        $start = max($paginator->currentPage() - 1, 1);
        $end = min($paginator->currentPage() + 1, $paginator->lastPage());

        if ($end - $start < 2) {
            $start = max($end - 2, 1);
            $end = min($start + 2, $paginator->lastPage());
        }
    @endphp

    @for ($page = $start; $page <= $end; $page++)
        @if ($page == $paginator->currentPage())
            <li>
                @php
                    $query = array_merge(request()->query(), ['page' => $page]);
                    $url = $route . '?' . http_build_query($query);
                @endphp
                <Link href="{{ $url }}" class="rounded-full border border-slate-400 flex items-center justify-center size-8 bg-slate-400">
                    {{ $page }}
                </Link>
            </li>
        @else
            <li>
                @php
                    $query = array_merge(request()->query(), ['page' => $page]);
                    $url = $route . '?' . http_build_query($query);
                @endphp
                <Link href="{{ $url }}" class="rounded-full flex items-center justify-center size-8">
                    {{ $page }}
                </Link>
            </li>
        @endif
    @endfor

    {{-- Tombol berikutnya dan terakhir --}}
    @if ($paginator->hasMorePages())
        <li>
            @php
                $query = array_merge(request()->query(), ['page' => $paginator->currentPage() + 1]);
                $url = $route . '?' . http_build_query($query);
            @endphp
            <Link href="{{ $url }}"><box-icon name='right-arrow-alt'></box-icon></Link>
        </li>
        <li>
            @php
                $query = array_merge(request()->query(), ['page' => $paginator->lastPage()]);
                $url = $route . '?' . http_build_query($query);
            @endphp
            <Link href="{{ $url }}"><box-icon name='arrow-to-right'></box-icon></Link>
        </li>
    @else
        <li class="hidden cursor-not-allowed">
            <Link href="#"><box-icon name='right-arrow-alt'></box-icon></Link>
        </li>
        <li class="hidden cursor-not-allowed">
            <Link href="#"><box-icon name='arrow-to-right'></box-icon></Link>
        </li>
    @endif
</ul>
