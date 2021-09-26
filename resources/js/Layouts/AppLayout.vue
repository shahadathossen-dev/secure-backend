<template>
    <div class="overlay h-screen w-full lg:hidden" v-if="!collapsed" @click="collapsed = true"></div>

    <div class="flex">
        <sidebar :key="$page.url" :collapsed="collapsed"></sidebar>
        <div class="flex-grow overflow-x-hidden">

            <Head :title="title" />
            <div class="min-h-screen bg-gray-100">
                <nav class="bg-white border-b border-gray-100 shadow-md">
                    <!-- Primary Navigation Menu -->
                    <div class="px-8">
                        <div class="flex justify-between h-20 items-center">
                         <!-- left content -->
							<div class="items-center flex">
								<menu-icon class="cursor-pointer" @click="toggleSidebar"></menu-icon>
							</div>


							<!-- Right content -->
							<div class="flex items-center justify-between ml-6">
                                <search-input class="mr-6"></search-input>

                                <div class="flex justify-between ml-6">
                                     <!-- chatbox Dropdown -->
								<chat-notification-dropdown></chat-notification-dropdown>

                                <!-- Configuration Dropdown -->
								<config-dropdown class=""></config-dropdown>

								<!-- Notification Dropdown -->
								<notification-dropdown class="ml-4"></notification-dropdown>
                                </div>

								<!-- Settings Dropdown -->
								<settings-dropdown></settings-dropdown>
							</div>

                        </div>
                    </div>
                </nav>

           <!-- Page Content -->
				<main class="px-4 sm:px-6 lg:px-8 py-8  overflow-y-auto w-full" style="height: calc(100vh - 100px);" scroll-region>
					<jet-banner />
					<slot></slot>
				</main>
            </div>
        </div>

    </div>

</template>

<script>
import Sidebar from "@/Partials/Sidebar.vue";
import { defineComponent } from "vue";
import JetApplicationMark from "@/Jetstream/ApplicationMark.vue";
import JetBanner from "@/Jetstream/Banner.vue";
import JetDropdown from "@/Jetstream/Dropdown.vue";
import JetDropdownLink from "@/Jetstream/DropdownLink.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import MenuIcon from "@/Icons/MenuIcon.vue";
import SettingsDropdown from "@/Partials/SettingsDropdown.vue";
import NotificationDropdown from "@/Partials/NotificationDropdown.vue";
import ConfigDropdown from "@/Partials/ConfigDropdown.vue";
import ChatNotificationDropdown from "@/Partials/ChatNotificationDropdown.vue";
import SearchInput from "@/Jetstream/SearchInput.vue";



export default defineComponent({
    props: {
        title: String,
    },

    components: {
        Head,
        JetApplicationMark,
        JetBanner,
        JetDropdown,
        JetDropdownLink,
        Link,
        Sidebar,
        MenuIcon,
        SettingsDropdown,
        NotificationDropdown,
        ConfigDropdown,
        ChatNotificationDropdown,
        SearchInput,
    },

    	computed: {
		collapsed() {
			return this.$store.state.isCollapsed;
		},
	},

    	methods: {
		handleResize() {
			const baseWidth = 1024;
			if (window.innerWidth <= baseWidth) {
				this.$store.dispatch("setCollapsed", true);
			}
		},

		toggleSidebar() {
			this.$store.dispatch("toggleCollapsed");
		},

        logout() {
            this.$inertia.post(route("logout"));
        },
	},


});
</script>
