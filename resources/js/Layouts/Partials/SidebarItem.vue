<template>
  <li class="text-gray-800 list-none sidebar-item">
    <Link
      :href="href"
      class="flex items-center sidebar-link p-1"
      :class="{ active: active }"
    >
      <span class="flex items-center justify-center icon h-10 w-10">
        <slot name="icon">
          <home-icon></home-icon>
        </slot>
      </span>
      <span class="mx-4 h6" :class="{ 'lg:hidden': collapsed }">
        <slot></slot>
      </span>
    </Link>
  </li>
</template>

<script>
import HomeIcon from "@/Icons/HomeIcon.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
export default {
  components: {
    HomeIcon,
    Head,
    Link,
  },
  props: ["href", "active", "collapsed"],
};
</script>

<style lang="scss" scoped>
.active {
  @apply font-bold rounded-lg bg-primary-50 text-primary-500;
}
</style>
