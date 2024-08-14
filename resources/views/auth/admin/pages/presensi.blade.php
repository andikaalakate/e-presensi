@extends('layouts.admin')

@section('body')
    <x-splade-form action="{{ route('admin.presensi.store') }}" method="POST" class="flex flex-col gap-3">
        @method('POST')
        @csrf
        
        <div>
            <label for="nisn" class="block text-sm font-medium text-gray-700">NISN</label>
            <x-splade-input type="text" id="nisn" name="nisn" autofocus
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
        </div>

        <!-- Vue Component -->
        <Presensi />

        <!-- Submit Button -->
        <x-splade-submit
            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" value="Submit" />
    </x-splade-form>
@endsection
