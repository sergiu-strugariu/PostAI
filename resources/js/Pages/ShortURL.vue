<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';

import PrimaryButton from '@/Components/SecondaryButton.vue';

import { useForm } from '@inertiajs/vue3';
</script>

<template>
    <AppLayout>
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
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.5"
                                d="M3.46447 20.5355C4.92893 22 7.28595 22 12 22C16.714 22 19.0711 22 20.5355 20.5355C22 19.0711 22 16.714 22 12C22 7.28595 22 4.92893 20.5355 3.46447C19.0711 2 16.714 2 12 2C7.28595 2 4.92893 2 3.46447 3.46447C2 4.92893 2 7.28595 2 12C2 16.714 2 19.0711 3.46447 20.5355Z"
                                fill="#FFF" />
                            <path
                                d="M9.5 8.75C7.70507 8.75 6.25 10.2051 6.25 12C6.25 13.7949 7.70507 15.25 9.5 15.25C11.2949 15.25 12.75 13.7949 12.75 12C12.75 11.5858 13.0858 11.25 13.5 11.25C13.9142 11.25 14.25 11.5858 14.25 12C14.25 14.6234 12.1234 16.75 9.5 16.75C6.87665 16.75 4.75 14.6234 4.75 12C4.75 9.37665 6.87665 7.25 9.5 7.25C9.91421 7.25 10.25 7.58579 10.25 8C10.25 8.41421 9.91421 8.75 9.5 8.75Z"
                                fill="#FFF" />
                            <path
                                d="M17.75 12C17.75 13.7949 16.2949 15.25 14.5 15.25C14.0858 15.25 13.75 15.5858 13.75 16C13.75 16.4142 14.0858 16.75 14.5 16.75C17.1234 16.75 19.25 14.6234 19.25 12C19.25 9.37665 17.1234 7.25 14.5 7.25C11.8766 7.25 9.75 9.37665 9.75 12C9.75 12.4142 10.0858 12.75 10.5 12.75C10.9142 12.75 11.25 12.4142 11.25 12C11.25 10.2051 12.7051 8.75 14.5 8.75C16.2949 8.75 17.75 10.2051 17.75 12Z"
                                fill="#FFF" />
                        </svg>
                    </div>
                    <input v-model="form.original_url"
                        class="block w-full p-5 ps-10 text-sm text-white ring-0 border-none rounded-full bg-black bg-opacity-50"
                        placeholder="Link" required>
                    <button type="submit" :class="{ 'opacity-25': form.processing }" :disabled="form.processing"
                        class="text-white absolute end-2.5 bottom-1 rounded-full bg-blue-700  hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium text-sm px-12 py-4">
                        Create
                    </button>

                </div>
                <InputError class="mt-2" :message="form.errors.original_url" />


                <h1 class="mt-12 font-extrabold text-gray-400 px-6">Pixel Tracking (Optional)</h1>

                <div>
                    <textarea id="message" rows="15" v-model="form.pixel_script"
                        class="block p-2.5 mt-4 w-full text-sm text-white bg-gray-900 bg-opacity-50 rounded-lg border border-gray-800 focus:ring-gray-500 focus:border-gray-500"
                        placeholder="Pixel Script"></textarea>
                </div>
            </form>
        </div>
    </AppLayout>
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
                pixel_script: '',
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
        },
    },
}
</script>