<script setup>
import UserLayout from '@/Layouts/UserLayout.vue';
import FromCard from '@/Components/Posts/FormCard.vue';
import PreviewCard from '@/Components/Posts/PreviewCard.vue';
</script>

<template>
    <UserLayout title="Posts">
        <div class="container mx-auto flex flex-col lg:flex-row gap-5 ">
            <FromCard :PostForm="PostForm" :PreviewData="PreviewData" :dragAnimationState="dragAnimationState" />
            <PreviewCard :PreviewData="PreviewData" :formData="PostForm"/>
        </div>
    </UserLayout>
</template>

<script>

export default {
    data() {
        return {
            dragAnimationState: false,
            PostForm: {
                title: '',
                content: '',
                images: null,
                postDate: new Date(),
                dynamicTagsState: false,
                orderedFiles: [],
            },
            PreviewData: {
                ShowTags: false,
            }
        };
    },
    setup() {
        return {}
    },
}
</script>

