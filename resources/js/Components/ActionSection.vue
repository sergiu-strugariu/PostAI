<script setup>
import SectionTitle from './SectionTitle.vue';
</script>

<template>
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <SectionTitle>
            <template #title>
                <h1 class="text-white"><slot name="title" /></h1>
            </template>
            <template #description>
                <h1 class="text-gray-500"><slot name="description" /></h1>
            </template>
        </SectionTitle>

        <div class="mt-5 md:mt-0 md:col-span-2">
            <div class="px-4 py-5 sm:p-6 bg-black bg-opacity-50 shadow sm:rounded-lg">
                <slot name="content" />
            </div>
        </div>
    </div>
</template>
