<script setup>
import UserLayout from '@/Layouts/UserLayout.vue';
import { createCalendar, viewMonthGrid } from '@schedule-x/calendar'
import '@schedule-x/theme-default/dist/index.css'
import { ref } from 'vue'
</script>

<template>
    <UserLayout>
        <div class="container mx-auto flex gap-4 h-[90vh] ">
            <div
                class=" flex flex-col flex-1 h-full w-full border bg-white border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 gap-5 px-4 py-4">
                <div class="flex flex-col gap-2">
                    <button class="bg-blue-800 py-2 rounded-xl">Create Post</button>
                    <button class="bg-blue-800 py-2 rounded-xl">Create Campain</button>
                    <button class="bg-blue-800 py-2 rounded-xl">Browse Gallery</button>

                    <button class="bg-blue-800 py-2 rounded-xl mt-5">Edit Post</button>
                    <button class="bg-blue-800 py-2 rounded-xl">Edit Campain</button>
                    <button class="bg-blue-800 py-2 rounded-xl">Upload Photos</button>

                    <button class="bg-blue-800 py-2 rounded-xl mt-5">Delete Post</button>
                    <button class="bg-blue-800 py-2 rounded-xl">Delete Campain</button>
                    <button class="bg-blue-800 py-2 rounded-xl">Delete Photos</button>
                </div>
                <div
                    class="flex-1 h-full w-full overflow-y-auto border-gray-200 rounded-lg shadow dark:bg-gray-500 dark:border-gray-200 ">
                    .
                </div>
            </div>
            <div id="calendar" ref="calendarRef" class="h-full flex-grow " />
        </div>
    </UserLayout>
</template>

<script>
export default {
    data: () => ({
        calendar: null
    }),
    setup() {
        return {
            calendarRef
        }
    },
    mounted() {
        this.calendar = createCalendar({
            isDark: true,
            views: [viewMonthGrid],
            events: [],
        })

        this.calendar.render(this.$refs.calendarRef)
    },
}
</script>
