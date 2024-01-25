<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';

import PrimaryButton from '@/Components/PrimaryButton.vue';

import { useForm } from '@inertiajs/vue3';

</script>

<template>
    <AdminLayout>
        <div class="max-w-7xl mx-auto">
            <h1 class="text-4xl font-extrabold">Mini Shop Pricing</h1>

            <div class="bg-white rounded-xl p-4 mt-6">
                <h1 class="text-xl">Update Prices</h1>
                <form @submit.prevent="submit">

                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-4 mt-6">
                        <div class="bg-gray-200 p-2 rounded-lg py-6">
                            <div class="flex justify-between items-center px-6">
                                <h1 class="text-2xl font-extrabold">Likes</h1>

                                <svg fill="#000" stroke="3.5" height="24" viewBox="0 0 48 48" width="24">
                                    <path
                                        d="M34.6 6.1c5.7 0 10.4 5.2 10.4 11.5 0 6.8-5.9 11-11.5 16S25 41.3 24 41.9c-1.1-.7-4.7-4-9.5-8.3-5.7-5-11.5-9.2-11.5-16C3 11.3 7.7 6.1 13.4 6.1c4.2 0 6.5 2 8.1 4.3 1.9 2.6 2.2 3.9 2.5 3.9.3 0 .6-1.3 2.5-3.9 1.6-2.3 3.9-4.3 8.1-4.3m0-3c-4.5 0-7.9 1.8-10.6 5.6-2.7-3.7-6.1-5.5-10.6-5.5C6 3.1 0 9.6 0 17.6c0 7.3 5.4 12 10.6 16.5.6.5 1.3 1.1 1.9 1.7l2.3 2c4.4 3.9 6.6 5.9 7.6 6.5.5.3 1.1.5 1.6.5.6 0 1.1-.2 1.6-.5 1-.6 2.8-2.2 7.8-6.8l2-1.8c.7-.6 1.3-1.2 2-1.7C42.7 29.6 48 25 48 17.6c0-8-6-14.5-13.4-14.5z">
                                    </path>
                                </svg>
                            </div>

                            <div class="px-6 mt-4">
                                <input type="text" v-model="form.likes_price" :placeholder="likes_price"
                                    class="border p-2 rounded ring-0 border-none w-full">
                            </div>
                        </div>
                        <div class="bg-gray-200 p-2 rounded-lg py-6">
                            <div class="flex justify-between items-center px-6">
                                <h1 class="text-2xl font-extrabold">Comments</h1>

                                <svg fill="#000" height="24" viewBox="0 0 48 48" width="24">
                                    <path clip-rule="evenodd"
                                        d="M47.5 46.1l-2.8-11c1.8-3.3 2.8-7.1 2.8-11.1C47.5 11 37 .5 24 .5S.5 11 .5 24 11 47.5 24 47.5c4 0 7.8-1 11.1-2.8l11 2.8c.8.2 1.6-.6 1.4-1.4zm-3-22.1c0 4-1 7-2.6 10-.2.4-.3.9-.2 1.4l2.1 8.4-8.3-2.1c-.5-.1-1-.1-1.4.2-1.8 1-5.2 2.6-10 2.6-11.4 0-20.6-9.2-20.6-20.5S12.7 3.5 24 3.5 44.5 12.7 44.5 24z"
                                        fill-rule="evenodd"></path>
                                </svg>
                            </div>

                            <div class="px-6 mt-4">
                                <input type="text" v-model="form.comments_price" :placeholder="comments_price"
                                    class="border p-2 rounded ring-0 border-none w-full">
                            </div>
                        </div>

                        <div class="bg-gray-200 p-2 rounded-lg py-6">
                            <div class="flex justify-between items-center px-6">
                                <h1 class="text-2xl font-extrabold">Shares</h1>

                                <svg fill="#000" height="24" viewBox="0 0 48 48" width="24">
                                    <path
                                        d="M47.8 3.8c-.3-.5-.8-.8-1.3-.8h-45C.9 3.1.3 3.5.1 4S0 5.2.4 5.7l15.9 15.6 5.5 22.6c.1.6.6 1 1.2 1.1h.2c.5 0 1-.3 1.3-.7l23.2-39c.4-.4.4-1 .1-1.5zM5.2 6.1h35.5L18 18.7 5.2 6.1zm18.7 33.6l-4.4-18.4L42.4 8.6 23.9 39.7z">
                                    </path>
                                </svg>
                            </div>

                            <div class="px-6 mt-4">
                                <input type="text" v-model="form.shares_price" :placeholder="shares_price"
                                    class="border p-2 rounded ring-0 border-none w-full">
                            </div>
                        </div>

                        <div class="bg-gray-200 p-2 rounded-lg py-6">
                            <div class="flex justify-between items-center px-6">
                                <h1 class="text-2xl font-extrabold">Shares</h1>

                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19 19.2674V7.84496C19 5.64147 17.4253 3.74489 15.2391 3.31522C13.1006 2.89493 10.8994 2.89493 8.76089 3.31522C6.57467 3.74489 5 5.64147 5 7.84496V19.2674C5 20.6038 6.46752 21.4355 7.63416 20.7604L10.8211 18.9159C11.5492 18.4945 12.4508 18.4945 13.1789 18.9159L16.3658 20.7604C17.5325 21.4355 19 20.6038 19 19.2674Z"
                                        stroke="#000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>

                            <div class="px-6 mt-4">
                                <input type="text" v-model="form.saves_price" :placeholder="saves_price"
                                    class="border p-2 rounded ring-0 border-none w-full">
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing"
                            class="mt-4 sm:mb-0 sm:mr-4">
                            Update
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </AdminLayout>
</template>

<script>
export default {
    props: {
        likes_price: Number,
        comments_price: Number,
        shares_price: Number,
        saves_price: Number
    },

    data() {
        return {
            form: useForm({
                likes_price: null,
                comments_price: null,
                shares_price: null,
                saves_price: null,
            }),
        }
    },

    methods: {
        submit() {
            this.form.post(route('admin.minishop.post'), {
                onFinish: () => form.reset('likes_price', 'comments_price', 'shares_price', 'saves_price'),
            });
        }
    },
}
</script>