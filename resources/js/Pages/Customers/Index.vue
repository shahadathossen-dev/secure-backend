<template>

	<index-view title="Customers">
		<datatable :data="customers" searchRoute="customers.index" :filters="filters">
			<!-- Left Header -->
			<template #left-header>
				<search-input v-model="filters.search"></search-input>
			</template>

			<template #right-header>
				<!-- Fiter -->
				<filter-dropdown>
					<slot name="filter"></slot>
				</filter-dropdown>
			</template>

			<!--Table Rows -->
			<template #default="{rows}">
				<table v-if="rows.length">
					<thead>
						<tr>
							<th>Id</th>
							<th>Date</th>
							<th>Name</th>
							<th>Email</th>
							<th>Country</th>
							<th>Action</th>
						</tr>

					</thead>
					<tbody>
						<tr v-for="(row, index) in rows" :key="index">
							<td>{{ row.id }}</td>
							<td>{{ row.createdAtFormatted}}</td>
							<td>{{ row.name }}</td>
							<td>{{ row.email }}</td>
							<td>{{ row.country.code }}</td>

							<td class="flex">

								<div>
									<Link class="btn btn-success mr-2" title="Details" :href="route('customers.show', row.id)">
									<detail-icon></detail-icon>
									</Link>
								</div>

							</td>
						</tr>
					</tbody>
				</table>
			</template>
			<template #nodata>No customers Found</template>

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
	name: "customers",

	props: {
		customers: Object,
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
