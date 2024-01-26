<script setup>
import UserLayout from '@/Layouts/UserLayout.vue';
</script>

<template>
    <UserLayout>
        <div class="relative px-6 lg:px-8">
            <div class="mx-auto max-w-5xl pt-6 pb-32 sm:pt-28">
                <div>
                    <p class="mb-6 text-lg leading-8 text-cyan-500 font-extrabold sm:text-center">
                        Site pricing
                    </p>
                    <div class="mb-8 flex gap-x-4 justify-center md:hidden">
                        <div
                            class="relative overflow-hidden rounded-full py-1.5 px-4 text-sm leading-6 ring-1 ring-gray-100/40 hover:ring-gray-100/40">
                            <span class="text-white">
                                Start your free trial right now.
                                <a href="#" class="font-semibold text-indigo-600"> Log in
                                    <span aria-hidden="true">&rarr;</span>
                                </a>
                            </span>
                        </div>
                    </div>
                    <h1 class="text-6xl text-white font-bold tracking-tight sm:text-center ">
                        Start for free and upgrade to unlock more features.
                    </h1>
                </div>
                <div class="mt-8">
                    <div class="isolate mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        <div class="rounded-3xl p-6 bg-gray-900 bg-opacity-50 h-fit w-full">
                            <h3 class="text-gray-500 text-2xl font-semibold leading-8">Free</h3>
                            <p class="text-5xl mt-1 font-bold tracking-tight text-white">$0</p>
                            <p class="mt-2 text-base leading-6 text-gray-500">Forever</p>

                            <ul class="mt-2 space-y-3 text-sm leading-6 text-gray-600 xl:mt-10">
                                <li class="flex gap-x-3 text-base text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" aria-hidden="true" class="h-6 w-5 flex-none text-sky-500">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>For tiny teams

                                </li>
                                <li class="flex gap-x-3 text-base text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" aria-hidden="true" class="h-6 w-5 flex-none text-sky-500">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>Framer domain
                                </li>
                                <li class="flex gap-x-3 text-base text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" aria-hidden="true" class="h-6 w-5 flex-none text-sky-500">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>Framer banner
                                </li>
                            </ul>

                            <a
                                class="text-white bg-gray-800 text-sm mt-4 block rounded-md py-2 px-3 text-center font-extrabold focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">
                                Get started
                            </a>
                        </div>

                        <div class="rounded-3xl p-6 bg-gray-900 bg-opacity-50 h-fit w-full">
                            <h3 class="text-gray-500 text-2xl font-semibold leading-8">Mini</h3>
                            <p class="text-5xl mt-1 font-bold tracking-tight text-white">$5</p>
                            <p class="mt-2 text-base leading-6 text-gray-500">Per site per month</p>

                            <ul class="mt-4 space-y-3 text-sm leading-6 text-gray-600 xl:mt-10">
                                <li class="flex gap-x-3 text-base text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" aria-hidden="true" class="h-6 w-5 flex-none text-sky-500">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>For simple sites
                                </li>
                                <li class="flex gap-x-3 text-base text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" aria-hidden="true" class="h-6 w-5 flex-none text-sky-500">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>Custom domain
                                </li>
                                <li class="flex gap-x-3 text-base text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" aria-hidden="true" class="h-6 w-5 flex-none text-sky-500">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>Home and 404
                                </li>
                                <li class="flex gap-x-3 text-base text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" aria-hidden="true" class="h-6 w-5 flex-none text-sky-500">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>1,000 visitors/mo
                                </li>
                            </ul>
                            <a
                                class="text-white bg-sky-500 shadow-2xl shadow-sky-500/100 mt-4 block rounded-md py-2 px-3 text-center text-sm font-extrabold focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">
                                Get site plan
                            </a>
                        </div>

                        <div class="rounded-3xl p-6 bg-gray-900 bg-opacity-50 h-fit w-full">
                            <h3 class="text-gray-500 text-2xl font-semibold leading-8">Basic</h3>
                            <p class="text-5xl mt-1 font-bold tracking-tight text-white">$15</p>
                            <p class="mt-2 text-base leading-6 text-gray-500">Per site per month</p>

                            <ul class="mt-4 space-y-3 text-sm leading-6 text-gray-600 xl:mt-10">
                                <li class="flex gap-x-3 text-base text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" aria-hidden="true" class="h-6 w-5 flex-none text-sky-500">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>For personal sites
                                </li>
                                <li class="flex gap-x-3 text-base text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" aria-hidden="true" class="h-6 w-5 flex-none text-sky-500">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>150 pages
                                </li>
                                <li class="flex gap-x-3 text-base text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" aria-hidden="true" class="h-6 w-5 flex-none text-sky-500">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>Password protect
                                </li>
                                <li class="flex gap-x-3 text-base text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" aria-hidden="true" class="h-6 w-5 flex-none text-sky-500">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>1 CMS collection
                                </li>
                                <li class="flex gap-x-3 text-base text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" aria-hidden="true" class="h-6 w-5 flex-none text-sky-500">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>10,000 visitors/mo
                                </li>
                                <li class="flex gap-x-3 text-base text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" aria-hidden="true" class="h-6 w-5 flex-none text-sky-500">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>10 page search
                                </li>
                            </ul>

                            <a
                                class="text-white bg-sky-500 shadow-2xl shadow-sky-500/100 mt-4 block rounded-md py-2 px-3 text-center text-sm font-extrabold focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">
                                Get site plan
                            </a>
                        </div>

                        <div
                            class="rounded-3xl p-6 bg-sky-500 shadow-2xl shadow-sky-500/100 h-fit w-full">
                            <h3 class="text-white text-2xl font-semibold leading-8">Pro</h3>
                            <p class="text-5xl mt-1 font-bold tracking-tight text-white">$30</p>
                            <p class="mt-2 text-base leading-6 text-white">Per site per month</p>

                            <ul class="mt-4 space-y-3 text-sm leading-6 text-gray-600 xl:mt-10">
                                <li class="flex gap-x-3 text-base text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" aria-hidden="true" class="h-6 w-5 flex-none text-sky-200">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>For larger sites
                                </li>
                                <li class="flex gap-x-3 text-base text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" aria-hidden="true" class="h-6 w-5 flex-none text-sky-200">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>Unlimited pages
                                </li>
                                <li class="flex gap-x-3 text-base text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" aria-hidden="true" class="h-6 w-5 flex-none text-sky-200">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>Analytics + cookies
                                </li>
                                <li class="flex gap-x-3 text-base text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" aria-hidden="true" class="h-6 w-5 flex-none text-sky-200">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>Staging environment
                                </li>
                                <li class="flex gap-x-3 text-base text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" aria-hidden="true" class="h-6 w-5 flex-none text-sky-200">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>10 CMS collections
                                </li>
                                <li class="flex gap-x-3 text-base text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" aria-hidden="true" class="h-6 w-5 flex-none text-sky-200">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>200,000 visitors/mo
                                </li>
                                <li class="flex gap-x-3 text-base text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" aria-hidden="true" class="h-6 w-5 flex-none text-sky-200">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>300 page search
                                </li>
                            </ul>

                            <a
                                class="text-black bg-white shadow-2xl shadow-sky-500/100 mt-4 block rounded-md py-2 px-3 text-center text-sm font-extrabold focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">
                                Get site plan
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
    data() {
        return {
            app_name: import.meta.env.VITE_APP_NAME,
        }
    },
}
</script>