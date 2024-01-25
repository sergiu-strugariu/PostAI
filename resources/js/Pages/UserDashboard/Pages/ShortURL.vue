<script setup>
import UserLayout from '@/Layouts/UserLayout.vue';

import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';

import PrimaryButton from '@/Components/SecondaryButton.vue';

import { useForm } from '@inertiajs/vue3';
</script>

<template>
    <UserLayout>
        <div class="mx-auto max-w-4xl rounded-2xl py-6 px-6">
            <div class="mb-4">
                <div v-if="!short_url">
                    <p class="text-lg leading-8 text-cyan-500 font-extrabold sm:text-center">
                        Short Linker
                    </p>
                    <h1 class="text-2xl font-bold tracking-tight sm:text-center sm:text-5xl text-white">
                        <span class="text-green-400">Sometimes</span> smaller is <span class="text-blue-400">better</span>
                        ;)
                    </h1>
                </div>

                <div v-else>
                    <p class="text-lg leading-8 text-cyan-500 font-extrabold sm:text-center">
                        You're short link is here!
                    </p>
                    <h1 class="text-2xl font-bold tracking-tight sm:text-center sm:text-5xl text-red-500">
                        {{ short_url }}
                    </h1>
                </div>

            </div>
            <div class="mb-4 w-full">
                <h1 class="text-2xl font-semibold tracking-wider text-white">
                    Please provide a valid link
                </h1>

                <p class=" text-gray-400">
                    Complete the requested informations for creating a short url!
                </p>
            </div>
        </div>

        <div class="mx-auto max-w-4xl">
            <form @submit.prevent="submit">

                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input v-model="form.original_url"
                        class="block w-full p-5 ps-10 text-sm text-white border-2 border-blue-400 rounded-full bg-black bg-opacity-50 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Link" required>
                    <button type="submit" :class="{ 'opacity-25': form.processing }" :disabled="form.processing"
                        class="text-white absolute end-2.5 bottom-1.5 rounded-full bg-blue-600  hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium text-sm px-12 py-4">
                        Create
                    </button>
                </div>

                <InputError class="mt-2" :message="form.errors.original_url" />
            </form>
        </div>
    </UserLayout>
</template>

<script>
export default {

    props: {
        short_url: String
    },

    data() {
        return {
            form: useForm({
                original_url: '',
            }),
        }
    },

    methods: {
        submit() {
            this.form.post(route('shortUrlStore'), {
                onSuccess: () => [],
                onError: (error) => [],
                onFinish: () => [],
            });
        }
    },
}
</script>