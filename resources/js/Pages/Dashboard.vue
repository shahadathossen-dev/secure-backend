<template>
  <app-layout title="Dashboard">
    <div class="">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <welcome />
      </div>
    </div>
  </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import Welcome from '@/Jetstream/Welcome.vue'
import { Link } from "@inertiajs/inertia-vue3";
import JetButton from "@/Jetstream/Button.vue";

export default defineComponent({
  components: {
    AppLayout,
    Welcome,
    JetButton,
    Link,
  },
  data() {
    return {
      form: this.$inertia.form({}),
    };
  },
  methods: {},
  async mounted() {},
});
</script>
