<x-splade-data store="navigation" default="{ isOpen: false }" />
<x-splade-data store="profile" default="{ isOpen: false }" />

<x-navbar />

<div :class="{ 'z-0 blur-sm': navigation.isOpen, '': !navigation.isOpen }" class=" h-[calc(100vh-66px)] p-4 max-[768px]:p-3" v-SpladePreserveScroll:sidebar
v-on:click.away="navigation.isOpen = false, profile.isOpen = false" >
    <h1 class="m-2 text-3xl text-black font-semibold">{{ $title }}</h1>
    <div
        class="p-2 md:p-4 h-[calc(100%-50px)] shadow-[0_0_10px_0_rgba(0,0,0,.5)] rounded-lg overflow-auto scrollbar-none">
        {{ $slot }}
    </div>
</div>
