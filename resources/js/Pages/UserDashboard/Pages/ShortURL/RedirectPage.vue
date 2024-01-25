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
        original_url: String
    },

    data() {
        return {
            app_name: import.meta.env.VITE_APP_NAME || 'Laravel'
        }
    },

    mounted() {
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


.rainbow {
    animation: rainbow 12s linear;
    animation-iteration-count: infinite;
}


@keyframes rainbow {

    100%,
    0% {
        color: rgb(255, 0, 0);
    }

    8% {
        color: rgb(255, 127, 0);
    }

    16% {
        color: rgb(255, 255, 0);
    }

    25% {
        color: rgb(127, 255, 0);
    }

    33% {
        color: rgb(0, 255, 0);
    }

    41% {
        color: rgb(0, 255, 127);
    }

    50% {
        color: rgb(0, 255, 255);
    }

    58% {
        color: rgb(0, 127, 255);
    }

    66% {
        color: rgb(0, 0, 255);
    }

    75% {
        color: rgb(127, 0, 255);
    }

    83% {
        color: rgb(255, 0, 255);
    }

    91% {
        color: rgb(255, 0, 127);
    }
}
</style>
