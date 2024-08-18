<x-layouts.admin>
    @seoTitle('Admin - Laporan')
    <x-slot:title>
        {{ isset($title) ? $title : '' }}
    </x-slot:title>
</x-layouts.admin>