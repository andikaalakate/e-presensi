@extends('layouts.admin')

@section('body')
    <h1 class="text-3xl text-center mt-6">
        Presensi {{ $status }}
    </h1>
    <div class="mx-auto mt-6 justify-center flex">
        <div class="p-4 border-2 border-black rounded-lg">
            {{ QrCode::size(512)->generate(auth()->user()->nisn) }}
        </div>
    </div>
@endsection