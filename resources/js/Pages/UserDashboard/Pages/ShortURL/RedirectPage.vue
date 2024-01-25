<script setup></script>

<template>
    <div class="bg-black h-screen">
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

        <div class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
            <h1
                class="text-5xl py-2 font-extrabold bg-gradient-to-r from-blue-800 via-purple-500 to-pink-500 bg-clip-text text-transparent">
                Redirecting to your website immediately :>
            </h1>
        </div>

        <div class="fixed bottom-0 left-1/2 transform -translate-x-1/2">
            <h1
                class="text-2xl font-extrabold py-24 bg-gradient-to-r from-blue-800 via-purple-500 to-pink-500 bg-clip-text text-transparent">
                You are being redirected by {{ app_name }}
            </h1>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        company: String,
        original_url: String,
        pixel_script: String
    },

    data() {
        return {
            app_name: import.meta.env.VITE_APP_NAME
        }
    },

    mounted() {
        const parser = new DOMParser();
        let vitrualDocument = parser.parseFromString(this.$page.props.pixel_script, 'text/html');
        const pixel = vitrualDocument.head.getElementsByTagName('script')[0];
        document.head.appendChild(pixel);

        setTimeout(() => {
            window.location.href = this.original_url;
        }, 2000);
    },

    methods: {
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
