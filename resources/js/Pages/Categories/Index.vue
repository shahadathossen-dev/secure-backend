<template>
    <index-view title="Categories">
        <datatable :data="categories" searchRoute="categories.index">
            <!-- Left Header -->
            <template #left-header>
                <search-input></search-input>
            </template>

            <template #right-header>

                <!-- Admin -->
                <button-link class="px-6 py-3 mr-4" :href="route('categories.create')">
                    <span class="mr-2">+ Add</span>
                    <span class="hidden md:inline">Category</span>
                </button-link>

                <!-- Fiter -->
                <filter-dropdown>
                    <slot name="filter"></slot>
                </filter-dropdown>
            </template>

            <!--Table Rows -->
            <template #default="{ rows }">
                <table v-if="rows.length">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(row, index) in rows" :key="index">
                            <td>{{row.id}}</td>
                            <td>{{row.name}}</td>
                            <td>{{row.description}}</td>
                            <td class="flex">
                                    <Link class="mr-3" :href="route('categories.edit', row.id)">
                                    <edit-icon></edit-icon>
                                    </Link>

                                    <delete-icon @click="deleteResource(route('categories.destroy', row.id))"></delete-icon>
                            </td>

                        </tr>
                    </tbody>
                </table>
            </template>
            <template #nodata>No Category Found</template>
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
import EditIcon from "@/Icons/EditIcon.vue";
import DeleteIcon from "@/Icons/DeleteIcon.vue";

export default {
    props: {
        categories: Object,
    },
    components: {
        IndexView,
        Link,
        ButtonLink,
        JetDangerButton,
        Datatable,
        SearchInput,
        FilterDropdown,
        EditIcon,
        DeleteIcon,
    },
};
</script>

<style lang="scss" scoped>
</style>
