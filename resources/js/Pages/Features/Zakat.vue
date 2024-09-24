<template>
    <AuthenticatedLayout>
        <div class="p-8 max-w-[768px] mx-auto h-full overflow-auto dark:text-gray-200">
            <h2 class="text-xl font-bold mb-4">Customer Information</h2>
            <div class="">
                <!-- <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-6"> -->
                    <div>
                    <!-- <section class="lg:col-span-2"> -->
                        <!-- <h2 class="text-xl font-bold mb-4">Customer Information</h2> -->
                        <div class="bg-white p-4 rounded-lg shadow dark:bg-slate-900 dark:text-gray-200">
                            <div class="mb-4">
                                <label for="name" class="block text-gray-700 dark:text-gray-200">Name</label>
                                <input type="text" id="name"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-slate-900 dark:text-gray-200">
                            </div>
                            <div class="mb-4">
                                <label for="name" class="block text-gray-700 dark:text-gray-200">Worthy</label>
                                <input type="text" id="name"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-slate-900 dark:text-gray-200">
                            </div>
                            <div class="mb-4">
                                <label for="name" class="block text-gray-700 dark:text-gray-200">Details</label>
                                <input type="text" id="name"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-slate-900 dark:text-gray-200">
                            </div>
                        </div>
                    <!-- </section> -->
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputTextarea from '@/Components/InputTextarea.vue';
</script>