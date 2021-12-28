<template>
<index-view title="Messages" :breadcrumb="breadcrumb">
    <datatable :data="messages" searchRoute="messages.index" :filters="filters">
        <!-- Left Header -->

        <template #left-header>
            <search-input v-model="filters.search"></search-input>
        </template>

        <template #right-header>
            <!-- Fiter -->
            <filter-dropdown v-model="filters" @reset="reset">
                <slot name="filter"></slot>
            </filter-dropdown>
        </template>

        <!--Table Rows -->
        <template #default="{ rows }">
            <table v-if="rows.length">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Reply</th>
                        <th>Answered</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(row, index) in rows" :key="index">
                        <td>{{ row.id }}</td>
                        <td>{{ row.dateFormatted }}</td>
                        <td>{{ row.name }}</td>
                        <td>{{ row.email }}</td>
                        <td class="truncate" style="max-width:150px">{{ row.subject }}</td>
                        <td class="truncate" style="max-width:150px">{{ row.message }}</td>
                        <td class="truncate" style="max-width:150px">{{ row.reply }}</td>
                        <td>
                            <p :class="[row.answered == true ? 'text-green-500': 'text-red-500',]">
                                <span v-if="row.answered">Yes</span>
                                <span v-else>No</span>
                            </p>
                        </td>
                        <td class="flex">
                            <Link class="btn btn-success mr-2" title="Details" :href="route('messages.show', row.id)" v-if="hasPermissions(['viewMessages'])">
                            <detail-icon></detail-icon>
                            </Link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </template>
        <template #nodata> No Messages Found</template>
    </datatable>
</index-view>
</template>

<script>
import IndexView from "@/Views/IndexView.vue";
import {
    Link
} from "@inertiajs/inertia-vue3";
import ButtonLink from "@/Jetstream/ButtonLink.vue";
import JetDangerButton from "@/Jetstream/DangerButton.vue";
import Datatable from "@/Jetstream/Datatable.vue";
import SearchInput from "@/Jetstream/SearchInput.vue";
import FilterDropdown from "@/Jetstream/FilterDropdown.vue";
import DetailIcon from "@/Icons/DetailIcon.vue";
export default {
    name: "messages",
    props: {
        messages: Object,
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
        DetailIcon,
    },

    data() {
        return {
            filters: {
                search: this.query.search,
            },
        };
    },
};
</script>
