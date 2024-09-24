<template>
    <AuthenticatedLayout>
        <div class="grid lg:grid-cols-12 gap-3 p-4">
            <div class="lg:col-span-3 lg:order-1  overflow-hidden">
                <FollowingList :users="followings" />
                <GroupList :groups="groups" class="h-10" />
            </div>
            <div class="lg:col-span-3 lg:order-3 h-full overflow-hidden">
                <UpcomingFeatures :users="followings" />
            </div>
            <div class="lg:col-span-6 lg:order-2 h-full overflow-hidden flex flex-col">
                <div class="max-w-[768px] mx-auto h-full overflow-auto dark:text-gray-200">

                    <!-- main content  -->
                    <div class="flex grid gap-2 lg:grid-cols-12 flex-col h-screen h-50 overflow-auto">
                        <div class="div-1 lg:col-span-3 space-y-2 h-60 overflow-auto">
                            <p
                                class="bg-blue-100 dark:bg-blue-800 text-blue-800 dark:text-blue-200 p-4 rounded-lg shadow-md hover:bg-blue-200 dark:hover:bg-blue-700 cursor-pointer transition">
                                I am organizing Islamic discussion in Dhaka
                            </p>
                            <p
                                class="bg-blue-100 dark:bg-blue-800 text-blue-800 dark:text-blue-200 p-4 rounded-lg shadow-md hover:bg-blue-200 dark:hover:bg-blue-700 cursor-pointer transition">
                                Notification Item 2
                            </p>
                            <p
                                class="bg-blue-100 dark:bg-blue-800 text-blue-800 dark:text-blue-200 p-4 rounded-lg shadow-md hover:bg-blue-200 dark:hover:bg-blue-700 cursor-pointer transition">
                                Notification Item 3
                            </p>
                            <p
                                class="bg-blue-100 dark:bg-blue-800 text-blue-800 dark:text-blue-200 p-4 rounded-lg shadow-md hover:bg-blue-200 dark:hover:bg-blue-700 cursor-pointer transition">
                                Notification Item 3
                            </p>
                            <p
                                class="bg-blue-100 dark:bg-blue-800 text-blue-800 dark:text-blue-200 p-4 rounded-lg shadow-md hover:bg-blue-200 dark:hover:bg-blue-700 cursor-pointer transition">
                                Notification Item 3
                            </p>
                            <p
                                class="bg-blue-100 dark:bg-blue-800 text-blue-800 dark:text-blue-200 p-4 rounded-lg shadow-md hover:bg-blue-200 dark:hover:bg-blue-700 cursor-pointer transition">
                                Notification Item 3
                            </p>
                            <p
                                class="bg-blue-100 dark:bg-blue-800 text-blue-800 dark:text-blue-200 p-4 rounded-lg shadow-md hover:bg-blue-200 dark:hover:bg-blue-700 cursor-pointer transition">
                                Notification Item 3
                            </p>
                            <!-- Repeat for other h1 elements -->
                        </div>

                        <!-- Tabs -->
                        <div class="div-2 lg:col-span-9">
                            <TabGroup>
                                <TabList
                                    class="flex flex-1 flex-wrap space-x-4 bg-gray-200 dark:bg-gray-800 p-2 border border-gray-300 dark:border-gray-600 rounded-lg">
                                    <Tab as="div"
                                        class="py-2 mb-2 px-4 rounded-lg border border-transparent hover:border-blue-500 dark:hover:border-blue-300 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 cursor-pointer transition hover:bg-gray-200 dark:hover:bg-gray-600"
                                        :class="{ 'bg-white dark:bg-gray-700 border-blue-500': selected }">
                                        <template #default="{ selected }">
                                            <span :class="{ 'font-bold': selected }">All</span>
                                        </template>
                                    </Tab>
                                    <Tab as="div"
                                        class="py-2 mb-2 px-4 rounded-lg border border-transparent hover:border-blue-500 dark:hover:border-blue-300 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 cursor-pointer transition hover:bg-gray-200 dark:hover:bg-gray-600"
                                        :class="{ 'bg-white dark:bg-gray-700 border-blue-500': selected }">
                                        <template #default="{ selected }">
                                            <span :class="{ 'font-bold': selected }">Social</span>
                                        </template>
                                    </Tab>
                                    <Tab as="div"
                                        class="py-2 mb-2 px-4 rounded-lg border border-transparent hover:border-blue-500 dark:hover:border-blue-300 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 cursor-pointer transition hover:bg-gray-200 dark:hover:bg-gray-600"
                                        :class="{ 'bg-white dark:bg-gray-700 border-blue-500': selected }">
                                        <template #default="{ selected }">
                                            <span :class="{ 'font-bold': selected }">Health</span>
                                        </template>
                                    </Tab>
                                    <Tab as="div"
                                        class="py-2 px-4 rounded-lg border border-transparent hover:border-blue-500 dark:hover:border-blue-300 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 cursor-pointer transition hover:bg-gray-200 dark:hover:bg-gray-600"
                                        :class="{ 'bg-white dark:bg-gray-700 border-blue-500': selected }">
                                        <template #default="{ selected }">
                                            <span :class="{ 'font-bold': selected }">Tuition</span>
                                        </template>
                                    </Tab>
                                    <Tab as="div"
                                        class="py-2 px-4 rounded-lg border border-transparent hover:border-blue-500 dark:hover:border-blue-300 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 cursor-pointer transition hover:bg-gray-200 dark:hover:bg-gray-600"
                                        :class="{ 'bg-white dark:bg-gray-700 border-blue-500': selected }">
                                        <template #default="{ selected }">
                                            <span :class="{ 'font-bold': selected }">Miscellaneous</span>
                                        </template>
                                    </Tab>
                                </TabList>

                                <!-- Tab Panels -->
                                <TabPanels class="flex-1 p-6 bg-gray-100 dark:bg-gray-900">
                                    <TabPanel>
                                        <p>I am <span class="underline">Rubel</span> organizing an <span class="underline">Islamic</span> event at <span class="underline"> Dhaka</span></p>
                                    </TabPanel>
                                    <TabPanel>
                                        <p>I am <span class="underline">Rubel</span> organizing an <span class="underline">pond cleaning</span> social work at <span class="underline"> Dhaka</span></p>
                                    </TabPanel>                                    
                                    <TabPanel>
                                        <p>I am <span class="underline">Rashed</span> organizing an <span class="underline">blood</span> collecting program at <span class="underline"> Dhaka</span></p>
                                    </TabPanel>
                                    <TabPanel>
                                        <p>I am <span class="underline">Malek</span>. Want to teach  <span class="underline">Physics</span> at <span class="underline"> Dhaka</span></p>
                                    </TabPanel><kbd></kbd>                                    
                                    <TabPanel>
                                        <p>I am <span class="underline">Abdur</span> want to plant <span class="underline">tree</span> social work at <span class="underline"> Sylhet</span></p>
                                    </TabPanel>
                                </TabPanels>
                            </TabGroup>
                        </div>
                    </div>
                    <!-- main content  -->
                    
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import GroupList from "@/Components/app/GroupList.vue";
import UpcomingFeatures from "@/Components/app/UpcomingFeatures.vue";
import FollowingList from "@/Components/app/FollowingList.vue";
import { TabGroup, TabList, Tab, TabPanels, TabPanel } from '@headlessui/vue'

const props = defineProps({
    posts: Object,
    groups: Array,
    followings: Array
});

</script>