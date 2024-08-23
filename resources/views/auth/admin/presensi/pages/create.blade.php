<x-layouts.admin>
    @seoTitle('Admin - Buat Presensi')
    <x-slot:title>
        {{ isset($title) ? $title : '' }}
    </x-slot:title>

    <x-splade-form action="{{ route('admin.presensi.store') }}" method="POST" class="flex flex-col gap-3">
        @method('POST')
        @csrf

        <!-- Vue Component -->
        <Presensi :form="form" />
    </x-splade-form>
</x-layouts.admin>
