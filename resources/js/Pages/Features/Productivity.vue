<template>
    <AuthenticatedLayout>
        <div class="p-8 mx-auto h-full overflow-auto grid lg:grid-cols-12 gap-3">
            <div class="lg:col-span-3 lg:order-1  overflow-hidden">
                <FollowingList :users="followings" />
                <GroupList :groups="groups" class="h-10" />
            </div>            
            <div class="lg:col-span-3 lg:order-3 h-full overflow-hidden">
                <UpcomingFeatures :users="followings" />
            </div>
            <!-- main content  -->
            <div class="min-h-screen bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200 lg:col-span-6 lg:order-2 h-full overflow-hidden flex flex-col">
                <!-- Header -->
                <header class="bg-white dark:bg-gray-800 shadow-md py-4 px-6 flex justify-between items-center">
                    <div class="text-2xl font-bold">Productivity App</div>
                    <div class="flex items-center space-x-4">
                        <button class="bg-blue-500 text-white px-4 py-2 rounded">Add Task</button>
                        <img src="/img/default_cover.jpg" alt="Profile" class="w-10 h-10 rounded-full">
                    </div>
                </header>

                <!-- Main Content with Tabs -->
                <div class="flex flex-col h-screen">
                    <!-- Tabs -->
                    <TabGroup>
                        <div>
                            <TabList class="flex flex-wrap space-x-4 bg-gray-200 dark:bg-gray-800 p-4">
                                <Tab as="div"
                                    class="py-2 px-4 rounded cursor-pointer hover:bg-gray-300 dark:hover:bg-gray-700"
                                    :class="{ 'bg-white dark:bg-gray-700': selected }">
                                    <template #default="{ selected }">
                                        <span :class="{ 'font-bold': selected }">Dashboard</span>
                                    </template>
                                </Tab>
                                <Tab as="div"
                                    class="py-2 px-4 rounded cursor-pointer hover:bg-gray-300 dark:hover:bg-gray-700"
                                    :class="{ 'bg-white dark:bg-gray-700': selected }">
                                    <template #default="{ selected }">
                                        <span :class="{ 'font-bold': selected }">Tasks</span>
                                    </template>
                                </Tab>
                                <Tab as="div"
                                    class="py-2 px-4 rounded cursor-pointer hover:bg-gray-300 dark:hover:bg-gray-700"
                                    :class="{ 'bg-white dark:bg-gray-700': selected }">
                                    <template #default="{ selected }">
                                        <span :class="{ 'font-bold': selected }">Projects</span>
                                    </template>
                                </Tab>
                                <Tab as="div"
                                    class="py-2 px-4 rounded cursor-pointer hover:bg-gray-300 dark:hover:bg-gray-700"
                                    :class="{ 'bg-white dark:bg-gray-700': selected }">
                                    <template #default="{ selected }">
                                        <span :class="{ 'font-bold': selected }">Calendar</span>
                                    </template>
                                </Tab>
                                <Tab as="div"
                                    class="py-2 px-4 rounded cursor-pointer hover:bg-gray-300 dark:hover:bg-gray-700"
                                    :class="{ 'bg-white dark:bg-gray-700': selected }">
                                    <template #default="{ selected }">
                                        <span :class="{ 'font-bold': selected }">Settings</span>
                                    </template>
                                </Tab>
                            </TabList>
                            <!-- Tab Panels -->
                            <TabPanels class="flex-1 p-6 bg-gray-100 dark:bg-gray-900">
                                <TabPanel>
                                    <h1 class="text-3xl font-bold mb-6">Dashboard</h1>
                                    <!-- Dashboard Content -->
                                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
                                        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-4">
                                            <h2 class="text-xl font-semibold mb-2">Tasks Completed</h2>
                                            <p class="text-2xl font-bold">45</p>
                                        </div>
                                        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-4">
                                            <h2 class="text-xl font-semibold mb-2">Projects</h2>
                                            <p class="text-2xl font-bold">12</p>
                                        </div>
                                        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-4">
                                            <h2 class="text-xl font-semibold mb-2">Upcoming Deadlines</h2>
                                            <p class="text-2xl font-bold">5</p>
                                        </div>
                                    </div>
                                </TabPanel>
                                <TabPanel>
                                    <h1 class="text-3xl font-bold mb-6">Tasks</h1>
                                    <!-- Tasks Content -->
                                    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
                                        <div class="p-4 border-b border-gray-200 dark:border-gray-700">
                                            <div class="flex justify-between items-center">
                                                <span>Design Homepage</span>
                                                <span class="text-gray-500">Due in 3 days</span>
                                            </div>
                                        </div>
                                        <div class="p-4 border-b border-gray-200 dark:border-gray-700">
                                            <div class="flex justify-between items-center">
                                                <span>Write Blog Post</span>
                                                <span class="text-gray-500">Due in 5 days</span>
                                            </div>
                                        </div>
                                        <div class="p-4 border-b border-gray-200 dark:border-gray-700">
                                            <div class="flex justify-between items-center">
                                                <span>Update Portfolio</span>
                                                <span class="text-gray-500">Due in 1 week</span>
                                            </div>
                                        </div>
                                        <div class="p-4">
                                            <div class="flex justify-between items-center">
                                                <span>Plan Marketing Campaign</span>
                                                <span class="text-gray-500">Due in 2 weeks</span>
                                            </div>
                                        </div>
                                    </div>
                                </TabPanel>
                                <TabPanel>
                                    <h1 class="text-3xl font-bold mb-6">Projects</h1>
                                    <!-- Projects Content -->
                                    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
                                        <div class="p-4 border-b border-gray-200 dark:border-gray-700">
                                            <div class="flex justify-between items-center">
                                                <span>Design Homepage</span>
                                                <span class="text-gray-500">Due in 3 days</span>
                                            </div>
                                        </div>
                                        <div class="p-4 border-b border-gray-200 dark:border-gray-700">
                                            <div class="flex justify-between items-center">
                                                <span>Write Blog Post</span>
                                                <span class="text-gray-500">Due in 5 days</span>
                                            </div>
                                        </div>
                                        <div class="p-4 border-b border-gray-200 dark:border-gray-700">
                                            <div class="flex justify-between items-center">
                                                <span>Update Portfolio</span>
                                                <span class="text-gray-500">Due in 1 week</span>
                                            </div>
                                        </div>
                                        <div class="p-4">
                                            <div class="flex justify-between items-center">
                                                <span>Plan Marketing Campaign</span>
                                                <span class="text-gray-500">Due in 2 weeks</span>
                                            </div>
                                        </div>
                                    </div>
                                </TabPanel>
                                <TabPanel>
                                    <h1 class="text-3xl font-bold mb-6">Calendar</h1>
                                    <!-- Calendar Content -->
                                    <p>Calendar content goes here...</p>
                                </TabPanel>
                                <TabPanel>
                                    <h1 class="text-3xl font-bold mb-6">Settings</h1>
                                    <div class="space-y-4">
                                        <!-- Dark Mode Option -->
                                        <div class="flex items-center justify-between">
                                            <label class="font-bold">Dark Mode</label>
                                            <input type="checkbox" class="rounded border-gray-300 dark:border-gray-600">
                                        </div>

                                        <!-- Notifications Option -->
                                        <div class="flex items-center justify-between">
                                            <label class="font-bold">Notifications</label>
                                            <select class="rounded border-gray-300 text-gray-900 dark:border-gray-600 dark:bg-slate-900 dark:text-gray-200
                     md:w-1/2">
                                                <option value="all">All</option>
                                                <option value="important">Important Only</option>
                                                <option value="none">None</option>
                                            </select>
                                        </div>

                                        <!-- Timezone Option -->
                                        <div class="flex items-center justify-between">
                                            <label class="font-bold">Timezone</label>
                                            <select class="rounded border-gray-300 text-gray-900 dark:text-gray-200 dark:bg-slate-900 dark:border-gray-600
                     sm:w-1/2">
                                                <option value="gmt">GMT</option>
                                                <option value="est">EST</option>
                                                <option value="pst">PST</option>
                                            </select>
                                        </div>
                                        <!-- Add more settings options as needed -->
                                    </div>
                                </TabPanel>
                            </TabPanels>
                        </div>
                    </TabGroup>
                </div>
            </div>
            <!-- main content  -->
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "../../Layouts/AuthenticatedLayout.vue"
import { TabGroup, TabList, Tab, TabPanels, TabPanel } from '@headlessui/vue'
import GroupList from "@/Components/app/GroupList.vue";
import UpcomingFeatures from "@/Components/app/UpcomingFeatures.vue";
import FollowingList from "@/Components/app/FollowingList.vue";

const props = defineProps({
    posts: Object,
    groups: Array,
    followings: Array
});

</script>