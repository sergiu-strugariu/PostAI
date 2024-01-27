<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

</script>

<template>
    <AppLayout>
        <div class="flex justify-center pt-20 pb-32 sm:pt-48 sm:pb-40">
            <div class="hidden bg-cover lg:block lg:w-2/3 ">
                <div class="flex items-center h-full px-20 bg-black ">
                    <div>
                        <h2 class="text-4xl font-bold text-white">{{ app_name }}</h2>

                        <p class="max-w-xl mt-3 text-gray-300">
                            Welcome back to our platform! Don't forget to check your notifications as soon as you log in
                            – you might have missed something important
                        </p>
                    </div>
                </div>
            </div>

            <div class="flex items-center w-full max-w-md mx-auto lg:w-2/6 bg-black mt-24">
                <div class="flex-1">
                    <div class="text-center">
                        <h2 class="text-6xl font-bold text-center text-white">{{ app_name }}</h2>

                        <p class="mt-3 text-gray-500 ">Log in to access your account.</p>
                    </div>

                    <div class="mt-8">
                        <form @submit.prevent="submit">
                            <div>
                                <InputLabel for="email" value="Email Address" class="text-white" />

                                <TextInput id="email" type="email" class="mt-1 block w-full text-white rounded-lg"
                                    placeholder="email@example.com" v-model="form.email" required autofocus
                                    autocomplete="username" />

                                <InputError class="mt-2" :message="form.errors.email" />
                            </div>

                            <div class="mt-4">
                                <InputLabel for="password" value="Password" class="text-white" />

                                <TextInput id="password" type="password" class="mt-1 block w-full text-white rounded-lg"
                                    placeholder="Parola" v-model="form.password" required autocomplete="current-password" />

                                <InputError class="mt-2" :message="form.errors.password" />
                            </div>

                            <div class="flex flex-col sm:flex-row justify-between items-center  text-center mt-4">
                                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing"
                                    class="mb-4 sm:mb-0 sm:mr-4">
                                    Sign In
                                </PrimaryButton>
                                <div class="flex flex-col sm:flex-row items-center">
                                    <div class="mb-4 sm:mb-0 sm:mr-4">
                                        <p class="text-sm text-gray-400">Don't have an account?
                                            <a :href="route('register')" class="text-blue-500 underline font-extrabold">Sign
                                                Up</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>


<script>
export default {
    props: {
        canResetPassword: Boolean,
        status: String,
    },

    data() {
        return {
            app_name: import.meta.env.VITE_APP_NAME,

            form: useForm({
                email: '',
                password: '',
                remember: false,
            }),
        }
    },

    methods: {
        submit() {
            this.form.transform(data => ({
                ...data,
                remember: this.form.remember ? 'on' : '',
            })).post(route('login'), {
                onFinish: () => this.form.reset('password'),
            });
        }
    },
}
</script>