<script setup>
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';

import { router } from '@inertiajs/vue3';

</script>

<template>
    <body class="body bg-black min-h-screen">
        <div class="fixed w-full z-30 flex bg-black bg-opacity-50 p-2 items-center justify-center h-16 px-10">
            <div
                class="logo ml-12 transform ease-in-out duration-500 flex-none h-full flex items-center justify-center text-white font-extrabold">
                {{ app_name }}
            </div>

            <div class="grow h-full flex items-center justify-center"></div>
            <div class="flex-none h-full flex items-center justify-center">

                <div class="flex space-x-3 items-center px-3">

                    <div>
                        <Dropdown v-if="$page.props.auth.user.all_teams.length > 0" align="right" width="60">
                            <template #trigger>
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-gray-800 hover:text-gray-400 focus:outline-none focus:bg-gray-900 active:bg-gray-900 transition ease-in-out duration-150">
                                        {{ $page.props.auth.user.current_team ? $page.props.auth.user.current_team.name : 'No company selected' }}

                                        <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                        </svg>
                                    </button>
                                </span>
                            </template>

                            <template #content>
                                <div class="w-60">
                                    <!-- Team Management -->
                                    <div v-if="$page.props.auth.user.current_team" class="block px-4 py-2 text-xs text-white">
                                        Manage Company
                                    </div>

                                    <DropdownLink  v-if="$page.props.auth.user.current_team" :href="route('spark.portal')">
                                        Subscriptions
                                    </DropdownLink>

                                    <!-- Team Settings -->
                                    <DropdownLink v-if="$page.props.auth.user.current_team" :href="route('teams.show', $page.props.auth.user.current_team)">
                                        Company Settings
                                    </DropdownLink>

                                    <DropdownLink v-if="$page.props.jetstream.canCreateTeams && $page.props.auth.user.current_team" :href="route('teams.create')">
                                        Create New Company
                                    </DropdownLink>

                                    <!-- Team Switcher -->
                                    <template v-if="$page.props.auth.user.all_teams.length > 0">
                                        <div class="border-t border-gray-600" />

                                        <div class="block px-4 py-2 text-xs text-white">
                                            Switch Company
                                        </div>

                                        <template v-for="team in $page.props.auth.user.all_teams" :key="team.id">
                                            <form @submit.prevent="switchToTeam(team)">
                                                <DropdownLink as="button">
                                                    <div class="flex items-center text-gray-400">
                                                        <svg v-if="team.id == $page.props.auth.user.current_team_id"
                                                            class="me-2 h-5 w-5 text-green-400"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>

                                                        <div>{{ team.name }}</div>
                                                    </div>
                                                </DropdownLink>
                                            </form>
                                        </template>
                                    </template>
                                </div>
                            </template>
                        </Dropdown>
                    </div>

                    <div>
                        <Dropdown align="right" width="48">
                            <template #trigger>
                                <button v-if="$page.props.jetstream.managesProfilePhotos"
                                    class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover"
                                        :src="$page.props.auth.user.profile_photo_url" :alt="$page.props.auth.user.name">
                                </button>

                                <span v-else class="inline-flex rounded-md">
                                    <button type="button"
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-gray-800 hover:text-gray-400 focus:outline-none focus:bg-gray-900 active:bg-gray-900 transition ease-in-out duration-150">
                                        {{ $page.props.auth.user.name }}

                                        <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                            </template>

                            <template #content>
                                <div v-if="$page.props.auth.user.role == 'ADMIN'">
                                    <div class="block px-4 py-2 text-xs text-white">
                                        Admin Management
                                    </div>

                                    <DropdownLink :href="route('admin.dashboard')">
                                        Admin Panel
                                    </DropdownLink>
                                </div>

                                <div class="block px-4 py-2 text-xs text-white">
                                    Manage Account
                                </div>

                                <DropdownLink :href="route('profile.show')">
                                    Profile
                                </DropdownLink>

                                <DropdownLink v-if="$page.props.auth.user.all_teams.length < 1"
                                    :href="route('teams.create')">
                                    Create new Company
                                </DropdownLink>

                                <DropdownLink v-if="$page.props.jetstream.hasApiFeatures" :href="route('api-tokens.index')">
                                    API Tokens
                                </DropdownLink>


                                <!-- Authentication -->
                                <form @submit.prevent="logout">
                                    <DropdownLink as="button" class="text-white">
                                        Log Out
                                    </DropdownLink>
                                </form>
                            </template>
                        </Dropdown>
                    </div>
                </div>

            </div>
        </div>
        <aside
            class="w-60 -translate-x-48 bg-black bg-opacity-50 p-4 fixed transition transform ease-in-out duration-1000 z-50 flex h-screen">
            <div
                class="max-toolbar translate-x-24 scale-x-0 w-full -right-6 transition transform ease-in duration-300 flex items-center justify-between border-4 border-none absolute top-2 rounded-full h-12">

                <div class="flex pl-4 items-center space-x-2 ">
                    <div class="text-white hover:text-blue-500 ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={3}
                            stroke="currentColor" class="w-4 h-4 hidden">
                            <path strokeLinecap="round" strokeLinejoin="round"
                                d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                        </svg>
                    </div>
                </div>
                <div class="flex items-center space-x-3 group bg-gradient-to-r pl-10 pr-2 py-1 rounded-full text-white">
                    <div class="transform ease-in-out duration-300 mr-12 font-extrabold">
                        <!-- {{ app_name }} -->
                    </div>
                </div>
            </div>
            <div @click="openNav()"
                class="-right-6 transition transform ease-in-out duration-500 flex border-4 border-gray-700 cursor-pointer bg-[#1E293B] hover:bg-purple-500 absolute top-2 p-3 rounded-full text-white hover:rotate-45">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={3}
                    stroke="currentColor" class="w-4 h-4">
                    <path strokeLinecap="round" strokeLinejoin="round"
                        d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                </svg>
            </div>
            <!-- MAX SIDEBAR-->
            <div class="max hidden text-white mt-20 flex-col space-y-2 w-full h-[calc(100vh)]">
                <a :href="route('home')"
                    class="hover:ml-2 w-full text-white hover:text-gray-400 cursor-pointer  bg-black bg-opacity-50 p-2 pl-8 rounded-full transform ease-in-out duration-300 flex flex-row items-center space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                        stroke="currentColor" class="w-4 h-4">
                        <path strokeLinecap="round" strokeLinejoin="round"
                            d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                    <div>
                        Home
                    </div>
                </a>
                <div
                    class="hover:ml-4 w-full text-white hover:text-gray-400 cursor-pointer  bg-black bg-opacity-50 p-2 pl-8 rounded-full transform ease-in-out duration-300 flex flex-row items-center space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
                    </svg>
                    <div>
                        Table
                    </div>
                </div>
                <div
                    class="hover:ml-4 w-full text-white hover:text-gray-400 cursor-pointer  bg-black bg-opacity-50 p-2 pl-8 rounded-full transform ease-in-out duration-300 flex flex-row items-center space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z" />
                    </svg>
                    <div>
                        Graph
                    </div>
                </div>
            </div>

            <div class="mini mt-20 flex flex-col space-y-2 w-full h-[calc(100vh)]">
                <div
                    class="hover:ml-4 justify-end pr-5 text-white hover:text-purple-500  w-full bg-black bg-opacity-50 p-3 rounded-full transform ease-in-out duration-300 flex">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                        stroke="currentColor" class="w-4 h-4">
                        <path strokeLinecap="round" strokeLinejoin="round"
                            d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                </div>
                <div
                    class="hover:ml-4 justify-end pr-5 text-white hover:text-purple-500  w-full bg-black bg-opacity-50 p-3 rounded-full transform ease-in-out duration-300 flex">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
                    </svg>
                </div>
                <div
                    class="hover:ml-4 justify-end pr-5 text-white hover:text-purple-500  w-full bg-black bg-opacity-50 p-3 rounded-full transform ease-in-out duration-300 flex">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z" />
                    </svg>
                </div>
            </div>
        </aside>

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

        <div class="content ml-12 transform ease-in-out duration-500 pt-20 px-2 md:px-5 pb-4 ">
            <nav class="px-5 py-3 text-white rounded-lg w-full">
                <slot />
            </nav>
        </div>
    </body>
