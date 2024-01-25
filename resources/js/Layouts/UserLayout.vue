<script setup>
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';

import { router } from '@inertiajs/vue3';
import Banner from '@/Components/Banner.vue';

</script> 

<template>
    <Banner />

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
                                        {{ $page.props.auth.user.current_team ? $page.props.auth.user.current_team.name :
                                            'No company selected' }}

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
                                    <div v-if="$page.props.auth.user.current_team"
                                        class="block px-4 py-2 text-xs text-white">
                                        Manage Company
                                    </div>

                                    <DropdownLink v-if="$page.props.auth.user.current_team" :href="route('spark.portal')">
                                        Subscriptions
                                    </DropdownLink>

                                    <!-- Team Settings -->
                                    <DropdownLink v-if="$page.props.auth.user.current_team"
                                        :href="route('teams.show', $page.props.auth.user.current_team)">
                                        Company Settings
                                    </DropdownLink>

                                    <DropdownLink
                                        v-if="$page.props.jetstream.canCreateTeams && $page.props.auth.user.current_team"
                                        :href="route('teams.create')">
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
            <div class="max hidden mt-20 flex-col space-y-2 w-full h-[calc(100vh)]">
                <a :href="route('home')"
                    class="flex items-center p-2 text-white rounded-lg bg-gray-700 hover:bg-gray-800 group">
                    <svg class="w-6 h-6 transition duration-75 group-hover:text-gray-500" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.5"
                            d="M2 12.2039C2 9.91549 2 8.77128 2.5192 7.82274C3.0384 6.87421 3.98695 6.28551 5.88403 5.10813L7.88403 3.86687C9.88939 2.62229 10.8921 2 12 2C13.1079 2 14.1106 2.62229 16.116 3.86687L18.116 5.10812C20.0131 6.28551 20.9616 6.87421 21.4808 7.82274C22 8.77128 22 9.91549 22 12.2039V13.725C22 17.6258 22 19.5763 20.8284 20.7881C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.7881C2 19.5763 2 17.6258 2 13.725V12.2039Z"
                            fill="#FFF" />
                        <path
                            d="M9 17.25C8.58579 17.25 8.25 17.5858 8.25 18C8.25 18.4142 8.58579 18.75 9 18.75H15C15.4142 18.75 15.75 18.4142 15.75 18C15.75 17.5858 15.4142 17.25 15 17.25H9Z"
                            fill="#FFF" />
                    </svg>
                    <span class="ms-3">Home</span>
                </a>

                <a :href="route('minishop')"
                    class="flex items-center p-2 text-white rounded-lg bg-gray-700 hover:bg-gray-800 group">
                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M14.5 21.9913V18.5C14.5 17.5654 14.5 17.0981 14.299 16.75C14.1674 16.522 13.978 16.3326 13.75 16.201C13.4019 16 12.9346 16 12 16C11.0654 16 10.5981 16 10.25 16.201C10.022 16.3326 9.83261 16.522 9.70096 16.75C9.5 17.0981 9.5 17.5654 9.5 18.5V21.9913H14.5Z"
                            fill="#FFF" />
                        <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"
                            d="M5.73204 12C4.84126 12 4.05323 11.6239 3.5 11.0329V14C3.5 17.7712 3.5 19.6568 4.67157 20.8284C5.61466 21.7715 7.02043 21.9554 9.5 21.9913H14.5C16.9796 21.9554 18.3853 21.7715 19.3284 20.8284C20.5 19.6568 20.5 17.7712 20.5 14V11.034C19.9468 11.6244 19.1592 12 18.269 12C16.6973 12 15.3814 10.8091 15.225 9.24523L15.152 8.51733C15.3385 10.382 13.8742 12 12.0003 12C10.139 12 8.6819 10.4038 8.84499 8.55511L8.77598 9.24523C8.6196 10.8091 7.30367 12 5.73204 12ZM14.5 18.5V21.9913H9.5V18.5C9.5 17.5654 9.5 17.0981 9.70096 16.75C9.83261 16.522 10.022 16.3326 10.25 16.201C10.5981 16 11.0654 16 12 16C12.9346 16 13.4019 16 13.75 16.201C13.978 16.3326 14.1674 16.522 14.299 16.75C14.5 17.0981 14.5 17.5654 14.5 18.5Z"
                            fill="#FFF" />
                        <path
                            d="M9.4998 2H14.4998L15.1515 8.51737C15.338 10.382 13.8737 12 11.9998 12C10.1259 12 8.6616 10.382 8.84806 8.51737L9.4998 2Z"
                            fill="#FFF" />
                        <path opacity="0.7"
                            d="M3.33024 5.35133C3.50832 4.46093 3.59736 4.01573 3.7784 3.65484C4.15987 2.89439 4.84628 2.33168 5.66677 2.10675C6.05616 2 6.51017 2 7.4182 2H9.50051L8.77598 9.24527C8.6196 10.8091 7.30367 12 5.73204 12C3.80159 12 2.35373 10.2339 2.73232 8.34093L3.33024 5.35133Z"
                            fill="#FFF" />
                        <path opacity="0.7"
                            d="M20.6703 5.35133C20.4922 4.46093 20.4031 4.01573 20.2221 3.65484C19.8406 2.89439 19.1542 2.33168 18.3337 2.10675C17.9443 2 17.4903 2 16.5823 2H14.5L15.2245 9.24527C15.3809 10.8091 16.6968 12 18.2685 12C20.1989 12 21.6468 10.2339 21.2682 8.34093L20.6703 5.35133Z"
                            fill="#FFF" />
                    </svg>
                    <span class="ms-3">Mini Shop</span>
                </a>

                <a :href="route('minishop.orders')"
                    class="flex items-center p-2 text-white rounded-lg bg-gray-700 hover:bg-gray-800 group">
                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M5.58579 4.58579C5 5.17157 5 6.11438 5 8V17C5 18.8856 5 19.8284 5.58579 20.4142C6.17157 21 7.11438 21 9 21H15C16.8856 21 17.8284 21 18.4142 20.4142C19 19.8284 19 18.8856 19 17V8C19 6.11438 19 5.17157 18.4142 4.58579C17.8284 4 16.8856 4 15 4H9C7.11438 4 6.17157 4 5.58579 4.58579ZM9 8C8.44772 8 8 8.44772 8 9C8 9.55228 8.44772 10 9 10H15C15.5523 10 16 9.55228 16 9C16 8.44772 15.5523 8 15 8H9ZM9 12C8.44772 12 8 12.4477 8 13C8 13.5523 8.44772 14 9 14H15C15.5523 14 16 13.5523 16 13C16 12.4477 15.5523 12 15 12H9ZM9 16C8.44772 16 8 16.4477 8 17C8 17.5523 8.44772 18 9 18H13C13.5523 18 14 17.5523 14 17C14 16.4477 13.5523 16 13 16H9Z"
                            fill="#FFF" />
                    </svg>
                    <span class="ms-3">Orders</span>
                </a>

                <a :href="route('shorturl')"
                    class="flex items-center p-2 text-white rounded-lg bg-gray-700 hover:bg-gray-800 group">
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
                    <span class="ms-3">Short Link</span>
                </a>
            </div>

            <div class="mini mt-20 flex flex-col space-y-2 w-full h-[calc(100vh)]">
                <a :href="route('home')"
                    class="hover:ml-8 justify-end  ml-2 text-gray-500 w-full bg-gray-800 p-3 rounded-lg shadow-xl transform ease-in-out duration-300 flex">
                    <svg class="w-6 h-6 transition duration-75 group-hover:text-gray-500" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.5"
                            d="M2 12.2039C2 9.91549 2 8.77128 2.5192 7.82274C3.0384 6.87421 3.98695 6.28551 5.88403 5.10813L7.88403 3.86687C9.88939 2.62229 10.8921 2 12 2C13.1079 2 14.1106 2.62229 16.116 3.86687L18.116 5.10812C20.0131 6.28551 20.9616 6.87421 21.4808 7.82274C22 8.77128 22 9.91549 22 12.2039V13.725C22 17.6258 22 19.5763 20.8284 20.7881C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.7881C2 19.5763 2 17.6258 2 13.725V12.2039Z"
                            fill="#FFF" />
                        <path
                            d="M9 17.25C8.58579 17.25 8.25 17.5858 8.25 18C8.25 18.4142 8.58579 18.75 9 18.75H15C15.4142 18.75 15.75 18.4142 15.75 18C15.75 17.5858 15.4142 17.25 15 17.25H9Z"
                            fill="#FFF" />
                    </svg>
                </a>

                <a :href="route('minishop')"
                    class="hover:ml-8 justify-end  ml-2 text-gray-500 w-full bg-gray-800 p-3 rounded-lg shadow-xl transform ease-in-out duration-300 flex">
                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M14.5 21.9913V18.5C14.5 17.5654 14.5 17.0981 14.299 16.75C14.1674 16.522 13.978 16.3326 13.75 16.201C13.4019 16 12.9346 16 12 16C11.0654 16 10.5981 16 10.25 16.201C10.022 16.3326 9.83261 16.522 9.70096 16.75C9.5 17.0981 9.5 17.5654 9.5 18.5V21.9913H14.5Z"
                            fill="#FFF" />
                        <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"
                            d="M5.73204 12C4.84126 12 4.05323 11.6239 3.5 11.0329V14C3.5 17.7712 3.5 19.6568 4.67157 20.8284C5.61466 21.7715 7.02043 21.9554 9.5 21.9913H14.5C16.9796 21.9554 18.3853 21.7715 19.3284 20.8284C20.5 19.6568 20.5 17.7712 20.5 14V11.034C19.9468 11.6244 19.1592 12 18.269 12C16.6973 12 15.3814 10.8091 15.225 9.24523L15.152 8.51733C15.3385 10.382 13.8742 12 12.0003 12C10.139 12 8.6819 10.4038 8.84499 8.55511L8.77598 9.24523C8.6196 10.8091 7.30367 12 5.73204 12ZM14.5 18.5V21.9913H9.5V18.5C9.5 17.5654 9.5 17.0981 9.70096 16.75C9.83261 16.522 10.022 16.3326 10.25 16.201C10.5981 16 11.0654 16 12 16C12.9346 16 13.4019 16 13.75 16.201C13.978 16.3326 14.1674 16.522 14.299 16.75C14.5 17.0981 14.5 17.5654 14.5 18.5Z"
                            fill="#FFF" />
                        <path
                            d="M9.4998 2H14.4998L15.1515 8.51737C15.338 10.382 13.8737 12 11.9998 12C10.1259 12 8.6616 10.382 8.84806 8.51737L9.4998 2Z"
                            fill="#FFF" />
                        <path opacity="0.7"
                            d="M3.33024 5.35133C3.50832 4.46093 3.59736 4.01573 3.7784 3.65484C4.15987 2.89439 4.84628 2.33168 5.66677 2.10675C6.05616 2 6.51017 2 7.4182 2H9.50051L8.77598 9.24527C8.6196 10.8091 7.30367 12 5.73204 12C3.80159 12 2.35373 10.2339 2.73232 8.34093L3.33024 5.35133Z"
                            fill="#FFF" />
                        <path opacity="0.7"
                            d="M20.6703 5.35133C20.4922 4.46093 20.4031 4.01573 20.2221 3.65484C19.8406 2.89439 19.1542 2.33168 18.3337 2.10675C17.9443 2 17.4903 2 16.5823 2H14.5L15.2245 9.24527C15.3809 10.8091 16.6968 12 18.2685 12C20.1989 12 21.6468 10.2339 21.2682 8.34093L20.6703 5.35133Z"
                            fill="#FFF" />
                    </svg>
                </a>

                <a :href="route('minishop.orders')"
                    class="hover:ml-8 justify-end  ml-2 text-gray-500 w-full bg-gray-800 p-3 rounded-lg shadow-xl transform ease-in-out duration-300 flex">
                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M5.58579 4.58579C5 5.17157 5 6.11438 5 8V17C5 18.8856 5 19.8284 5.58579 20.4142C6.17157 21 7.11438 21 9 21H15C16.8856 21 17.8284 21 18.4142 20.4142C19 19.8284 19 18.8856 19 17V8C19 6.11438 19 5.17157 18.4142 4.58579C17.8284 4 16.8856 4 15 4H9C7.11438 4 6.17157 4 5.58579 4.58579ZM9 8C8.44772 8 8 8.44772 8 9C8 9.55228 8.44772 10 9 10H15C15.5523 10 16 9.55228 16 9C16 8.44772 15.5523 8 15 8H9ZM9 12C8.44772 12 8 12.4477 8 13C8 13.5523 8.44772 14 9 14H15C15.5523 14 16 13.5523 16 13C16 12.4477 15.5523 12 15 12H9ZM9 16C8.44772 16 8 16.4477 8 17C8 17.5523 8.44772 18 9 18H13C13.5523 18 14 17.5523 14 17C14 16.4477 13.5523 16 13 16H9Z"
                            fill="#FFF" />
                    </svg>
                </a>

                <a :href="route('shorturl')"
                    class="hover:ml-8 justify-end  ml-2 text-gray-500 w-full bg-gray-800 p-3 rounded-lg shadow-xl transform ease-in-out duration-300 flex">
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
                </a>
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
