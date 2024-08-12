<x-splade-data default="{ isOpen: false }">
    <x-navbar />
</x-splade-data>

<div class=" h-[calc(100vh-66px)] p-4 max-[768px]:p-3">
    <h1 class="m-2 text-3xl text-black font-semibold">{{ $title }}</h1>
    <div
        class="bg-[#fff7fc] p-4 h-[calc(100%-50px)] shadow-[0_0_10px_0_rgba(0,0,0,.5)] rounded-lg overflow-auto scrollbar-none">
        @yield('body')
    </div>
</div>