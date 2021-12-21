<template>
  <index-view title="Subscriptions" :breadcrumb="breadcrumb">
    <datatable
      :data="subscriptions"
      searchRoute="subscriptions.index"
      :filters="filters"
    >
      <!-- Left Header -->

      <template #left-header>
        <search-input v-model="filters.search"></search-input>
      </template>

      <template #right-header>
        <!-- Fiter -->
        <filter-dropdown v-model="filters" @reset="reset">
          <slot name="filter"></slot>
        </filter-dropdown>
      </template>

      <!--Table Rows -->
      <template #default="{ rows }">
        <table v-if="rows.length">
          <thead>
            <tr>
              <th>Id</th>
              <th>Date</th>
              <th>Customer Name</th>
              <th>Email</th>
              <th>Package</th>
              <th>Type</th>
              <th>Price</th>
              <th>Payment</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(row, index) in rows" :key="index">
              <td>{{ row.id }}</td>
              <td>{{ row.dateFormatted }}</td>
              <td>{{ row.customer.name }}</td>
              <td>{{ row.customer.email }}</td>
              <td>{{ row.package.name }}</td>
              <td>{{ row.package.type }}</td>
              <td>{{ row.package.price }}</td>
              <td>{{ row.paymentMethod }}</td>
              <td class="flex">
                <Link class="btn btn-success mr-2" title="Details" :href="route('subscriptions.show', row.id)"
                v-if="hasPermissions(['viewSubscriptions'])">
                  <detail-icon></detail-icon>
                </Link>
              </td>
            </tr>
          </tbody>
        </table>
      </template>
      <template #nodata> No Subscriptions Found</template>
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
  name: "subscriptions",
  props: {
    subscriptions: Object,
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
      breadcrumb: [
        { label: "Home", route: this.route("dashboard") },
        { label: "Subscriptions", route: null },
      ],
    };
  },
};
</script>
