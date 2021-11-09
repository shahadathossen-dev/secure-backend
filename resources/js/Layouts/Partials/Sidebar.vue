<template>
  <div class="sidebar shadow-md" :class="{ collapsed: collapsed }">
    <!-- Logo -->
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

    <div
      class="px-4 overflow-y-auto overflow-x-hidden"
      style="max-height: calc(100vh - 80px)"
    >
      <!-- Dashboard -->
      <sidebar-item
        :href="route('dashboard')"
        :active="route().current('dashboard')"
        :collapsed="collapsed"
      >
        Dashboard
      </sidebar-item>

      <!-- Categories -->
      <sidebar-item
        :href="route('categories.index')"
        :active="route().current('categories.*')"
        :collapsed="collapsed"
      >
        <template #icon></template>
        Categories
      </sidebar-item>
    </div>
  </div>
</template>

<script>
import JetApplicationMark from "@/Jetstream/ApplicationMark.vue";
import SidebarItem from "@/Layouts/Partials/SidebarItem.vue";
import { Link } from "@inertiajs/inertia-vue3";

export default {
  props: {
    collapsed: {
      type: Boolean,
      required: true,
    },
  },
  components: {
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
  @apply h-screen bg-white overflow-hidden w-72 flex-shrink-0 absolute lg:relative z-20;

  &.collapsed {
    @apply lg:w-20 -translate-x-full lg:translate-x-0;
  }
  transition: all 0.5s ease-in-out;
}
.zoomin-enter-active,
.zoomin-leave-active {
  transition: transform 0.5s;
}
.zoomin-enter {
  transform: scale(1);
}

.zoomin-enter-to {
  transform: scale(1);
}

.zoomin-leave-to {
  transform: scale(0.1);
}
</style>
