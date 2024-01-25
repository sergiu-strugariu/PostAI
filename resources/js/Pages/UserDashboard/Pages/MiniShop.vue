<script setup>
import UserLayout from '@/Layouts/UserLayout.vue';

import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';

import Options from './MiniShop/Options.vue';
import PrimaryButton from '@/Components/SecondaryButton.vue';

import { useForm } from '@inertiajs/vue3';

</script>

<template>
    <UserLayout>
        <div class="mx-auto max-w-4xl rounded-2xl py-6 px-6">
            <div class="mb-4">
                <p class="text-lg leading-8 text-cyan-500 font-extrabold sm:text-center">
                    Shop
                </p>
                <h1 class="text-4xl font-bold tracking-tight sm:text-center sm:text-6xl text-white">
                    <span class="text-blue-300">Boost</span> your <span class="text-green-300">post</span>
                </h1>
            </div>
            <div class="mb-4 w-full">
                <h1 class="text-2xl font-semibold tracking-wider text-white">
                    Please select the platform first.
                </h1>

                <p class=" text-gray-400">
                    Complete the requested informations to boost your post!
                </p>
            </div>

            <div class="rounded-xl" id="step-1" v-if="!options">
                <ul class="space-x-4 md:space-x-8 lg:space-x-12 font-medium flex flex-wrap items-center justify-center">
                    <li>
                        <div @click="this.platform = 'Instagram'"
                            class="flex items-center space-x-1 p-2 cursor-pointer text-gray-900 bg-gray-100 rounded-lg group"
                            :class="{ 'bg-red-500': platform === 'Instagram' }">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M12 18C15.3137 18 18 15.3137 18 12C18 8.68629 15.3137 6 12 6C8.68629 6 6 8.68629 6 12C6 15.3137 8.68629 18 12 18ZM12 16C14.2091 16 16 14.2091 16 12C16 9.79086 14.2091 8 12 8C9.79086 8 8 9.79086 8 12C8 14.2091 9.79086 16 12 16Z"
                                    fill="#000" />
                                <path
                                    d="M18 5C17.4477 5 17 5.44772 17 6C17 6.55228 17.4477 7 18 7C18.5523 7 19 6.55228 19 6C19 5.44772 18.5523 5 18 5Z"
                                    fill="#000" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M1.65396 4.27606C1 5.55953 1 7.23969 1 10.6V13.4C1 16.7603 1 18.4405 1.65396 19.7239C2.2292 20.8529 3.14708 21.7708 4.27606 22.346C5.55953 23 7.23969 23 10.6 23H13.4C16.7603 23 18.4405 23 19.7239 22.346C20.8529 21.7708 21.7708 20.8529 22.346 19.7239C23 18.4405 23 16.7603 23 13.4V10.6C23 7.23969 23 5.55953 22.346 4.27606C21.7708 3.14708 20.8529 2.2292 19.7239 1.65396C18.4405 1 16.7603 1 13.4 1H10.6C7.23969 1 5.55953 1 4.27606 1.65396C3.14708 2.2292 2.2292 3.14708 1.65396 4.27606ZM13.4 3H10.6C8.88684 3 7.72225 3.00156 6.82208 3.0751C5.94524 3.14674 5.49684 3.27659 5.18404 3.43597C4.43139 3.81947 3.81947 4.43139 3.43597 5.18404C3.27659 5.49684 3.14674 5.94524 3.0751 6.82208C3.00156 7.72225 3 8.88684 3 10.6V13.4C3 15.1132 3.00156 16.2777 3.0751 17.1779C3.14674 18.0548 3.27659 18.5032 3.43597 18.816C3.81947 19.5686 4.43139 20.1805 5.18404 20.564C5.49684 20.7234 5.94524 20.8533 6.82208 20.9249C7.72225 20.9984 8.88684 21 10.6 21H13.4C15.1132 21 16.2777 20.9984 17.1779 20.9249C18.0548 20.8533 18.5032 20.7234 18.816 20.564C19.5686 20.1805 20.1805 19.5686 20.564 18.816C20.7234 18.5032 20.8533 18.0548 20.9249 17.1779C20.9984 16.2777 21 15.1132 21 13.4V10.6C21 8.88684 20.9984 7.72225 20.9249 6.82208C20.8533 5.94524 20.7234 5.49684 20.564 5.18404C20.1805 4.43139 19.5686 3.81947 18.816 3.43597C18.5032 3.27659 18.0548 3.14674 17.1779 3.0751C16.2777 3.00156 15.1132 3 13.4 3Z"
                                    fill="#000" />
                            </svg>
                            <span class="text-black">Instagram</span>
                        </div>
                    </li>
                    <li>
                        <div @click="this.platform = 'Facebook'"
                            class="flex items-center space-x-1 p-2 cursor-pointer text-gray-900 bg-gray-100 rounded-lg group"
                            :class="{ 'bg-cyan-700': platform === 'Facebook' }">
                            <svg class="w-5 h-5 fill-black" :class="{ 'fill-white': platform === 'Facebook' }" version="1.1"
                                id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                viewBox="-143 145 512 512" xml:space="preserve">
                                <path d="M113,145c-141.4,0-256,114.6-256,256s114.6,256,256,256s256-114.6,256-256S254.4,145,113,145z M169.5,357.6l-2.9,38.3h-39.3
	v133H77.7v-133H51.2v-38.3h26.5v-25.7c0-11.3,0.3-28.8,8.5-39.7c8.7-11.5,20.6-19.3,41.1-19.3c33.4,0,47.4,4.8,47.4,4.8l-6.6,39.2
	c0,0-11-3.2-21.3-3.2c-10.3,0-19.5,3.7-19.5,14v29.9H169.5z" />
                            </svg>
                            <span class="text-black" :class="{ 'text-white': platform === 'Facebook' }">Facebook</span>
                        </div>
                    </li>
                    <li>
                        <div @click="this.platform = 'Twitter'"
                            class="flex items-center space-x-1 p-2 cursor-pointer text-gray-900 bg-gray-100 rounded-lg group"
                            :class="{ 'bg-gray-800': platform === 'Twitter' }">
                            <svg class="w-5 h-5" viewBox="0 0 1200 1227" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M714.163 519.284L1160.89 0H1055.03L667.137 450.887L357.328 0H0L468.492 681.821L0 1226.37H105.866L515.491 750.218L842.672 1226.37H1200L714.137 519.284H714.163ZM569.165 687.828L521.697 619.934L144.011 79.6944H306.615L611.412 515.685L658.88 583.579L1055.08 1150.3H892.476L569.165 687.854V687.828Z"
                                    class="fill-black" :class="{ 'fill-white': platform === 'Twitter' }" />
                            </svg>
                            <span class="text-black" :class="{ 'text-white': platform === 'Twitter' }">Twitter</span>
                        </div>
                    </li>
                    <li>
                        <div @click="this.platform = 'LinkedIn'"
                            class="flex items-center space-x-1 p-2 cursor-pointer text-gray-900 bg-gray-100 rounded-lg group"
                            :class="{ 'bg-blue-500': platform === 'LinkedIn' }">
                            <svg class="w-5 h-5 fill-black" :class="{ 'fill-white': platform === 'LinkedIn' }" version="1.1"
                                id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                viewBox="-143 145 512 512" xml:space="preserve">
                                <path d="M113,145c-141.4,0-256,114.6-256,256s114.6,256,256,256s256-114.6,256-256S254.4,145,113,145z M41.4,508.1H-8.5V348.4h49.9
	V508.1z M15.1,328.4h-0.4c-18.1,0-29.8-12.2-29.8-27.7c0-15.8,12.1-27.7,30.5-27.7c18.4,0,29.7,11.9,30.1,27.7
	C45.6,316.1,33.9,328.4,15.1,328.4z M241,508.1h-56.6v-82.6c0-21.6-8.8-36.4-28.3-36.4c-14.9,0-23.2,10-27,19.6
	c-1.4,3.4-1.2,8.2-1.2,13.1v86.3H71.8c0,0,0.7-146.4,0-159.7h56.1v25.1c3.3-11,21.2-26.6,49.8-26.6c35.5,0,63.3,23,63.3,72.4V508.1z
	" />
                            </svg>
                            <span class="text-black" :class="{ 'text-white': platform === 'LinkedIn' }">LinkedIn</span>
                        </div>
                    </li>
                    <li>
                        <div @click="this.platform = 'TikTok'"
                            class="flex items-center space-x-1 p-2 cursor-pointer text-gray-900 bg-gray-100 rounded-lg group"
                            :class="{ 'bg-gray-800': platform === 'TikTok' }">
                            <svg class="w-5 h-5 fill-black" :class="{ 'fill-white': platform === 'TikTok' }"
                                viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M16.656 1.029c1.637-0.025 3.262-0.012 4.886-0.025 0.054 2.031 0.878 3.859 2.189 5.213l-0.002-0.002c1.411 1.271 3.247 2.095 5.271 2.235l0.028 0.002v5.036c-1.912-0.048-3.71-0.489-5.331-1.247l0.082 0.034c-0.784-0.377-1.447-0.764-2.077-1.196l0.052 0.034c-0.012 3.649 0.012 7.298-0.025 10.934-0.103 1.853-0.719 3.543-1.707 4.954l0.020-0.031c-1.652 2.366-4.328 3.919-7.371 4.011l-0.014 0c-0.123 0.006-0.268 0.009-0.414 0.009-1.73 0-3.347-0.482-4.725-1.319l0.040 0.023c-2.508-1.509-4.238-4.091-4.558-7.094l-0.004-0.041c-0.025-0.625-0.037-1.25-0.012-1.862 0.49-4.779 4.494-8.476 9.361-8.476 0.547 0 1.083 0.047 1.604 0.136l-0.056-0.008c0.025 1.849-0.050 3.699-0.050 5.548-0.423-0.153-0.911-0.242-1.42-0.242-1.868 0-3.457 1.194-4.045 2.861l-0.009 0.030c-0.133 0.427-0.21 0.918-0.21 1.426 0 0.206 0.013 0.41 0.037 0.61l-0.002-0.024c0.332 2.046 2.086 3.59 4.201 3.59 0.061 0 0.121-0.001 0.181-0.004l-0.009 0c1.463-0.044 2.733-0.831 3.451-1.994l0.010-0.018c0.267-0.372 0.45-0.822 0.511-1.311l0.001-0.014c0.125-2.237 0.075-4.461 0.087-6.698 0.012-5.036-0.012-10.060 0.025-15.083z">
                                </path>
                            </svg>
                            <span class="text-black" :class="{ 'text-white': platform === 'TikTok' }">TikTok</span>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="mt-6" v-if="platform">
                <TextInput id="post_url" placeholder="Enter your post URL" type="text" v-if="!options"
                    class="mt-1 block w-full bg-gray-800 bg-opacity-50 text-white focus:ring-1 focus:ring-white/80 rounded ring-0 border-none"
                    v-model="form.post_url" required autocomplete="post_url" />

                <div v-else>
                    <TextInput id="post_url" placeholder="Enter your post URL" type="text" v-if="options" disabled
                        class="mt-1 block w-full bg-gray-800 ring-4 ring-red-500 bg-opacity-50 text-white focus:ring-1 focus:ring-white/80 rounded border-none"
                        v-model="form.post_url" required autocomplete="post_url" />
                </div>

                <div v-if="errors && step == 1" class="mb-4">
                    <div v-if="errors.status" class="bg-gray-700 overflow-hidden shadow-sm rounded-lg mt-4">
                        <div class="p-6 text-white font-bold">
                            {{ errors.message ?? form.errors.post_url }}
                        </div>
                    </div>
                    <div v-else class="bg-black bg-opacity-50 overflow-hidden shadow-sm rounded-lg mt-4">
                        <div class="p-6 text-red-500 font-bold">
                            {{ errors.message ?? form.errors.post_url }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mx-auto max-w-xl flex justify-center rounded-2xl px-2 pb-12" v-if="!options">
            <button @click="handleUrl()"
                class="px-8 py-4 text-sm bg-gradient-to-r from-blue-500 to-purple-500 text-white font-bold rounded-full transition-transform transform-gpu hover:-translate-y-1 hover:shadow-lg">
                Confirm Link
            </button>
        </div>

        <div class="mx-auto max-w-7xl">
            <div v-if="options && step == 1">
                <div class="flex justify-center space-x-6">
                    <button @click="options = null"
                        class="px-8 py-4 text-sm bg-gradient-to-r from-blue-500 to-purple-500 text-white font-bold rounded-full transition-transform transform-gpu hover:-translate-y-1 hover:shadow-lg">
                        Change Post
                    </button>
                    <button @click="nextStep(2)"
                        class="px-8 py-4 text-sm bg-gradient-to-r from-red-500 to-purple-900 text-white font-bold rounded-full transition-transform transform-gpu hover:-translate-y-1 hover:shadow-lg">
                        Proceed to checkout
                    </button>
                </div>
                <Options :platform="platform" />
            </div>
        </div>

        <div class="mx-auto max-w-4xl">
            <div v-if="step == 2">
                <div class="flex justify-center space-x-6">
                    <button @click="step = 1"
                        class="px-8 py-4 text-sm bg-gradient-to-r from-blue-500 to-purple-500 text-white font-bold rounded-full transition-transform transform-gpu hover:-translate-y-1 hover:shadow-lg">
                        Previous
                    </button>
                </div>
            </div>

            <div class="mt-4 bg-gray-900 bg-opacity-50 p-4 rounded-2xl" v-if="step == 2">
                <form @confirmOrder.prevent="confirmOrder">
                    <div class="px-12 py-4">
                        <div v-if="errors && step == 2" class="mb-4">
                            <div v-if="errors.status" class="bg-gray-700 overflow-hidden shadow-sm rounded-lg mt-4">
                                <div class="p-6 text-white font-bold">
                                    {{ errors.message ?? form.errors.post_url }}
                                </div>
                            </div>
                            <div v-else class="bg-black bg-opacity-50 overflow-hidden shadow-sm rounded-lg mt-4">
                                <div class="p-6 text-red-500 font-bold">
                                    {{ errors.message ?? form.errors.post_url }}
                                </div>
                            </div>
                        </div>
                        <h1 class="text-4xl text-white">Checkout</h1>
                        <p class="text-gray-400">Please provide an email addres for contacting you about the order.</p>
                        <div class="mt-4">
                            <TextInput id="email" placeholder="Email address" type="email" v-model="form_order.email"
                                class="mt-1 block w-full bg-gray-800 bg-opacity-50 text-white focus:ring-1 focus:ring-white/80 rounded ring-0 border-none"
                                required />
                            <InputError class="mt-2" :message="form_order.errors.email" />

                        </div>

                        <div class="mt-4 mb-4">
                            <div class="flex justify-between">
                                <div>Likes</div>
                                <div>${{ likesValue }}</div>
                            </div>
                            <div class="flex justify-between">
                                <div>Comments</div>
                                <div>${{ commentsValue }}</div>
                            </div>
                            <div class="flex justify-between">
                                <div>Shares</div>
                                <div>${{ sharesValue }}</div>
                            </div>
                            <div class="flex justify-between">
                                <div>Saves</div>
                                <div>${{ savesValue }}</div>
                            </div>
                        </div>

                        <hr>

                        <div class="mt-4">
                            <div class="flex justify-between text-2xl">
                                <div>Total</div>
                                <div>${{ total }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end mt-4">
                        <PrimaryButton @click="confirmOrder()" class="ms-4" :class="{ 'opacity-25': form_order.processing }"
                            :disabled="form_order.processing">
                            Confirm
                        </PrimaryButton>
                    </div>
                </form>
            </div>

            <div class="mx-auto max-w-4xl" v-if="step == 3">
                <div class="px-12 py-4 bg-gray-900 rounded-2xl">
                    <h1 class="text-2xl text-green-400">Your order has been place successfully.</h1>
                    <p class="text-gray-300">We were gonna contact you about the order by email.</p>
                    <p class="text-gray-300">You can see your order status <a :href="route('minishop.orders')" class="underline">here</a>.</p>
                </div>
            </div>
        </div>
    </UserLayout>
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
            app_name: import.meta.env.VITE_APP_NAME,
            step: 1,
            platform: null,
            errors: null,
            options: false,

            likesValue: 0,
            commentsValue: 0,
            sharesValue: 0,
            savesValue: 0,

            likesUnits: 0,
            commentsUnits: 0,
            sharesUnits: 0,
            savesUnits: 0,

            form: useForm({
                post_url: '',
                platform: '',
            }),

            form_order: useForm({
                email: '',
                post_url: '',
                likesValue: 0,
                commentsValue: 0,
                sharesValue: 0,
                savesValue: 0,

                likesUnits: 0,
                commentsUnits: 0,
                sharesUnits: 0,
                savesUnits: 0,
                total: 0,
            }),
        }
    },

    methods: {
        handleUrl() {
            this.form.platform = this.platform;

            this.form.post(route('minishop.checkUrl'), {
                onSuccess: () => [this.errors = null, this.options = true],
                onError: (error) => [this.errors = error, this.options = false],
                onFinish: () => [],
            });
        },

        confirmOrder() {
            this.form_order.likesValue = this.likesValue;
            this.form_order.commentsValue = this.commentsValue;
            this.form_order.sharesValue = this.sharesValue;
            this.form_order.savesValue = this.savesValue;
            this.form_order.total = this.total;

            this.form_order.likesUnits = this.likesUnits;
            this.form_order.commentsUnits = this.commentsUnits;
            this.form_order.sharesUnits = this.sharesUnits;
            this.form_order.savesUnits = this.savesUnits;

            this.form_order.post_url = this.form.post_url

            this.form_order.post(route('minishop.order'), {
                onSuccess: () => [this.errors = null, this.step = 3],
                onError: (error) => [this.errors = error],
                onFinish: () => [],
            });
        },

        nextStep(step) {
            switch (step) {
                case 2:
                    this.likesValue = parseFloat(document.getElementById('likes').getAttribute('data-price')) || 0;
                    this.commentsValue = parseFloat(document.getElementById('comments').getAttribute('data-price')) || 0;
                    this.sharesValue = parseFloat(document.getElementById('shares').getAttribute('data-price')) || 0;
                    this.savesValue = parseFloat(document.getElementById('saves').getAttribute('data-price')) || 0;

                    this.likesUnits = document.getElementById('likes').getAttribute('data-units') || 0;
                    this.commentsUnits = document.getElementById('comments').getAttribute('data-units') || 0;
                    this.sharesUnits = document.getElementById('shares').getAttribute('data-units') || 0;
                    this.savesUnits = document.getElementById('saves').getAttribute('data-units') || 0;

                    this.total = this.likesValue + this.commentsValue + this.sharesValue + this.savesValue;

                    this.step = 2;
                    break;

                default:
                    break;
            }
        }
    },
}
</script>