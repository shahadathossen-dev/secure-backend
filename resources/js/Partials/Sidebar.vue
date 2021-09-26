<template>
    <div class="sidebar shadow-md" :class="{ collapsed: collapsed }">
        <!-- Logo -->
        <Link :href="route('dashboard')" class="flex items-center justify-center px-5 h-20">
        <jet-application-mark class="block h-10 w-10" />
        <div class="ml-4 flex-grow" :class="{'lg:hidden' : collapsed}">
            <span class="text-lg font-bold leading-3">Divinegemz</span>
        </div>
        </Link>

        <div class="px-4 overflow-auto" style="max-height: calc(100vh - 80px)">
            <!-- Dashboard -->
            <sidebar-item :href="route('dashboard')" :active="route().current('dashboard')" :collapsed="collapsed">
                Dashboard
            </sidebar-item>

             <!-- Categories -->
            <sidebar-item :href="route('categories.index')" :active="route().current('categories.*')" :collapsed="collapsed">
                <template #icon></template>
                Categories
            </sidebar-item>

        </div>

    </div>
</template>

<script>
import JetApplicationMark from "@/Jetstream/ApplicationMark.vue";
import SidebarItem from "@/Partials/SidebarItem.vue";
import { Link } from "@inertiajs/inertia-vue3";


export default {
    props: {
        collapsed: {
            type: Boolean,
            required: true,
        },
    },
    components: {
        JetApplicationMark,
        Link,
        SidebarItem,
    },

    data() {
        return {
            active: true,
        };
    },
};
</script>

<style lang="scss">
.sidebar {
    @apply h-screen bg-white overflow-hidden w-72 flex-shrink-0 absolute lg:relative transition lg:transition-none duration-500 ease-in-out z-20;

    &.collapsed {
        @apply lg:w-20 -translate-x-full lg:translate-x-0;
    }
}
</style>
