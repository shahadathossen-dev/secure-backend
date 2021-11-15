<template>
    <index-view title="Users">
        <datatable :data="users" searchRoute="users.index" :filters="filters">
            <!-- Left Header -->
            <template #left-header>
                <search-input v-model="filters.search"></search-input>
            </template>

            <template #right-header>

                <!-- Admin -->
                <button-link class="px-6 py-3 mr-4" :href="route('users.create')">
                    <span class="mr-2">+ Add</span>
                    <span class="hidden md:inline">User</span>
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

                            <td class="flex">
                                	<Link class="btn btn-success mr-2" title="Details" :href="route('users.show', row.id)" v-if="$page.props.can.viewUsers">
									<detail-icon></detail-icon>
									</Link>
									<Link class="btn btn-purple mr-2" title="Edit" :href="route('users.edit', row.id)" v-if="$page.props.can.updateUsers">
									<i class="ti-pencil-alt"></i>
									</Link>
									<jet-danger-button title="Delete" @click="deleteResource(route('users.destroy', row.id))" v-if="$page.props.can.deleteUsers">
										<i class="ti-trash"></i>
									</jet-danger-button>
                            </td>

                        </tr>
                    </tbody>
                </table>
            </template>
            <template #nodata>No Users Found</template>
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
        users: Object,
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
        EditIcon,
        DeleteIcon,
    },
    data() {
        return {
            filters: {
                search: this.query.search,
                // status: this.query.status,
            },
        }
    },
};
</script>

<style lang="scss" scoped>
</style>
