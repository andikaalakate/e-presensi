<x-layouts.admin :breadcrumbs="$breadcrumbs">
    @seoTitle('Admin - Edit Kelas')
    <x-slot:title>
        {{ isset($title) ? $title : '' }}
    </x-slot:title>
</x-layouts.admin>