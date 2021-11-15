<template>
  <div class="sidebar shadow-md" :class="{ collapsed: collapsed }">

    <Link
      :href="route('dashboard')"
      class="flex items-center justify-center px-5 h-20"
    >
      <application-mark class="block h-10 w-10" />
      <div class="ml-4 flex-grow" :class="{ 'lg:hidden': collapsed }">
        <span class="text-lg font-bold leading-3">
          <transition name="zoomin">
            <application-type />
          </transition>
        </span>
      </div>
    </Link>

            <div class="px-4 overflow-auto" style="max-height: calc(100vh - 80px)">
            <!-- Dashboard -->
            <sidebar-item :href="route('dashboard')" :active="route().current('dashboard')" :collapsed="collapsed">
                Dashboard
            </sidebar-item>
        <!-- RESOURCES -->
            <p class="px-4 py-3 text-xs font-bold text-gray-400 uppercase" v-if="!collapsed && hasPermissions(
			['viewAnyRoles']
		)">Resources</p>


            <!-- People -->
            <sidebar-item :active="isActive(['roles.*', 'users.*'])" :collapsed="collapsed" v-if="hasPermissions(['viewAnyRoles'])">
                <template #icon >
                        <span title="People">
                        <user-icon></user-icon>
                    </span>

                </template>
                Admins
                <!-- Nested Menu Items -->
                <template #submenu>
                    <!-- Roles -->
                    <submenu-item title="Roles" :href="route('roles.index')" :active="isActive(['roles.*'])" :collapsed="collapsed" v-if="hasPermissions(['viewAnyRoles'])">
                        Roles
                    </submenu-item>
                    <!-- Users -->
                    <submenu-item title="Users" :href="route('users.index')" :active="isActive(['users.*'])" :collapsed="collapsed">
                        Users
                    </submenu-item>
                </template>
            </sidebar-item>
  </div>
  </div>
</template>

<script>
import JetApplicationMark from "@/Jetstream/ApplicationMark.vue";
import SidebarItem from "@/Layouts/Partials/SidebarItem.vue";
import SubmenuItem from "@/Layouts/Partials/SubmenuItem.vue";
import { Link } from "@inertiajs/inertia-vue3";
import UserIcon from '@/Icons/UserIcon.vue';

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
        SubmenuItem,
        UserIcon,
    },

    methods: {
        isActive(routes) {
            return routes.some((route) => this.route().current(route));
        },
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
