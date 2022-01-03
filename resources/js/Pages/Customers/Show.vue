<template>
	<detail-view title="Customer Details">

		<!-- ID -->
		<detail-section class="border-b" label="ID" :value="customer.id"></detail-section>

		<!-- Date -->
		<detail-section class="border-b" label="Date" :value="customer.createdAtFormatted"></detail-section>
		<!-- Email -->
		<detail-section class="border-b" label="Email" :value="customer.email"></detail-section>
		<!-- Country -->
		<detail-section class="border-b" label="Country" :value="customer.country.name"></detail-section>


		<template #secondary-view>
			<div class="mt-8">

				<h1 class="font-bold text-xl">Subscription list</h1>
				<datatable :data="subscriptions">
					<!--Table Rows -->
					<template #default="{rows}">
						<table v-if="rows.length">
							<thead>
								<tr>
									<th>Id</th>
									<th>Date</th>
									<th>Package Name</th>
									<th>Category</th>
									<th>Price</th>
									<th>Type</th>
									<th>Payment Method</th>
								</tr>

							</thead>
							<tbody>
								<tr v-for="(row, index) in rows" :key="index">
									<td>{{row.id}}</td>
									<td>{{row.dateFormatted}}</td>
									<td>{{row.package.name}}</td>
                                    <td>{{row.package.category.name}}</td>
									<td>${{row.package.price}}</td>
									<td>{{row.package.type}}</td>
									<td>{{row.paymentMethod}}</td>

								</tr>
							</tbody>
						</table>
					</template>
					<template #nodata>No Subscriptions Found</template>

				</datatable>
			</div>
		</template>

	</detail-view>

</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import DetailView from "@/Views/DetailView.vue";
import DetailSection from "@/Jetstream/DetailSection.vue";
import { Link } from "@inertiajs/inertia-vue3";
import Datatable from "@/Jetstream/Datatable.vue";

export default {
	name: "order-details",
	props: {
		customer: Object,
        subscriptions:Object,

	},

	components: {
		AppLayout,
		DetailView,
		DetailSection,
		Link,
		Datatable,
	},

};
</script>
