<script setup>
import Banner from '@/Components/Banner.vue';
</script>

<template>
    <div class="relative items-center block h-screen p-6 bg-white border border-gray-100 rounded-lg shadow-md "
        v-if="loading">
        <div role="status" class="absolute -translate-x-1/2 -translate-y-1/2 top-2/4 left-1/2">
            <div class="flex items-center justify-center w-full h-full">
                <div class="flex justify-center items-center space-x-1 text-sm text-gray-700">

                    <svg fill='none' class="w-6 h-6 animate-spin" viewBox="0 0 32 32" xmlns='http://www.w3.org/2000/svg'>
                        <path clip-rule='evenodd'
                            d='M15.165 8.53a.5.5 0 01-.404.58A7 7 0 1023 16a.5.5 0 011 0 8 8 0 11-9.416-7.874.5.5 0 01.58.404z'
                            fill='currentColor' fill-rule='evenodd' />
                    </svg>


                    <div>Loading ...</div>
                </div>
            </div>
        </div>
    </div>


    <body class="body bg-gray-100 min-h-screen">
        <div class="fixed w-full z-30 bg-white shadow-xl items-center justify-center ">
            <div class="logo rounded-2xl transform ease-in-out duration-500   ">
                <Banner />
            </div>
        </div>
        <aside
            class="w-60 -translate-x-48 bg-white shadow-xl p-4 fixed transition transform ease-in-out duration-1000 z-50 flex h-screen">
            <div
                class="max-toolbar translate-x-24 scale-x-0 w-full -right-6 transition transform ease-in duration-300 flex items-center justify-between border-4 border-none absolute top-2 rounded-full h-12">

                <div class="flex pl-4 items-center space-x-2 ">
                    <div class="text-black font-extrabold text-xl">
                        Admin Dashboard
                    </div>
                </div>
            </div>
            <div @click="openNav()"
                class="-right-6 transition transform ease-in-out duration-500 bg-white flex cursor-pointer absolute top-2 p-4 rounded-full hover:rotate-180">
                <svg class="h-4 w-4" viewBox="-4.5 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="Dribbble-Light-Preview" transform="translate(-305.000000, -6679.000000)" fill="#000000">
                            <g id="icons" transform="translate(56.000000, 160.000000)">
                                <path
                                    d="M249.365851,6538.70769 L249.365851,6538.70769 C249.770764,6539.09744 250.426289,6539.09744 250.830166,6538.70769 L259.393407,6530.44413 C260.202198,6529.66364 260.202198,6528.39747 259.393407,6527.61699 L250.768031,6519.29246 C250.367261,6518.90671 249.720021,6518.90172 249.314072,6519.28247 L249.314072,6519.28247 C248.899839,6519.67121 248.894661,6520.31179 249.302681,6520.70653 L257.196934,6528.32352 C257.601847,6528.71426 257.601847,6529.34685 257.196934,6529.73759 L249.365851,6537.29462 C248.960938,6537.68437 248.960938,6538.31795 249.365851,6538.70769"
                                    id="arrow_right-[#336]">

                                </path>
                            </g>
                        </g>
                    </g>
                </svg>
            </div>

            <div class="max hidden text-white mt-20 flex-col space-y-2 w-full h-[calc(100vh)]">
                <a :href="route('admin.dashboard')"
                    class="flex items-center p-2 text-black rounded-lg bg-gray-200 hover:bg-gray-300 group">
                    <svg class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path
                            d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path
                            d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                    <span class="ms-3">Dashboard</span>
                </a>

                <div class="cursor-pointer">
                    <div class="flex items-center p-2 text-black rounded-lg bg-gray-200 hover:bg-gray-300 group"
                        @click="dropdown(1)">
                        <span class="ms-3">Mini Shop</span>

                        <span class="relative">
                            <svg class="-mr-1 ml-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                    </div>
                    <div id="1" class="origin-top-right hidden left-0 mt-2 mb-2 w-full rounded-md shadow-lg">
                        <div class="rounded-md bg-gray-200 shadow-xs">
                            <div class="py-1">
                                <a :href="route('admin.minishop.pricing')"
                                    class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-300 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900">
                                    Pricing
                                </a>
                                <a :href="route('admin.minishop.orders')"
                                    class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900">
                                    Orders
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mini mt-20 flex flex-col space-y-2 w-full h-[calc(100vh)]">
                <a :href="route('admin.dashboard')"
                    class="hover:ml-8 justify-end  ml-2 text-gray-500 w-full bg-white p-3 rounded-lg shadow-xl transform ease-in-out duration-300 flex">
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 22 21">
                        <path
                            d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path
                            d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                </a>
            </div>
        </aside>

        <div class="content ml-12 transform ease-in-out duration-500 pt-20 px-2 md:px-5 pb-4 ">
            <nav class="px-5 py-3 rounded-lg w-full">
                <slot />
            </nav>
        </div>
    </body>
</template>


<script>
export default {
    data() {
        return {
            loading: true,
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
        }
    },

    mounted() {
        setTimeout(() => {
            this.loading = false

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
        }, 1000);
    },

    methods: {
        dropdown(id) {
            const dropdown = document.getElementById(id);

            if (dropdown.style.display === 'none' || dropdown.style.display === '') return dropdown.style.display = 'block';

            return dropdown.style.display = 'none';
        },

        getRandomTranslate() {
            const randomTranslateX = `${Math.random() * window.innerWidth}px`;
            const randomTranslateY = `${Math.random() * window.innerHeight}px`;

            return {
                transform: `translate(${randomTranslateX}, ${randomTranslateY})`,
            };
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
