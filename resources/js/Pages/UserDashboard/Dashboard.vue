<script setup>

import UserLayout from '@/Layouts/UserLayout.vue';


</script>

<template>
    <UserLayout>
        <div class="relative px-6 lg:px-8 overflow-hidden">
            <div class="mx-auto max-w-3xl pt-20 pb-32 sm:pt-48 sm:pb-40">
                <div class="hidden sm:mb-8 sm:flex sm:justify-center">
                    <div
                        class="hidden md:block relative overflow-hidden rounded-full py-1.5 px-4 mt-1 text-sm leading-6 ring-1 ring-gray-100/40 hover:ring-gray-100/40">
                        <span class="text-white">
                            You don't have a company yet, <a :href="route('spark.portal')" class="text-cyan-400 underline">let make one</a> !
                        </span>
                    </div>
                </div>
                <div>
                    <div class="mb-8 flex gap-x-4 justify-center md:hidden">
                        <div
                            class="relative overflow-hidden rounded-full py-1.5 px-4 text-sm leading-6 ring-1 ring-gray-100/40 hover:ring-gray-100/40">
                            <span class="text-white">
                                You don't have a company yet, <a :href="route('spark.portal')" class="text-cyan-400 underline">let make one</a> !
                            </span>
                        </div>
                    </div>
                    <h1 class="text-8xl text-white font-bold tracking-tight sm:text-center ">The Social Media <br> is
                        all yours</h1>
                    <p class="mt-6 text-lg leading-8 text-gray-500 sm:text-center">
                        Faster than ever and powered by AI, only for your efficiency.
                    </p>
                    <div class="mt-8 flex gap-x-4 sm:justify-center">
                        <div class="relative inline-flex  group">
                            <div
                                class="absolute transitiona-all duration-1000 opacity-70 -inset-px bg-gradient-to-r from-[#44BCFF] via-[#FF44EC] to-[#FF675E] rounded-xl blur-lg group-hover:opacity-100 group-hover:-inset-1 group-hover:duration-200 animate-tilt">
                            </div>
                            <a :href="route('spark.portal')"
                                class="relative inline-flex items-center justify-center px-8 py-4 text-sm text-white transition-all duration-200 bg-gray-900 rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
                                See our plans
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </UserLayout>
</template>

<script>
export default {
    props: {
        userIsSubscribed: Boolean,
        userIsOnTrial: Boolean,
    }
}
</script>