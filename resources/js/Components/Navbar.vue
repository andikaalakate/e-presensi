<template>
    <nav
        @click.self="navigation.isOpen = false"
        class="py-2 px-4 flex items-center justify-between"
    >
        <div
            @click.stop="toggleNavigation"
            class="w-[50px] h-[50px] bg-[#005A8D] flex items-center justify-center rounded-lg cursor-pointer"
        >
            <box-icon
                v-if="navigation.isOpen"
                name="x"
                class="fill-white size-8"
            ></box-icon>
            <box-icon
                v-else-if="!navigation.isOpen && isSpecialRoute"
                name="chevron-left"
                class="fill-white size-8"
            ></box-icon>
            <box-icon v-else name="menu" class="fill-white size-8"></box-icon>
        </div>
        <h1 class="text-2xl font-[Oswald] text-gray-600 uppercase">
            e-Presensi
        </h1>
    </nav>
</template>

<script>
export default {
    data() {
        return {
            navigation: {
                isOpen: false,
            },
        };
    },
    computed: {
        isSpecialRoute() {
            const currentRoute = window.location.pathname;
            return /\/admin\/.+|\/siswa\/.+/.test(currentRoute);
        },
    },
    methods: {
        toggleNavigation() {
            this.navigation.isOpen = !this.navigation.isOpen;
        },
    },
};
</script>
