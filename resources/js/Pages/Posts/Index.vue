<script setup>
import TextInput from '@/Components/TextInput.vue';
import UserLayout from '@/Layouts/UserLayout.vue';
import draggable from 'vuedraggable'

</script>

<template>
    <UserLayout title="Posts">
        <div class="container mx-auto flex  gap-5">
            <div
                class="flex flex-1 flex-col p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <form class="flex flex-col gap-4">
                    <input type="text"
                        class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Post Title" v-model="PostForm.title">

                    <textarea id="message" rows="4" v-model="PostForm.content"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Write your thoughts here..."></textarea>

                    <div class="flex items-center justify-center w-full">
                        <label for="dropzone-file"
                            class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6"
                                v-if="previewImageData.length < 1">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click
                                        to upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)
                                </p>
                            </div>

                            <input id="dropzone-file" type="file" class="hidden" v-on:change="handleFileUpload" multiple />
                        </label>
                    </div>
                    <div
                        class="flex items-center justify-between w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <draggable v-model="testArray" @start="drag = true" @end="drag = false" item-key="id"
                            class="flex flex-row gap-2">
                            <template #item="{ element }">
                                <div class=" bg-gray-900 p-2 px-4 rounded-lg"> {{ element }} </div>
                            </template>
                        </draggable>
                        <draggable v-model="testArray" @start="drag = true" @end="drag = false" item-key="id"
                            class="flex flex-row gap-2">
                            <template #item="{ element }">
                                <div class=" bg-gray-900 p-2 px-4 rounded-lg"> {{ element }} </div>
                            </template>
                        </draggable>
                    </div>
                    <div
                        class="flex items-center justify-between w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <draggable v-model="this.PostForm.orderedFiles" @start="drag = true" @end="drag = false" item-key="id"
                            class="flex flex-row gap-2">
                            <template #item="{ element }">
                                <div class=" bg-gray-900 p-2 px-4 rounded-lg"> 
                                    <img :src="element" width="50" height="59"> 
                                </div>
                            </template>
                        </draggable>

                    </div>
                    <div
                        class="flex items-center justify-between w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        Dimanyc Tags System API

                        <label class="inline-flex items-center cursor-pointer">
                            <input type="checkbox" value="" class="sr-only peer" v-model="PostForm.dynamicTagsState">
                            <div
                                class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-800 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                            </div>
                        </label>
                    </div>
                    <div class="flex gap-5 justify-between content-stretch">
                        <VDatePicker v-model="PostForm.postDate" mode="dateTime">
                            <template #default="{ inputValue, inputEvents }">
                                <input :value="inputValue" v-on="inputEvents" type="text"
                                    class="flex-1 w-full h-100 text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                            </template>
                        </VDatePicker>
                        <span class="flex gap-4 flex-1  ">
                            <button type="button"
                                class=" flex-1  h-100 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Publish</button>
                            <button type="button"
                                class=" flex-1  h-100 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Save</button>
                        </span>
                    </div>
                </form>
            </div>
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
                    <span
                        class="flex gap-4 text-gray-900 bg-gray-50 rounded-full p-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <img class="w-10 h-10 rounded-full"
                            src="https://cdn.discordapp.com/attachments/965523140920868924/1205223332618706984/image.png?ex=65e0d132&is=65ce5c32&hm=2ccfa16db2969f2f609aa633ca37a6a8ac37c59aabe9ec183f9f383c07329647&"
                            alt="Rounded avatar">
                        <img class="w-10 h-10 rounded-full"
                            src="https://cdn.discordapp.com/attachments/965523140920868924/1205223332618706984/image.png?ex=65e0d132&is=65ce5c32&hm=2ccfa16db2969f2f609aa633ca37a6a8ac37c59aabe9ec183f9f383c07329647&"
                            alt="Rounded avatar">
                        <img class="w-10 h-10 rounded-full"
                            src="https://cdn.discordapp.com/attachments/965523140920868924/1205223332618706984/image.png?ex=65e0d132&is=65ce5c32&hm=2ccfa16db2969f2f609aa633ca37a6a8ac37c59aabe9ec183f9f383c07329647&"
                            alt="Rounded avatar">
                        <img class="w-10 h-10 rounded-full"
                            src="https://cdn.discordapp.com/attachments/965523140920868924/1205223332618706984/image.png?ex=65e0d132&is=65ce5c32&hm=2ccfa16db2969f2f609aa633ca37a6a8ac37c59aabe9ec183f9f383c07329647&"
                            alt="Rounded avatar">
                    </span>
                </div>
                <p class="p-4 ">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corrupti laborum quam esse suscipit sint
                    voluptatibus, nemo quod sit excepturi modi eveniet ratione omnis, exercitationem sunt libero natus
                    blanditiis harum magnam vitae, voluptates quae! Veritatis ad quasi soluta. Aperiam, cupiditate quo?
                </p>

                <Splide class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <SplideSlide v-if="previewImageData" v-for="(item, index) in previewImageData" :key="index">
                        <img :src="item" alt="">
                    </SplideSlide>
                </Splide>

            </div>
        </div>

    </UserLayout>
</template>

<script>

export default {
    data() {
        return {
            PostForm: {
                title: '',
                content: '',
                images: null,
                postDate: new Date(),
                dynamicTagsState: false,
                files: [],
                orderedFiles: [],
            },
            testArray: [1, 2, 3, 4, 5, 6],
            drag: false,
            previewImageData: [],
        };
    },
    methods: {
        handleFileUpload(event) {
            for (let i = 0; i < event.target.files.length; i++) {
                this.PostForm.files.push(event.target.files[i]);
            }
            this.createIamgePreview();
        },
        createIamgePreview() {
            this.previewImageData = this.PostForm.files.map((file) => {
                return URL.createObjectURL(file);
            });
        }
    },
    setup() {
        return {}
    },
    components: {
        draggable,
    }
}
</script>

