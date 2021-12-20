<template>
	<detail-view title="Massage Details">

		<!-- ID -->
		<detail-section class="border-b" label="ID" :value="massage.id"></detail-section>

        <!-- Massage Date -->
		<detail-section class="border-b" label="Massage Date" :value="massage.createdAt"></detail-section>


		<!-- Name -->
		<detail-section class="border-b" label="Name" :value="massage.name"></detail-section>

		<!-- Email -->
		<detail-section class="border-b" label="Email">
			<a class="text-blue-500" :href="`mailto:${massage.email}`">{{massage.email}}</a>
		</detail-section>


        <!-- Subject -->
        <detail-section class="border-b" label="Subject" :value="massage.subject"></detail-section>

        <!-- Message -->
        <detail-section class="border-b" label="Message" :value="massage.massage"></detail-section>

        <!-- Reply -->
        <detail-section class="border-b" label="Reply" :value="massage.reply" v-if="massage.reply"></detail-section>


         <!-- Answered -->
        <detail-section class="border-b" label="Answered">
            <div class="w-3/4  break-words">
                <p :class="[massage.answered == true ? 'text-green-500': 'text-red-500',]">
                    <span v-if="massage.answered">Yes</span>
                    <span v-else>No</span>
                </p>
            </div>
        </detail-section>

        <!-- Reply -->
        <detail-section class="border-b" label="Reply" v-if="!massage.answered">
            <form @submit.prevent="reply" >
                <!-- Reply -->
                <div class="flex -mx-6 px-6">
                    <div class="w-3/4 py-4 break-words">
                        <jet-text-input v-model="form.reply" class="w-full"></jet-text-input>
                        <jet-input-error :message="form.errors.reply" class="mt-2" />
                    </div>
                </div>
                <div class="flex items-center justify-end">
                    <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">Save</jet-button>
                </div>
            </form>

        </detail-section>



	</detail-view>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import DetailView from "@/Views/DetailView.vue";
import DetailSection from "@/Jetstream/DetailSection.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { Tabs, Tab } from "vue3-tabs-component";
import JetTextInput from "@/Jetstream/TextInput.vue";
import JetButton from "@/Jetstream/Button.vue";
import JetInputError from "@/Jetstream/InputError.vue";

export default {
	name: "massage-details",
	props: {
		massage: Object,
	},

	components: {
		AppLayout,
		DetailView,
		DetailSection,
		Link,
		Tabs,
		Tab,
        JetTextInput,
        JetInputError,
        JetButton,
	},

        data() {
        return {
            form: this.$inertia.form({
                reply: null,
            }),
        };
    },


        methods: {
            reply() {
                this.form.post(this.route("massages.reply", this.massage.id));
            },
        },

};
</script>