</template>


<script>
export default {
    data() {
        return {
            sidebar: null,
            maxSidebar: null,
            miniSidebar: null,
            roundout: null,
            maxToolbar: null,
            logo: null,
            content: null,
            moon: null,
            sun: null,

            app_name: import.meta.env.VITE_APP_NAME,
            image: null
        }
    },

    mounted() {
        this.sidebar = document.querySelector("aside");
        this.maxSidebar = document.querySelector(".max");
        this.miniSidebar = document.querySelector(".mini");
        this.roundout = document.querySelector(".roundout");
        this.maxToolbar = document.querySelector(".max-toolbar");
        this.logo = document.querySelector('.logo');
        this.content = document.querySelector('.content');
        this.moon = document.querySelector(".moon");
        this.sun = document.querySelector(".sun");
        this.image = 'https://ui-avatars.com/api/?name=' + this.$page.props.auth.user.name

        console.log(this.$page.props.auth.user.all_teams);
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

        setDark(val) {
            if (val === "dark") {
                document.documentElement.classList.add('dark')
                this.moon.classList.add("hidden")
                this.sun.classList.remove("hidden")
            } else {
                document.documentElement.classList.remove('dark')
                this.sun.classList.add("hidden")
                this.moon.classList.remove("hidden")
            }
        },

        openNav() {
            if (this.sidebar.classList.contains('-translate-x-48')) {
                this.sidebar.classList.remove("-translate-x-48")
                this.sidebar.classList.add("translate-x-none")
                this.maxSidebar.classList.remove("hidden")
                this.maxSidebar.classList.add("flex")
                this.miniSidebar.classList.remove("flex")
                this.miniSidebar.classList.add("hidden")
                this.maxToolbar.classList.add("translate-x-0")
                this.maxToolbar.classList.remove("translate-x-24", "scale-x-0")
                this.logo.classList.remove("ml-12")
                this.content.classList.remove("ml-12")
                this.content.classList.add("ml-12", "md:ml-60")
            } else {
                // mini sidebar
                this.sidebar.classList.add("-translate-x-48")
                this.sidebar.classList.remove("translate-x-none")
                this.maxSidebar.classList.add("hidden")
                this.maxSidebar.classList.remove("flex")
                this.miniSidebar.classList.add("flex")
                this.miniSidebar.classList.remove("hidden")
                this.maxToolbar.classList.add("translate-x-24", "scale-x-0")
                this.maxToolbar.classList.remove("translate-x-0")
                this.logo.classList.add('ml-12')
                this.content.classList.remove("ml-12", "md:ml-60")
                this.content.classList.add("ml-12")

            }
        }
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
