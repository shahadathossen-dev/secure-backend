<template>
  <form-view
    @submitted="update('packages.update', product.id)"
    title="Update Packages"
    :breadcrumb="breadcrumb"
  >
    <template #form>
      <!-- Name -->
      <form-group class="border-b">
        <jet-label class="md:w-1/4 mt-2" for="name" value="Name" required />
        <div class="w-full mt-1">
          <jet-input
            id="name"
            class="w-full"
            type="text"
            v-model="form.name"
            autocomplete="name"
            placeholder="Package Name"
          />
          <jet-input-error :message="form.errors.name" class="mt-2" />
        </div>
      </form-group>

      <!-- Packages -->
      <form-group class="border-b">
        <jet-label
          class="md:w-1/4 mt-2"
          for="category"
          value="Category"
          required
        />
        <div class="w-full mt-1">
          <jet-select
            id="category"
            class="w-full rounded-md"
            :options="categories"
            v-model="form.category_id"
            track="id"
            placeholder="Select Category"
          >
          </jet-select>
          <jet-input-error :message="form.errors.category_id" class="mt-2" />
        </div>
      </form-group>

      <!-- Type -->
      <form-group class="border-b">
        <jet-label class="md:w-1/4 mt-2" for="type" value="Type" required />
        <div class="w-full mt-1">
          <jet-select
            id="type"
            class="w-full rounded-md"
            :options="packageTypes"
            v-model="form.type"
            track="value"
            placeholder="Select Package Type"
          >
          </jet-select>
          <jet-input-error :message="form.errors.type" class="mt-2" />
        </div>
      </form-group>

      <!-- Price -->
      <form-group class="border-b">
        <jet-label class="md:w-1/4 mt-2" for="price" value="Price" required />
        <div class="w-full mt-1">
          <jet-input
            id="price"
            class="w-full"
            type="number"
            v-model.number="form.price"
            step="0.1"
            placeholder="0.00"
          />
          <jet-input-error :message="form.errors.price" class="mt-2" />
        </div>
      </form-group>

      <!--  Features -->
      <form-group class="border-b">
        <jet-label class="md:w-1/4 mt-2" for="name" value="Name" required />

        <div class="w-full mt-1">
          <div class="input-group">
            <div class="flex w-full py-2" v-for="(feature, i) in form.features" :key="i">
              <jet-input
                v-model="form.features[i]"
                id="name"
                type="text"
                class="w-full"
                placeholder="Write new feature"
                autocomplete="name"
              />
              <jet-button
                @click.prevent="i < 1 ? addFeature() : removeFeature(i)"
                class="px-6 ml-2 xs:mr-2 my-2 xs:my-0"
                :class="{ 'opacity-25': form.processing, 'btn-primary': i < 1, 'btn-danger': !(i < 1) }"
                :disabled="form.processing"
                title="Add feature"
              >
                {{ i < 1 ? '+' : 'x' }}
              </jet-button>
            </div>
          </div>
          <jet-input-error :message="form.errors.name" class="mt-2" />
        </div>
      </form-group>
    </template>

    <template #actions>
      <Link :href="route('packages.index')" class="xs:mr-4">Cancel</Link>
      <jet-button
        @click.prevent="update('packages.update', product.id, true)"
        class="px-6 xs:mr-2 my-2 xs:my-0"
        :class="{ 'opacity-25': form.processing }"
        :disabled="form.processing"
        >Save & Continue</jet-button
      >
      <jet-button
        class="px-6"
        :class="{ 'opacity-25': form.processing }"
        :disabled="form.processing"
        >Save</jet-button
      >
    </template>
  </form-view>
</template>

<script>
import FormView from "@/Views/FormView.vue";
import { Link } from "@inertiajs/inertia-vue3";
import JetInput from "@/Jetstream/Input.vue";
import JetImageInput from "@/Jetstream/ImageInput.vue";
import JetSelect from "@/Jetstream/Select.vue";
import JetInputError from "@/Jetstream/InputError.vue";
import JetLabel from "@/Jetstream/Label.vue";
import JetTextInput from "@/Jetstream/TextInput.vue";
import JetButton from "@/Jetstream/Button.vue";
import FormGroup from "@/Jetstream/FormGroup.vue";

export default {
  name: "create-user",
  props: {
    categories: Object,
    product: Object,
    query: Object,
    packageTypes: Object,
  },
  components: {
    Link,
    FormView,
    JetInput,
    JetInputError,
    JetLabel,
    JetTextInput,
    JetSelect,
    FormGroup,
    JetButton,
    JetImageInput,
  },
  data() {
    return {
      breadcrumb: [
        { label: "Home", route: this.route("dashboard") },
        { label: "Packages", route: this.route("packages.index") },
        { label: "Create", route: null },
      ],
      form: this.$inertia.form({
        name: this.product.name,
        category_id: this.product.categoryId,
        features: this.product.features,
        type: this.product.type,
        price: this.product.price,
      }),
    };
  },
  methods: {
    addFeature() {
      this.form.features.push('')
    },
    removeFeature(index) {
      this.form.features.splice(index, 1)
    },
  }
};
</script>
