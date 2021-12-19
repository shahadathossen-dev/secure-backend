<template>
	<detail-view title="Purchase Details" :breadcrumb="breadcrumb">

		<!-- ID -->
		<detail-section class="border-b" label="ID" :value="purchase.id"></detail-section>

        <!-- Purchase Date -->
		<detail-section class="border-b" label="Purchase Date" :value="purchase.createdAt"></detail-section>


		<!-- Name -->
		<detail-section class="border-b" label="Name" :value="purchase.customer.name"></detail-section>

		<!-- Email -->
		<detail-section class="border-b" label="Email">
			<a class="text-blue-500" :href="`mailto:${purchase.customer.email}`">{{purchase.customer.email}}</a>
		</detail-section>

        <!-- Country -->
		<detail-section class="border-b" label="Country" :value="purchase.customer.country.name"></detail-section>

        <!-- Package Name -->
		<detail-section class="border-b" label="Package" :value="purchase.package.name"></detail-section>

        <!-- Package Type -->
		<detail-section class="border-b" label="Package Type" :value="purchase.package.type"></detail-section>

           <!-- Package Featured -->
		<detail-section class="border-b" label="Package Featured" :value="purchase.package.features"></detail-section>

        <!-- Package Price -->
		<detail-section class="border-b" label="Package Price" :value="purchase.package.price"></detail-section>

        <!-- Payment Type -->
		<detail-section class="border-b" label="Payment Type" :value="purchase.paymentType"></detail-section>

	</detail-view>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import DetailView from "@/Views/DetailView.vue";
import DetailSection from "@/Jetstream/DetailSection.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { Tabs, Tab } from "vue3-tabs-component";

export default {
	name: "purchase-details",
	// props: ["sessions"],
	props: {
		purchase: Object,
	},

	components: {
		AppLayout,
		DetailView,
		DetailSection,
		Link,
		Tabs,
		Tab,
	},

	data() {
		return {
			breadcrumb: [
				{ label: "Home", route: this.route("dashboard") },
				{ label: "purchase", route: this.route("purchases.index") },
				// { label: this.customer.name, route: null },
			],
		};
	},
};
</script>
