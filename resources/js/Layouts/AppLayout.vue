<script setup>
import { ref } from 'vue';
import { Head, Link, router } from '@inertiajs/vue3';
import ApplicationMark from '@/Components/ApplicationMark.vue';
import Banner from '@/Components/Banner.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
</script>

<template>
    <div>
        <Banner />

        <div class="min-h-screen bg-black">
            <nav class="bg-transparent">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <div class="shrink-0 flex items-center">
                                <Link :href="route('home')">
                                <ApplicationMark class="block h-9 w-auto" />
                                </Link>
                            </div>

                            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                <NavLink :href="route('home')" :active="route().current('home')">
                                    Home
                                </NavLink>

                                <NavLink :href="route('shorturl')" :active="route().current('shorturl')">
                                    Short Link
                                </NavLink>

                                <NavLink :href="route('pricing')" :active="route().current('pricing')">
                                    Pricing
                                </NavLink>
                            </div>
                        </div>

                        <div class="hidden sm:flex sm:items-center sm:ms-6">
                            <div class="ms-3 relative space-x-6">
                                <SecondaryButton>
                                    <a :href="route('login')">Sign In</a>
                                </SecondaryButton>
                                <PrimaryButton>
                                    <a :href="route('register')">Sign Up</a>
                                </PrimaryButton>
                            </div>
                        </div>

                        <div class="-me-2 flex items-center sm:hidden">
                            <button
                                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
                                @click="showingNavigationDropdown = !showingNavigationDropdown">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path
                                        :class="{ 'hidden': showingNavigationDropdown, 'inline-flex': !showingNavigationDropdown }"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16" />
                                    <path
                                        :class="{ 'hidden': !showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <div :class="{ 'block': showingNavigationDropdown, 'hidden': !showingNavigationDropdown }"
                    class="sm:hidden">
                    <div class="pt-2 pb-3 space-y-1">
                        <ResponsiveNavLink :href="route('home')" :active="route().current('home')">
                            Home
                        </ResponsiveNavLink>

                        <ResponsiveNavLink :href="route('shorturl')" :active="route().current('shorturl')">
                            Short Link
                        </ResponsiveNavLink>

                        <ResponsiveNavLink :href="route('pricing')" :active="route().current('pricing')">
                            Pricing
                        </ResponsiveNavLink>

                        <div class="flex justify-around py-2" v-if="!$page.props.auth.user">
                            <SecondaryButton>
                                <a :href="route('login')">Sign In</a>
                            </SecondaryButton>
                            <PrimaryButton>
                                <a :href="route('register')">Sign Up</a>
                            </PrimaryButton>
                        </div>
                    </div>
                </div>
            </nav>

            <section class="relative mx-auto flex flex-col justify-center px-4">
                <div class="fixed left-0 right-0 top-0">
                    <div class="left-16 top-0 overflow-visible opacity-50">
                        <div class="circle-obj absolute h-[900px] w-[700px] rounded-[40rem] mix-blend-multiply"
                            :style="getRandomTranslate()" style="pointer-events: none;"></div>
                    </div>
                    <div class="absolute left-52 top-28 overflow-visible opacity-50">
                        <div class="circle-obj2 absolute h-[900px] w-[700px] rounded-[40rem] mix-blend-multiply"
                            :style="getRandomTranslate()" style="pointer-events: none;"></div>
                    </div>
                    <div class="absolute left-20 top-32 overflow-visible opacity-0">
                        <div class="circle-obj3 absolute h-[900px] w-[700px] rounded-[40rem] mix-blend-multiply"
                            :style="getRandomTranslate()" style="pointer-events: none;"></div>
                    </div>
                </div>
            </section>

            <main>
                <slot />
            </main>
        </div>
    </div>
</template>


<script>
export default {
    props: {
        title: String
    },

    data() {
        return {
            showingNavigationDropdown: ref(false),
            app_name: import.meta.env.APP_NAME
        }
    },

    methods: {
        switchToTeam(team) {
            router.put(route('current-team.update'), {
                team_id: team.id,
            }, {
                preserveState: false,
            });
        },

        logout() {
            router.post(route('logout'));
        },

        getRandomTranslate() {
            const randomTranslateX = `${Math.random() * window.innerWidth}px`;
            const randomTranslateY = `${Math.random() * window.innerHeight}px`;

            return {
                transform: `translate(${randomTranslateX}, ${randomTranslateY})`,
            };
        },
    },
}
</script>


<style>
.circle-obj {
    background: radial-gradient(closest-side, #2dd4bf, rgba(233, 168, 2, 0));
    animation: traverse-up-left 10s ease-in-out infinite alternate;
}

.circle-obj2 {
    background: radial-gradient(closest-side, #5154ee, rgba(233, 168, 2, 0));
    animation: traverse-up-right 12s ease-in-out infinite alternate;
}

.circle-obj3 {
    background: radial-gradient(closest-side, #e8ee43d9, rgba(233, 168, 2, 0));
    animation: traverse-down-right 8s ease-in-out infinite alternate;
}

@keyframes traverse-up-left {
    100% {
        transform: translateY(-200px) translateX(-350px) rotate(180deg);
    }
}

@keyframes traverse-up-right {
    100% {
        transform: translateY(-300px) translateX(300px) rotate(1turn);
    }
}

@keyframes traverse-down-right {
    100% {
        transform: translateY(250px) translateX(300px) rotate(1turn);
    }
}
</style>
