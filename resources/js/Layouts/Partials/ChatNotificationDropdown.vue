<template>
    <jet-dropdown width="80">
        <template #trigger>
            <button class=" px-4 relative text-xl text-gray-800 rounded-full hover:text-primary-500 focus:outline-none focus:text-primary-600 transition duration-150 ease-in-out">
                <chatbox-icon></chatbox-icon>
            </button>

        </template>

        <template #content>
            <div class="p-4">
                Chatbox content
            </div>

        </template>

    </jet-dropdown>

</template>

<script>
import ChatboxIcon from "@/Icons/ChatboxIcon.vue";
import JetDropdown from "@/Jetstream/Dropdown.vue";
import JetDropdownLink from "@/Jetstream/DropdownLink.vue";

export default {
    components: {
        JetDropdown,
        JetDropdownLink,
        ChatboxIcon,
    },
};
</script>

<style lang="scss" scoped>
</style>
