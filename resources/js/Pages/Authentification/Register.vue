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
        <div class="mx-auto max-w-xl pt-20 pb-32 sm:pt-48 sm:pb-40">
            <div class="w-full">
                <div class="text-center">
                    <h1 class="text-4xl font-bold tracking-tight sm:text-center sm:text-6xl text-white">
                        Create Account
                    </h1>
                </div>

                <div class="mt-10">
                    <h1 class="text-2xl font-semibold tracking-wider text-white">
                        Create your account now with just one click.
                    </h1>

                    <p class="mt-4 text-gray-400">
                        Complete the requested information to create an account!
                    </p>
                </div>

                <form @submit.prevent="submit">
                    <div class="mt-4">
                        <InputLabel for="name" value="First Name" class="text-white" />

                        <TextInput id="name" placeholder="John Watson" type="text" class="mt-1 block text-white w-full rounded-lg"
                            v-model="form.name" required autocomplete="name" />

                        <InputError class="mt-2" :message="form.errors.name" />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="email" value="Email" class="text-white" />

                        <TextInput id="email" placeholder="email@example.com" type="email" class="mt-1 text-white block w-full rounded-lg"
                            v-model="form.email" required autocomplete="email" />

                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2  gap-4 mt-4">
                        <div>
                            <InputLabel for="password" value="Password" class="text-white" />

                            <TextInput id="password" type="password" placeholder="Password" class="mt-1 block text-white w-full rounded-lg"
                                v-model="form.password" required autocomplete="new-password" />

                            <InputError class="mt-2" :message="form.errors.password" />
                        </div>
                        <div>
                            <InputLabel for="password_confirmation" value="Confirm Password" class="text-white" />

                            <TextInput id="password_confirmation" type="password" placeholder="Repeat Password"
                                class="mt-1 block text-white w-full rounded-lg" v-model="form.password_confirmation" required
                                autocomplete="new-password" />

                            <InputError class="mt-2" :message="form.errors.password_confirmation" />
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row justify-between items-center text-center mt-4">
                        <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing"
                            class="mb-4 sm:mb-0 sm:mr-4">
                            Sign Up
                        </PrimaryButton>
                        <div class="flex flex-col sm:flex-row items-center">
                            <div class="mb-4 sm:mb-0 sm:mr-4">
                                <p class="text-sm text-gray-400">Do you already have an account?
                                    <a :href="route('login')" class="text-blue-500 underline font-extrabold">Sign In</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </AppLayout>
</template>


<script>

export default {
    props: {
        warning: Array,
    },

    data() {
        return {
            form: useForm({
                name: '',
                email: '',
                password: '',
                password_confirmation: '',
                terms: false,
            }),
        }
    },

    methods: {
        submit() {
            this.form.post(route('register'), {
                onFinish: () => this.form.reset('password', 'password_confirmation'),
            });
        }
    },
}

</script>