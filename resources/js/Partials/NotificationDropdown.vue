<template>
	<jet-dropdown  width="80">
        <template #trigger>
            <button class=" px-4 relative text-xl text-gray-800 rounded-full hover:text-primary-500 focus:outline-none focus:text-primary-600 transition duration-150 ease-in-out">
			<notification-icon></notification-icon>
			</button>

        </template>

        <template #content>
           <div class="p-4">
                notification content
           </div>

        </template>


    </jet-dropdown>


</template>

<script>

import NotificationIcon from "@/Icons/NotificationIcon.vue";
import JetDropdown from "@/Jetstream/Dropdown.vue";
import JetDropdownLink from "@/Jetstream/DropdownLink.vue";
    export default {
        components: {
            NotificationIcon,
            JetDropdown,
            JetDropdownLink,

        },
    }
</script>

<style lang="scss" scoped>

</style>
