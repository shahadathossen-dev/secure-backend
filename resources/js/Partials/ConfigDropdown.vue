<template>
	<jet-dropdown  width="80">
        <template #trigger>
                <button class=" px-4 relative text-xl text-gray-800 rounded-full hover:text-primary-500 focus:outline-none focus:text-primary-600 transition duration-150 ease-in-out">
                 <config-icon></config-icon>
            </button>


        </template>

        <template #content>
           <div class="border-b px-4 py-2 text-sm leading-5 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition" style="max-height: 245px; overflow: auto">
                Configuration content
           </div>
        </template>


    </jet-dropdown>


</template>

<script>

import ConfigIcon from "@/Icons/ConfigIcon.vue";
import JetDropdown from "@/Jetstream/Dropdown.vue";
import JetDropdownLink from "@/Jetstream/DropdownLink.vue";

    export default {
        components: {
            JetDropdown,
            JetDropdownLink,
            ConfigIcon,


        },
    }
</script>

<style lang="scss" scoped>

</style>
