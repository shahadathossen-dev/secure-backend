<template>
    <app-layout title="Dashboard">
            <div class="">
                <div class="bg-white overflow-hidden  sm:rounded-lg p-4">
                    Dashboard page content
                </div>
            </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    // import Welcome from '@/Jetstream/Welcome.vue'

    export default defineComponent({
        components: {
            AppLayout,
            // Welcome,
        },
    })
</script>
