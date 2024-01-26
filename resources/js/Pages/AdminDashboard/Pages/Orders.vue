<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';

import { useForm } from '@inertiajs/vue3';
</script>

<template>
    <AdminLayout>
        <div class="px-12 mx-auto">
            <h1 class="text-4xl font-extrabold">Mini Shop Orders</h1>

            <div class="relative overflow-x-auto rounded-2xl mt-12">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
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
                        <tr v-for="(order, index) in orders" :key="index" class="bg-white border-b">
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowraps" id="order_id" :data-order_id="order.id">
                                #{{ order.id }}
                            </td>
                            <td class="px-6 py-4 border-l font-medium text-gray-900 whitespace-nowraps">
                                {{ order.email }}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowraps">
                                <a :href="order.post_url" class="underline">Post</a>
                            </td>
                            <td class="px-6 py-4 border-l">
                                {{ order.likesUnits }} likes
                            </td>
                            <td class="px-6 py-4 border-r font-medium text-gray-900 whitespace-nowraps">
                                ${{ order.likesValue }}
                            </td>
                            <td class="px-6 py-4">
                                {{ order.commentsUnits }} comments
                            </td>
                            <td class="px-6 py-4 border-r font-medium text-gray-900 whitespace-nowraps">
                                ${{ order.commentsValue }}
                            </td>
                            <td class="px-6 py-4">
                                {{ order.sharesUnits }} shares
                            </td>
                            <td class="px-6 py-4 border-r font-medium text-gray-900 whitespace-nowraps">
                                ${{ order.sharesValue }}
                            </td>
                            <td class="px-6 py-4">
                                {{ order.savesUnits }} saves
                            </td>
                            <td class="px-6 py-4 border-r font-medium text-gray-900 whitespace-nowraps">
                                ${{ order.savesValue }}
                            </td>
                            <td class="px-6 py-4 text-lg border-r font-medium text-gray-900 whitespace-nowraps">
                                ${{ order.total }}
                            </td>
                            <td class="px-6 py-4 border-r">
                                <form @confirmStatus.prevent="confirmStatus">
                                    <select id="status" @input="confirmStatus(order.id)"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full">
                                        <option selected>{{ order.status }}</option>
                                        <option value="On Hold">On Hold</option>
                                        <option value="Delivered">Delivered</option>
                                        <option value="Processing">Processing</option>
                                    </select>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AdminLayout>
</template>

<script>
export default {
    props: {
        orders: Array
    },

    data() {
        return {
            form: useForm({
                order_id: '',
                status: '',
            }),
        }
    },

    methods: {
        confirmStatus(id) {
            this.form.status = document.getElementById('status').value;
            this.form.order_id = id;

            this.form.post(route('admin.minishop.orders.store'), {
                onSuccess: () => [],
                onError: (error) => [],
                onFinish: () => [],
            });
        }
    },
}
</script>