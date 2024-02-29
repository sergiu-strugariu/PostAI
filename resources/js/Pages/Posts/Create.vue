<script setup>
import UserLayout from '@/Layouts/UserLayout.vue';
import FromCard from '@/Components/Posts/FormCard.vue';
import PreviewCard from '@/Components/Posts/PreviewCard.vue';
import { useForm } from '@inertiajs/vue3'

</script>

<template>
    <UserLayout title="Posts">
        <div class="container mx-auto flex flex-col lg:flex-row gap-5 ">
            <FromCard :PostForm="FormData" :PreviewData="PreviewData" :dragState="dragAnimationState" />
            <PreviewCard :PreviewData="PreviewData" :formData="FormData" /> 
        </div>
    </UserLayout>
</template>

<script>

export default {
    data() {
        return {
            dragAnimationState: false,
            PreviewData: {
                ShowTags: false,
            },
            FormData: useForm({
                title: '',
                content: '',
                postDate: new Date(),
                dynamicTagsState: false,
                orderedFiles: [],
            }),

        };
    },
    methods: {

    },
    setup() {
        return {}
    },
}
</script>

