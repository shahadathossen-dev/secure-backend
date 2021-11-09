<template>
  <Link :href="'/'">
    <img src="/img/logo-dark.png" alt="Secure Web VPN" />
  </Link>
</template>

<script>
import { defineComponent } from "vue";
import { Link } from "@inertiajs/inertia-vue3";

export default defineComponent({
  components: {
    Link,
  },
});
</script>
