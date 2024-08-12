@extends(Auth::guard('admin')->check() ? 'layouts.admin' : 'layouts.siswa', ['title' => 'Tidak dapat diakses'])

@section('body')
    <div class="flex items-center justify-center text-4xl h-full w-full">
        <h1 class="font-[Poppins]">
            {{ $exception }}
        </h1>
    </div>
@endsection
