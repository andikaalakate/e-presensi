<ul class="flex items-center space-x-2 text-gray-600">
    @foreach($breadcrumbs as $breadcrumb)
        @if(!$loop->last)
            <li>
                <Link href="{{ $breadcrumb['url'] }}" class="hover:text-blue-600">{{ $breadcrumb['label'] }}</Link>
                <span>/</span>
            </li>
        @else
            <li class="text-gray-800 font-semibold">{{ $breadcrumb['label'] }}</li>
        @endif
    @endforeach
</ul>
