<script setup>
import UserLayout from '@/Layouts/UserLayout.vue';
</script>

<template>
    <UserLayout>
        <div class="mx-auto rounded-2xl py-6 px-6">
            <div class="px-6 py-6">
                <h1 class="text-4xl font-extrabold">Orders</h1>


                <div class="relative overflow-x-auto mt-4 rounded-2xl ">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <thead class="text-xs text-white uppercase bg-gray-800">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    URL
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Likes Units
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Likes Value
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Comments Units
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Comments Price
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Shares Units
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Shares Price
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Saves Units
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Saves Price
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Total
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(order, index) in orders" :key="index" class="bg-gray-900 border-b border-gray-700">
                                <td class="px-6 py-4 font-medium text-white whitespace-nowraps" id="order_id"
                                    :data-order_id="order.id">
                                    #{{ order.id }}
                                </td>
                                <td class="px-6 py-4 border-l border-gray-700 font-medium text-white whitespace-nowraps">
                                    {{ order.email }}
                                </td>
                                <td class="px-6 py-4 font-medium text-white whitespace-nowraps">
                                    <a :href="order.post_url" class="underline">Post</a>
                                </td>
                                <td class="px-6 py-4 border-l border-gray-700">
                                    {{ order.likesUnits }} likes
                                </td>
                                <td class="px-6 py-4 border-r border-gray-700 font-medium text-white whitespace-nowraps">
                                    ${{ order.likesValue }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ order.commentsUnits }} comments
                                </td>
                                <td class="px-6 py-4 border-r border-gray-700 font-medium text-white whitespace-nowraps">
                                    ${{ order.commentsValue }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ order.sharesUnits }} shares
                                </td>
                                <td class="px-6 py-4 border-r border-gray-700 font-medium text-white whitespace-nowraps">
                                    ${{ order.sharesValue }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ order.savesUnits }} saves
                                </td>
                                <td class="px-6 py-4 border-r border-gray-700 font-medium text-white whitespace-nowraps">
                                    ${{ order.savesValue }}
                                </td>
                                <td
                                    class="px-6 py-4 text-lg border-r border-gray-700 font-medium text-white whitespace-nowraps">
                                    ${{ order.total }}
                                </td>
                                <td class="px-6 py-4 border-r border-gray-700"
                                    :class="{ 'text-green-500': order.status === 'Delivered', 'text-blue-500': order.status === 'Proccesing', 'text-yellow-500': order.status === 'On Hold' }">
                                    {{ order.status }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </UserLayout>
</template>

<script>
export default {
    props: {
        orders: Array
    }
}
</script>