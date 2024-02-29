<template>
    <div
        class="flex flex-1 flex-col gap-5 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <div class="flex justify-between">
            <span class="flex gap-2 items-center">
                <img class="w-14 h-14 rounded-full"
                    src="https://cdn.discordapp.com/attachments/965523140920868924/1205223332618706984/image.png?ex=65e0d132&is=65ce5c32&hm=2ccfa16db2969f2f609aa633ca37a6a8ac37c59aabe9ec183f9f383c07329647&"
                    alt="Rounded avatar">
                <span class="flex flex-col">
                    <span>Team Name</span>
                    <span>Date / Title</span>
                </span>
            </span>
        </div>
        <p class="py-4 ">
           {{ formData.content }}
        </p>

        <Splide class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <SplideSlide v-if="this.formData.orderedFiles.length > 1"
                v-for="( item, index ) in  this.formData.orderedFiles " :key="index" class="w-full h-72 ">
                <img :src="item" alt="" class="object-contain h-full w-auto text-center mx-auto">
            </SplideSlide>
            <SplideSlide v-else>
                <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAUEBAAAACwAAAAAAQABAAACAkQBADs=" alt="" class="object-contain h-80 w-auto text-center mx-auto">
            </SplideSlide>
        </Splide>
        <div>
            <div class=" h-auto py-4 text-gray-500" v-if="PreviewData.ShowTags">
                how to win friends and influence people review,how to win friends and influence people summary,how to win
                friends and influence people,how to win friends,how to make friends,dale carnegie,leadership,book summary
            </div>
            <button @click="toggleTags()">Show Tags</button>
        </div>
    </div>
</template>

<script>
export default {
    props: ["PreviewData","formData"],
    setup() {
        return {}
    },
    methods: {
        toggleTags() {
            this.PreviewData.ShowTags = !this.PreviewData.ShowTags;
        },
    },
}
</script>

<style lang="scss" scoped></style>