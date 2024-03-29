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
      <sidebar-item
        :href="route('dashboard')"
        :active="route().current('dashboard')"
        :collapsed="collapsed"
      >
        Dashboard
      </sidebar-item>
      <!-- RESOURCES -->
      <p
        class="px-4 py-3 text-xs font-bold text-gray-400 uppercase"
        v-if="!collapsed && hasPermissions(['viewAnyRoles', 'viewAnyUsers'])"
      >
        ACL
      </p>

      <!-- People -->
      <sidebar-item
        :active="isActive(['roles.*', 'users.*', 'messages.*'])"
        :collapsed="collapsed"
        v-if="hasPermissions(['viewAnyRoles', 'viewAnyUsers'])"
      >
        <template #icon>
          <i class="ti-user" title="Admins"></i>
        </template>
        Admins
        <!-- Nested Menu Items -->
        <template #submenu>
          <!-- Roles -->
          <submenu-item
            title="Roles"
            :href="route('roles.index')"
            :active="isActive(['roles.*'])"
            :collapsed="collapsed"
            v-if="hasPermissions(['viewAnyRoles'])"
          >
            Roles
          </submenu-item>
          <!-- Users -->
          <submenu-item
            title="Users"
            :href="route('users.index')"
            :active="isActive(['users.*'])"
            :collapsed="collapsed"
          >
            Users
          </submenu-item>

            <!-- Massages -->
          <submenu-item
            title="Messages"
            :href="route('messages.index')"
            :active="isActive(['messages.*'])"
            :collapsed="collapsed"
          >
            Messages
          </submenu-item>
        </template>
      </sidebar-item>

      <!-- RESOURCES -->
      <p
        class="px-4 py-3 text-xs font-bold text-gray-400 uppercase"
        v-if="
          !collapsed && hasPermissions(['viewAnyCategories', 'viewAnyPackages'])
        "
      >
        Resources
      </p>

      <!-- Products -->
      <sidebar-item
        :active="isActive(['categories.*', 'packages.*'])"
        :collapsed="collapsed"
        v-if="hasPermissions(['viewAnyCategories', 'viewAnyPackages'])"
      >
        <template #icon>
          <i class="ti-package" title="Products"></i>
        </template>
        Products
        <!-- Nested Menu Items -->
        <template #submenu>
          <!-- Categories -->
          <submenu-item
            title="Categories"
            :href="route('categories.index')"
            :active="isActive(['categories.*'])"
            :collapsed="collapsed"
            v-if="hasPermissions(['viewAnyCategories'])"
          >
            Categories
          </submenu-item>
          <!-- Packages -->
          <submenu-item
            title="Packages"
            :href="route('packages.index')"
            :active="isActive(['packages.*'])"
            :collapsed="collapsed"
            v-if="hasPermissions(['viewAnyPackages'])"
          >
            Packages
          </submenu-item>
        </template>
      </sidebar-item>

      <!-- Subscriptions -->
      <sidebar-item :active="isActive(['subscriptions.*', 'customers.*'])" :collapsed="collapsed" v-if="hasPermissions(['viewAnySubscriptions'])"
      >
        <template #icon>
          <i class="ti-shopping-cart" title="Subscriptions"></i>
        </template>
        Sales
        <!-- Nested Menu Items -->
        <template #submenu>

           <!-- Customers -->
          <submenu-item title="Customer" :href="route('customers.index')" :active="isActive(['customers.*'])" :collapsed="collapsed"  v-if="hasPermissions(['viewAnySubscriptions'])">
            Customers
          </submenu-item>

          <!-- Subscriptions -->
          <submenu-item title="Subscriptions" :href="route('subscriptions.index')" :active="isActive(['subscriptions.*'])" :collapsed="collapsed"  v-if="hasPermissions(['viewAnySubscriptions'])">
            Subscriptions
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
import UserIcon from "@/Icons/UserIcon.vue";

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
