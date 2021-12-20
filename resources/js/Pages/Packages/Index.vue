<template>
  <index-view title="Packages" :breadcrumb="breadcrumb">
    <datatable :data="packages" searchRoute="packages.index" :filters="filters">
      <!-- Left Header -->
      <template #left-header>
        <search-input v-model="filters.search"></search-input>
      </template>

      <template #right-header>
        <!-- Fiter -->
        <filter-dropdown v-model="filters" @reset="reset">
          <slot name="filter"></slot>
        </filter-dropdown>

        <!-- Admin -->
        <button-link
          class="px-6 py-3 ml-4"
          :href="route('packages.create')"
          v-if="$page.props.can.createPackages"
        >
          <span class="mr-2">+ Add</span>
          <span class="hidden md:inline">Package</span>
        </button-link>
      </template>

      <!--Table Rows -->
      <template #default="{ rows }">
        <table v-if="rows.length">
          <thead>
            <tr>
              <th>Id</th>
              <th>Name</th>
              <th>Type</th>
              <th>Category</th>
              <th>Fetures</th>
              <th>Price</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(row, index) in rows" :key="index">
              <td>{{ row.id }}</td>

              <td>{{ row.name }}</td>
              <td>{{ row.type }}</td>
              <td>
                {{ row.category.name }}
              </td>
              <td>
                <ul>
                  <li v-for="(feature, i) in row.features" :key="i">
                    {{ feature }}
                  </li>
                </ul>
              </td>
              <td>
                {{ row.price }}
              </td>
              <td class="flex">
                <div>
                  <Link
                    class="btn btn-purple mr-2"
                    title="Edit"
                    :href="route('packages.edit', row.id)"
                    v-if="$page.props.can.updateCategories"
                  >
                    <i class="ti-pencil-alt"></i>
                  </Link>

                  <jet-danger-button
                    title="Delete"
                    @click="deleteResource(route('packages.destroy', row.id))"
                    v-if="$page.props.can.deleteCategories"
                  >
                    <i class="ti-trash"></i>
                  </jet-danger-button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </template>
      <template #nodata>No users Found</template>
    </datatable>
  </index-view>
</template>

<script>
import IndexView from "@/Views/IndexView.vue";
import { Link } from "@inertiajs/inertia-vue3";
import ButtonLink from "@/Jetstream/ButtonLink.vue";
import JetDangerButton from "@/Jetstream/DangerButton.vue";
import Datatable from "@/Jetstream/Datatable.vue";
import SearchInput from "@/Jetstream/SearchInput.vue";
import FilterDropdown from "@/Jetstream/FilterDropdown.vue";
import DetailIcon from "@/Icons/DetailIcon.vue";
export default {
  name: "Packages",
  props: {
    packages: Object,
    query: Object,
  },

  components: {
    IndexView,
    Link,
    ButtonLink,
    JetDangerButton,
    Datatable,
    SearchInput,
    FilterDropdown,
    DetailIcon,
  },

  data() {
    return {
      filters: {
        search: this.query.search,
      },
    };
  },
};
</script>
