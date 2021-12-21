<template>
	<detail-view title="Subscription Details" :breadcrumb="breadcrumb">

		<!-- ID -->
		<detail-section class="border-b" label="ID" :value="subscription.id"></detail-section>

        <!-- Subscription Date -->
		<detail-section class="border-b" label="Subscription Date" :value="subscription.dateFormatted"></detail-section>

		<!-- Name -->
		<detail-section class="border-b" label="Name" :value="subscription.customer.name"></detail-section>

		<!-- Email -->
		<detail-section class="border-b" label="Email">
			<a class="text-blue-500" :href="`mailto:${subscription.customer.email}`">{{subscription.customer.email}}</a>
		</detail-section>

        <!-- Country -->
		<detail-section class="border-b" label="Country" :value="subscription.customer.country.name"></detail-section>

        <!-- Package Name -->
		<detail-section class="border-b" label="Package" :value="subscription.package.name"></detail-section>

        <!-- Package Type -->
		<detail-section class="border-b" label="Package Type" :value="subscription.package.type"></detail-section>

        <!-- Package Price -->
		<detail-section class="border-b" label="Package Price" >
            <p>${{subscription.package.price}}</p>
        </detail-section>

        <!-- Payment Method -->
		<detail-section class="border-b" label="Payment Method" :value="subscription.paymentMethod"></detail-section>

	</detail-view>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import DetailView from "@/Views/DetailView.vue";
import DetailSection from "@/Jetstream/DetailSection.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { Tabs, Tab } from "vue3-tabs-component";

export default {
	name: "subscription-details",
	props: {
		subscription: Object,
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
				{ label: "subscription", route: this.route("subscriptions.index") },
				// { label: this.customer.name, route: null },
			],
		};
	},
};
</script>
