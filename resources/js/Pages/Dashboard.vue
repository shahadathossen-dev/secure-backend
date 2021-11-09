<template>Welcome to Dashboard</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
// import Welcome from '@/Jetstream/Welcome.vue'
import FormView from "./Views/FormView.vue";
import { Link } from "@inertiajs/inertia-vue3";
import JetInput from "@/Jetstream/Input.vue";
import JetInputError from "@/Jetstream/InputError.vue";
import JetLabel from "@/Jetstream/Label.vue";
import JetButton from "@/Jetstream/Button.vue";
import FormGroup from "@/Jetstream/FormGroup.vue";

export default defineComponent({
  components: {
    AppLayout,
    // Welcome,
    FormGroup,
    FormView,
    JetInput,
    JetInputError,
    JetLabel,
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
