<x-layouts.admin :breadcrumbs="$breadcrumbs">
    @seoTitle('Admin - Tambah Jurusan')
    <x-slot:title>
        {{ isset($title) ? $title : '' }}
    </x-slot:title>
</x-layouts.admin>