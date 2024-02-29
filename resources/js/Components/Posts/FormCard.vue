<script setup>
import TextInput from '@/Components/TextInput.vue';
import draggable from 'vuedraggable'
</script>
<template>
    <div
        class="flex flex-1 flex-col p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <form class="flex flex-col gap-4">
            <input type="text"
                class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Post Title" v-model="formData.title">

            <textarea id="message" rows="4" v-model="formData.content"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Write your thoughts here..."></textarea>

            <div class="flex items-center justify-center w-full">
                <label for="dropzone-file"
                    class="flex  items-center justify-center w-full h-fit border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                    <div class="flex flex-col items-center justify-center  h-full w-full">
                        <template v-if="formData.orderedFiles.length < 1">
                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400 mt-5 " aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click
                                    to upload</span> or drag and drop</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mb-6">SVG, PNG, JPG or GIF (MAX.
                                800x400px)
                            </p>
                        </template>
                        <template v-else>
                            <draggable v-model="formData.orderedFiles" @start="dragState = true" @end="dragState = false"
                                item-key="id" class="flex h-full w-full  gap-4 flex-wrap p-4 items-center justify-center">
                                <template #item="{ element }">
                                    <div class=" bg-gray-900 p-2 px-4 rounded-lg flex-2">
                                        <img :src="element" class="object-contain h-14 ">
                                    </div>
                                </template>
                            </draggable>
                        </template>
                    </div>


                    <input id="dropzone-file" type="file" class="hidden" v-on:change="handleFileUpload" multiple />
                </label>
            </div>

            <div
                class="flex flex-col sm:flex-row items-center justify-between w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                Dimanyc Tags System API

                <label class="felx items-center cursor-pointer ">
                    <input type="checkbox" value="" class="sr-only peer" v-model="formData.dynamicTagsState">
                    <div
                        class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-800 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                    </div>
                </label>
            </div>
            <div class="flex gap-5 justify-between content-stretch flex-col lg:flex-row ">
                <VDatePicker v-model="formData.postDate" mode="dateTime">
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
</template>

<script>
export default {
    props: ["formData", "PreviewData","dragState"],
    setup() {
        return {}
    },
    methods: {
        handleFileUpload(event) {
            for (let i = 0; i < event.target.files.length; i++) {
                this.formData.orderedFiles.push(
                    URL.createObjectURL(event.target.files[i])
                );
            }
        },
    },   
    components: {
        draggable,
    }
}
</script>

<style lang="scss" scoped></style>