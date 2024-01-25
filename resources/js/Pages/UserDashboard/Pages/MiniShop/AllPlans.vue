<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
</script>

<template>
    <div class="py-2 px-2 overflow-hidden ease duration-500">
        <div class="isolate mx-auto mt-10 grid max-w-md grid-cols-1 gap-8 lg:mx-0 lg:max-w-none lg:grid-cols-4">
            <div class="bg-white/5 ring-2 ring-indigo-500 rounded-3xl p-8 xl:p-10">
                <div class="flex items-center justify-between gap-x-4">
                    <div class="flex items-center space-x-2">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10 15.5C9.3627 16.603 8.99715 17 7.49786 17C5.49881 17 3 15.4038 3 12.7143C3 9.71425 4.72398 8.00004 7.49786 8C12.058 7.99993 11.496 17 16.4936 17C19.5997 17 20.8679 14.9635 20.9914 12.7143C21.122 10.3382 19.7654 8 16.4936 8C14.4945 8 14.1091 8.42857 13.5 9.5"
                                stroke="#FFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <h2 id="product2" class="text-lg font-semibold leading-8 text-white">Likes</h2>
                    </div>
                    <p class="rounded-full bg-indigo-500 px-2.5 py-1 text-xs font-semibold leading-5 text-white" id="likes" :data-price="likes_price" :data-units="likes">
                        $ {{ likes_price }}</p>
                </div>
                <p class="mt-4 text-sm leading-6 text-gray-300">The most popular choice. Product details for
                    Product</p>
                <p class="mt-6 flex items-baseline gap-x-1">
                <div>
                    <TextInput  @input="handleUnits('likes')" placeholder="1000" type="number" min="1"
                        pattern="[1-9][1-9]*"
                        class="mt-1 block w-full bg-black text-white rounded-3xl ring-1 ring-white/30 border-none"
                        v-model="likes" autocomplete="likes" />

                    <!-- <InputError class="mt-2" :message="likes" /> -->
                </div>
                </p>
                <ul role="list" class="mt-8 space-y-3 text-sm leading-6 text-gray-300 xl:mt-10">
                    <li class="flex gap-x-3"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true" class="h-6 w-5 flex-none text-white">
                            <path fill-rule="evenodd"
                                d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                clip-rule="evenodd"></path>
                        </svg>How many units you want</li>
                    <li class="flex gap-x-3"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true" class="h-6 w-5 flex-none text-white">
                            <path fill-rule="evenodd"
                                d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                clip-rule="evenodd"></path>
                        </svg>Fast delivery</li>
                </ul>
            </div>

            <div class="bg-white/5 ring-2 ring-indigo-500 rounded-3xl p-8 xl:p-10">
                <div class="flex items-center justify-between gap-x-4">
                    <div class="flex items-center space-x-2">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10 15.5C9.3627 16.603 8.99715 17 7.49786 17C5.49881 17 3 15.4038 3 12.7143C3 9.71425 4.72398 8.00004 7.49786 8C12.058 7.99993 11.496 17 16.4936 17C19.5997 17 20.8679 14.9635 20.9914 12.7143C21.122 10.3382 19.7654 8 16.4936 8C14.4945 8 14.1091 8.42857 13.5 9.5"
                                stroke="#FFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <h2 id="product2" class="text-lg font-semibold leading-8 text-white">Comments</h2>
                    </div>
                    <p class="rounded-full bg-indigo-500 px-2.5 py-1 text-xs font-semibold leading-5 text-white" id="comments" :data-price="comments_price" :data-units="comments"> 
                        $ {{ comments_price }}</p>
                </div>
                <p class="mt-4 text-sm leading-6 text-gray-300">The most popular choice. Product details for
                    Product</p>
                <p class="mt-6 flex items-baseline gap-x-1">
                <div>
                    <TextInput placeholder="1000" type="number" min="1" @input="handleUnits('comments')"
                        class="mt-1 block w-full bg-black text-white rounded-3xl ring-1 ring-white/30 border-none"
                        v-model="comments" autocomplete="comments" />

                    <!-- <InputError class="mt-2" :message="comments" /> -->
                </div>
                </p>
                <ul role="list" class="mt-8 space-y-3 text-sm leading-6 text-gray-300 xl:mt-10">
                    <li class="flex gap-x-3"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true" class="h-6 w-5 flex-none text-white">
                            <path fill-rule="evenodd"
                                d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                clip-rule="evenodd"></path>
                        </svg>How many units you want</li>
                    <li class="flex gap-x-3"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true" class="h-6 w-5 flex-none text-white">
                            <path fill-rule="evenodd"
                                d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                clip-rule="evenodd"></path>
                        </svg>Fast delivery</li>
                </ul>
            </div>

            <div class="bg-white/5 ring-2 ring-indigo-500 rounded-3xl p-8 xl:p-10">
                <div class="flex items-center justify-between gap-x-4">
                    <div class="flex items-center space-x-2">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10 15.5C9.3627 16.603 8.99715 17 7.49786 17C5.49881 17 3 15.4038 3 12.7143C3 9.71425 4.72398 8.00004 7.49786 8C12.058 7.99993 11.496 17 16.4936 17C19.5997 17 20.8679 14.9635 20.9914 12.7143C21.122 10.3382 19.7654 8 16.4936 8C14.4945 8 14.1091 8.42857 13.5 9.5"
                                stroke="#FFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <h2 id="product2" class="text-lg font-semibold leading-8 text-white">Shares</h2>
                    </div>
                    <p class="rounded-full bg-indigo-500 px-2.5 py-1 text-xs font-semibold leading-5 text-white" id="shares" :data-price="shares_price" :data-units="shares">
                        $ {{ shares_price }}</p>
                </div>
                <p class="mt-4 text-sm leading-6 text-gray-300">The most popular choice. Product details for
                    Product</p>
                <p class="mt-6 flex items-baseline gap-x-1">
                <div>
                    <TextInput placeholder="1000" type="number" min="1" @input="handleUnits('shares')"
                        class="mt-1 block w-full bg-black text-white rounded-3xl ring-1 ring-white/30 border-none"
                        v-model="shares" autocomplete="shares" />

                    <!-- <InputError class="mt-2" :message="shares" /> -->
                </div>
                </p>
                <ul role="list" class="mt-8 space-y-3 text-sm leading-6 text-gray-300 xl:mt-10">
                    <li class="flex gap-x-3"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true" class="h-6 w-5 flex-none text-white">
                            <path fill-rule="evenodd"
                                d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                clip-rule="evenodd"></path>
                        </svg>How many units you want</li>
                    <li class="flex gap-x-3"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true" class="h-6 w-5 flex-none text-white">
                            <path fill-rule="evenodd"
                                d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                clip-rule="evenodd"></path>
                        </svg>Fast delivery</li>
                </ul>
            </div>
            <div class="bg-white/5 ring-2 ring-indigo-500 rounded-3xl p-8 xl:p-10">
                <div class="flex items-center justify-between gap-x-4">
                    <div class="flex items-center space-x-2">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10 15.5C9.3627 16.603 8.99715 17 7.49786 17C5.49881 17 3 15.4038 3 12.7143C3 9.71425 4.72398 8.00004 7.49786 8C12.058 7.99993 11.496 17 16.4936 17C19.5997 17 20.8679 14.9635 20.9914 12.7143C21.122 10.3382 19.7654 8 16.4936 8C14.4945 8 14.1091 8.42857 13.5 9.5"
                                stroke="#FFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <h2 id="product2" class="text-lg font-semibold leading-8 text-white">Saves</h2>
                    </div>
                    <p class="rounded-full bg-indigo-500 px-2.5 py-1 text-xs font-semibold leading-5 text-white" id="saves" :data-price="saves_price" :data-units="saves">
                        $ {{ saves_price }}</p>
                </div>
                <p class="mt-4 text-sm leading-6 text-gray-300">The most popular choice. Product details for
                    Product</p>
                <p class="mt-6 flex items-baseline gap-x-1">
                <div>
                    <TextInput placeholder="1000" type="number" min="1" @input="handleUnits('saves')"
                        class="mt-1 block w-full bg-black text-white rounded-3xl ring-1 ring-white/30 border-none"
                        v-model="saves" autocomplete="saves" />

                    <!-- <InputError class="mt-2" :message="saves" /> -->
                </div>
                </p>
                <ul role="list" class="mt-8 space-y-3 text-sm leading-6 text-gray-300 xl:mt-10">
                    <li class="flex gap-x-3"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true" class="h-6 w-5 flex-none text-white">
                            <path fill-rule="evenodd"
                                d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                clip-rule="evenodd"></path>
                        </svg>How many units you want</li>
                    <li class="flex gap-x-3"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true" class="h-6 w-5 flex-none text-white">
                            <path fill-rule="evenodd"
                                d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                clip-rule="evenodd"></path>
                        </svg>Fast delivery</li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            app_name: import.meta.env.VITE_APP_NAME,
            likes: 0,
            comments: 0,
            shares: 0,
            saves: 0,

            likes_price: 0,
            comments_price: 0,
            shares_price: 0,
            saves_price: 0,

            confirmation: [],
        }
    },

    methods: {
        handleUnits(unit) {
            switch (unit) {
                case 'likes':
                    this.likes_price = this.likes * this.$page.props.likes_price
                    break;
                case 'comments':
                    this.comments_price = this.comments * this.$page.props.comments_price
                    break;
                case 'shares':
                    this.shares_price = this.shares * this.$page.props.shares_price
                    break;
                case 'saves':
                    this.saves_price = this.saves * this.$page.props.saves_price
                    break;

                default:
                    break;
            }
        },
    },
}
</script>