<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
</script>

<template>
    <AppLayout>
        <div class="relative px-6 lg:px-8 overflow-hidden">
            <div class="mx-auto max-w-3xl pt-20 pb-32 sm:pt-48 sm:pb-40">
                <div class="hidden sm:mb-8 sm:flex sm:justify-center">
                    <div
                        class="hidden md:block relative overflow-hidden rounded-full py-1.5 px-4 mt-1 text-sm leading-6 ring-1 ring-gray-100/40 hover:ring-gray-100/40">
                        <span class="text-white">
                            Start your free trial right now.
                        </span>
                    </div>
                </div>
                <div>
                    <div class="mb-8 flex gap-x-4 justify-center md:hidden">
                        <div
                            class="relative overflow-hidden rounded-full py-1.5 px-4 text-sm leading-6 ring-1 ring-gray-100/40 hover:ring-gray-100/40">
                            <span class="text-white">
                                Start your free trial right now.
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
                            <a :href="route('pricing')"
                                class="relative inline-flex items-center justify-center px-8 py-4 text-sm text-white transition-all duration-200 bg-gray-900 rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
                                See our plans
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mx-auto rounded-3xl max-w-7xl mb-32 ">
                <h1 class="text-white font-extrabold text-5xl">Features of EngageGenius</h1>

                <p class="mt-6 text-gray-500 text-lg">
                    Revolutionize the way you engage with their audience on social media with EngageGenius. Our cutting-edge
                    AI technology crafts high-quality, niche-specific posts, making your social media strategy seamless,
                    effective, and innovative.
                </p>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-12">
                    <div
                        class="hover:scale-105 transition-all duration-500 hover:cursor-pointer relative grid h-[35rem] w-full w flex-col items-end justify-center overflow-hidden rounded-xl text-center">
                        <div
                            class="absolute inset-0 m-0 h-full w-full overflow-hidden rounded-none bg-transparent bg-[url('https://images.pexels.com/photos/8438979/pexels-photo-8438979.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1')] bg-cover bg-clip-border bg-center">
                            <div
                                class="absolute inset-0 w-full h-full to-bg-black-10 bg-gradient-to-t from-black/80 via-black/50">
                            </div>
                        </div>
                        <div class="relative p-6 px-6 py-14 md:px-12">
                            <h2
                                class="mb-6 block font-sans text-xl font-medium leading-[1.5] tracking-normal text-white antialiased">
                                Utilize advanced AI to generate engaging, niche-specific social media content. Our
                                intelligent algorithms are designed to understand and adapt to a variety of industries,
                                ensuring your posts are always relevant and engaging.
                            </h2>
                            <h5
                                class="block mb-4 font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-gray-400 bg-black py-2 rounded-xl hover:text-white transition-all">
                                AI-Powered Content Creation
                            </h5>
                        </div>
                    </div>
                    <div
                        class="hover:scale-105 transition-all duration-500 hover:cursor-pointer relative grid h-[40rem] w-full w flex-col items-end justify-center overflow-hidden rounded-xl text-center">
                        <div
                            class="absolute inset-0 m-0 h-full w-full overflow-hidden rounded-none bg-transparent bg-[url('https://images.pexels.com/photos/8728382/pexels-photo-8728382.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1')] bg-cover bg-clip-border bg-center">
                            <div
                                class="absolute inset-0 w-full h-full to-bg-black-10 bg-gradient-to-t from-black/80 via-black/50">
                            </div>
                        </div>
                        <div class="relative p-6 px-6 py-14 md:px-12">
                            <h2
                                class="mb-6 block font-sans text-xl font-medium leading-[1.5] tracking-normal text-white antialiased">
                                Access a wide range of high-quality stock images or have our AI create custom visuals for
                                each post. This feature ensures your social media content is not only engaging but also
                                visually captivating.
                            </h2>
                            <h5
                                class="block mb-4 font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-gray-400 bg-black py-2 rounded-xl hover:text-white transition-all">
                                AI-Generated and Stock Imagery
                            </h5>
                        </div>
                    </div>
                    <div
                        class="hover:scale-105 -mt-0 sm:-mt-20 md:-mt-20 lg:-mt-0 transition-all duration-500 hover:cursor-pointer relative grid h-[35rem] w-full w flex-col items-end justify-center overflow-hidden rounded-xl text-center">
                        <div
                            class="absolute inset-0 m-0 h-full w-full overflow-hidden rounded-none bg-transparent bg-[url('https://images.pexels.com/photos/8728223/pexels-photo-8728223.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1')] bg-cover bg-clip-border bg-center">
                            <div
                                class="absolute inset-0 w-full h-full to-bg-black-10 bg-gradient-to-t from-black/80 via-black/50">
                            </div>
                        </div>
                        <div class="relative p-6 px-6 py-14 md:px-12">
                            <h2
                                class="mb-6 block font-sans text-xl font-medium leading-[1.5] tracking-normal text-white antialiased">
                                Plan your social media strategy with an intuitive calendar view, allowing you to schedule
                                posts in advance. Edit and rearrange your post sequence directly on the calendar, providing
                                you with a clear overview and flexible control of your content strategy.
                            </h2>
                            <h5
                                class="block mb-4 font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-gray-400 bg-black py-2 rounded-xl hover:text-white transition-all">
                                Automated Post Scheduling with Calendar Editing
                            </h5>
                        </div>
                    </div>
                    <div
                        class="hover:scale-105 -mt-0 sm:-mt-0 md:-mt-26 lg:-mt-20 transition-all duration-500 hover:cursor-pointer relative grid h-[35rem] w-full w flex-col items-end justify-center overflow-hidden rounded-xl text-center">
                        <div
                            class="absolute inset-0 m-0 h-full w-full overflow-hidden rounded-none bg-transparent bg-[url('https://images.pexels.com/photos/8386359/pexels-photo-8386359.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1')] bg-cover bg-clip-border bg-center">
                            <div
                                class="absolute inset-0 w-full h-full to-bg-black-10 bg-gradient-to-t from-black/80 via-black/50">
                            </div>
                        </div>
                        <div class="relative p-6 px-6 py-14 md:px-12">
                            <h2
                                class="mb-6 block font-sans text-xl font-medium leading-[1.5] tracking-normal text-white antialiased">
                                Manage various client accounts with ease using our multi-dashboard system. Tailor
                                administrative access for team members, enabling efficient management of multiple accounts
                                from a single, unified interface.
                            </h2>
                            <h5
                                class="block mb-4 font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-gray-400 bg-black py-2 rounded-xl hover:text-white transition-all">
                                Multi-Dashboard Agency Access
                            </h5>
                        </div>
                    </div>
                    <div
                        class="hover:scale-105 -mt-0 sm:-mt-20 md:-mt-20 lg:-mt-0 transition-all duration-500 hover:cursor-pointer relative grid h-[40rem] w-full w flex-col items-end justify-center overflow-hidden rounded-xl text-center">
                        <div
                            class="absolute inset-0 m-0 h-full w-full overflow-hidden rounded-none bg-transparent bg-[url('https://images.pexels.com/photos/8728561/pexels-photo-8728561.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1')] bg-cover bg-clip-border bg-center">
                            <div
                                class="absolute inset-0 w-full h-full to-bg-black-10 bg-gradient-to-t from-black/80 via-black/50">
                            </div>
                        </div>
                        <div class="relative p-6 px-6 py-14 md:px-12">
                            <h2
                                class="mb-6 block font-sans text-xl font-medium leading-[1.5] tracking-normal text-white antialiased">
                                Track your social media performance with detailed analytics. Gain insights into audience
                                behavior, engagement rates, and other key metrics to continuously refine your strategy and
                                maximize impact.
                            </h2>
                            <h5
                                class="block mb-4 font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-gray-400 bg-black py-2 rounded-xl hover:text-white transition-all">
                                Performance Analytics
                            </h5>
                        </div>
                    </div>
                    <div
                        class="hover:scale-105 -mt-0 sm:-mt-0 md:-mt-26 lg:-mt-20 transition-all duration-500 hover:cursor-pointer relative grid h-[35rem] w-full w flex-col items-end justify-center overflow-hidden rounded-xl text-center">
                        <div
                            class="absolute inset-0 m-0 h-full w-full overflow-hidden rounded-none bg-transparent bg-[url('https://images.pexels.com/photos/8728241/pexels-photo-8728241.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1')] bg-cover bg-clip-border bg-center">
                            <div
                                class="absolute inset-0 w-full h-full to-bg-black-10 bg-gradient-to-t from-black/80 via-black/50">
                            </div>
                        </div>
                        <div class="relative p-6 px-6 py-14 md:px-12">
                            <h2
                                class="mb-6 block font-sans text-xl font-medium leading-[1.5] tracking-normal text-white antialiased">
                                Choose from a diverse collection of customizable templates, specifically designed to cater
                                to different industries and occasions. These templates serve as a creative springboard for
                                your unique content.
                            </h2>
                            <h5
                                class="block mb-4 font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-gray-400 bg-black py-2 rounded-xl hover:text-white transition-all">
                                Customizable Templates
                            </h5>
                        </div>
                    </div>
                    <div
                        class="hover:scale-105 -mt-0 sm:-mt-0 md:-mt-26 lg:-mt-40 transition-all duration-500 hover:cursor-pointer relative grid h-[35rem] w-full w flex-col items-end justify-center overflow-hidden rounded-xl text-center">
                        <div
                            class="absolute inset-0 m-0 h-full w-full overflow-hidden rounded-none bg-transparent bg-[url('https://images.pexels.com/photos/8439061/pexels-photo-8439061.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1')] bg-cover bg-clip-border bg-center">
                            <div
                                class="absolute inset-0 w-full h-full to-bg-black-10 bg-gradient-to-t from-black/80 via-black/50">
                            </div>
                        </div>
                        <div class="relative p-6 px-6 py-14 md:px-12">
                            <h2
                                class="mb-6 block font-sans text-xl font-medium leading-[1.5] tracking-normal text-white antialiased">
                                Manage various client accounts with ease using our multi-dashboard system. Tailor
                                administrative access for team members, enabling efficient management of multiple accounts
                                from a single, unified interface.
                            </h2>
                            <h5
                                class="block mb-4 font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-gray-400 bg-black py-2 rounded-xl hover:text-white transition-all">
                                Multi-Dashboard Agency Access
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mx-auto rounded-3xl max-w-7xl mb-32  px-12 py-12">

                <h1 class="text-cyan-500 font-extrabold text-xl text-center">Benefits</h1>
                <h1 class="text-white font-extrabold text-5xl text-center">What our benefits are?</h1>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-12 mt-4">
                    <div
                        class="hover:scale-105 transition-all duration-500 hover:cursor-pointer relative grid h-[20rem] w-full w flex-col items-end justify-center overflow-hidden rounded-xl text-center">
                        <div
                            class="absolute inset-0 m-0 h-full w-full overflow-hidden rounded-none bg-transparent bg-[url('https://images.pexels.com/photos/8728388/pexels-photo-8728388.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1')] bg-cover bg-clip-border bg-center">
                            <div
                                class="absolute inset-0 w-full h-full to-bg-black-10 bg-gradient-to-t from-black/80 via-black/50">
                            </div>
                        </div>
                        <div class="relative p-6 px-6 py-14 md:px-12">
                            <h5
                                class="block mb-4 font-sans text-3xl antialiased font-semibold leading-snug tracking-normal text-white py-2 rounded-xl transition-all">
                                Showcase Expertise
                            </h5>
                            <h2
                                class="mb-6 block font-sans text-xl font-medium leading-[1.5] tracking-normal text-white antialiased">
                                Elevate your brand by sharing insightful content that highlights your expertise. Our AI
                                helps you create educational posts, tips, and industry insights that position you as a
                                thought leader.

                            </h2>
                        </div>
                    </div>
                    <div
                        class="hover:scale-105 transition-all duration-500 hover:cursor-pointer relative grid h-[20rem] w-full w flex-col items-end justify-center overflow-hidden rounded-xl text-center">
                        <div
                            class="absolute inset-0 m-0 h-full w-full overflow-hidden rounded-none bg-transparent bg-[url('https://images.pexels.com/photos/8728243/pexels-photo-8728243.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1')] bg-cover bg-clip-border bg-center">
                            <div
                                class="absolute inset-0 w-full h-full to-bg-black-10 bg-gradient-to-t from-black/80 via-black/50">
                            </div>
                        </div>
                        <div class="relative p-6 px-6 py-14 md:px-12">
                            <h5
                                class="block mb-4 font-sans text-3xl antialiased font-semibold leading-snug tracking-normal text-white py-2 rounded-xl transition-all">
                                Engage Your Audience
                            </h5>
                            <h2
                                class="mb-6 block font-sans text-xl font-medium leading-[1.5] tracking-normal text-white antialiased">
                                From interactive quizzes to informative how-to guides, engage your learners and clients with
                                diverse and compelling content.
                            </h2>
                        </div>
                    </div>
                    <div
                        class="hover:scale-105 transition-all duration-500 hover:cursor-pointer relative grid h-[20rem] w-full w flex-col items-end justify-center overflow-hidden rounded-xl text-center">
                        <div
                            class="absolute inset-0 m-0 h-full w-full overflow-hidden rounded-none bg-transparent bg-[url('https://images.pexels.com/photos/8728223/pexels-photo-8728223.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1')] bg-cover bg-clip-border bg-center">
                            <div
                                class="absolute inset-0 w-full h-full to-bg-black-10 bg-gradient-to-t from-black/80 via-black/50">
                            </div>
                        </div>
                        <div class="relative p-6 px-6 py-14 md:px-12">
                            <h5
                                class="block mb-4 font-sans text-3xl antialiased font-semibold leading-snug tracking-normal text-white py-2 rounded-xl transition-all">
                                Save Time and Resources
                            </h5>
                            <h2
                                class="mb-6 block font-sans text-xl font-medium leading-[1.5] tracking-normal text-white antialiased">
                                Spend less time on content creation and more on growing your business. Our AI-driven suite
                                handles the heavy lifting, allowing you to focus on your core activities.
                            </h2>
                        </div>
                    </div>
                    <div
                        class="hover:scale-105 transition-all duration-500 hover:cursor-pointer relative grid h-[20rem] w-full w flex-col items-end justify-center overflow-hidden rounded-xl text-center">
                        <div
                            class="absolute inset-0 m-0 h-full w-full overflow-hidden rounded-none bg-transparent bg-[url('https://images.pexels.com/photos/8728380/pexels-photo-8728380.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1')] bg-cover bg-clip-border bg-center">
                            <div
                                class="absolute inset-0 w-full h-full to-bg-black-10 bg-gradient-to-t from-black/80 via-black/50">
                            </div>
                        </div>
                        <div class="relative p-6 px-6 py-14 md:px-12">
                            <h5
                                class="block mb-4 font-sans text-3xl antialiased font-semibold leading-snug tracking-normal text-white py-2 rounded-xl transition-all">
                                Expand Your Reach:
                            </h5>
                            <h2
                                class="mb-6 block font-sans text-xl font-medium leading-[1.5] tracking-normal text-white antialiased">
                                With consistent and valuable content, attract and retain a larger following, opening doors
                                to new opportunities and collaborations.
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
