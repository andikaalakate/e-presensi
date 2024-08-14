@extends('layouts.admin')

@section('body')
    <div class=" flex flex-wrap ">
        <div class="bg-slate-200 p-2 md:p-4 rounded-md my-2 md:my-0 md:mr-2 flex-grow md:max-w-[50%]">
            <h1 class="text-2xl font-semibold uppercase text-center my-2">Apa itu e-Presensi ?</h1>
            <div class="p-2">
                <p class="text-justify">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Itaque corrupti placeat vitae
                    libero modi voluptatum recusandae vel quas repellendus consequuntur laborum mollitia quaerat magnam
                    doloremque a
                    sapiente aspernatur ipsum repellat ratione, ab sint. Ab deserunt in tempora vitae est dolores consequuntur
                    libero eveniet fugiat consequatur. In recusandae fugit neque ipsam facere provident nulla tempora, labore
                    velit
                    ex delectus suscipit adipisci odit harum nemo consequuntur dolorum aperiam dolor aspernatur maiores nobis
                    est
                    quae temporibus! Repellendus sint inventore eius dolorem, debitis delectus libero dolor perferendis modi
                    quaerat
                    perspiciatis temporibus adipisci expedita odio rerum porro ex iusto, assumenda saepe eligendi dignissimos
                    enim
                    consectetur.</p>
            </div>
        </div>
        <div class="bg-slate-200 p-2 md:p-4 rounded-md my-2 md:my-0 md:ml-2 flex-grow md:max-w-[50%]">
            <h1 class="text-2xl font-semibold uppercase text-center my-2">Apa saja manfaat dari e-Presensi ?</h1>
            <ul class="p-2 text-center">
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis, fugit!</li>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis, fugit!</li>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis, fugit!</li>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis, fugit!</li>
            </ul>
        </div>
    </div>
    <div class="bg-slate-200 p-2 md:p-4 rounded-md my-4 max-[768px]:mt-2">
        <h1 class="text-2xl font-semibold uppercase text-center my-2">Bagaimana cara menggunakan e-Presensi ?</h1>
        <ul class="p-2 text-center">
            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis, fugit!</li>
            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis, fugit!</li>
            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis, fugit!</li>
            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis, fugit!</li>
        </ul>
    </div>
    <div class="bg-slate-200 p-2 md:p-4 rounded-md my-4 mb-0">
        <h1 class="text-2xl font-semibold uppercase text-center my-2">Pengembang</h1>
        <div class="flex-wrap flex justify-center gap-4">
            <div class="bg-slate-300 p-2 rounded-md w-72 hover:shadow-2xl duration-300">
                <div class="h-64 bg-red-500 flex items-center justify-center">
                    <img src="{{ asset('assets/tentang/pengembangAndika.webp') }}" class="size-full bg-blue-100" alt="Andika Pratama">
                </div>
                <h2 class="text-xl font-medium text-center mt-2">Andika Pratama</h2>
                <p class="text-center">Backend Developer</p>
            </div>
            <div class="bg-slate-300 p-2 rounded-md w-72 hover:shadow-2xl duration-300">
                <div class="h-64 bg-red-500 flex items-center justify-center">
                    <img src="{{ asset('assets/tentang/pengembangGilang.webp') }}" class="size-full bg-blue-100" alt="M. Gilang Chandrawinata">
                </div>
                <h2 class="text-xl font-medium text-center mt-2">M. Gilang Chandrawinata</h2>
                <p class="text-center">Frontend Developer</p>
            </div>
        </div>
    </div>
@endsection
