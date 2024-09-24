<template>
    <AuthenticatedLayout>
        <div class="grid lg:grid-cols-12 gap-3 p-4">
            <div class="lg:col-span-3 lg:order-1 overflow-hidden">
                <FollowingList :users="followings" />
                <GroupList :groups="groups" class="h-10" />
            </div>
            <div class="lg:col-span-3 lg:order-3 h-full overflow-hidden">
                <UpcomingFeatures :users="followings" />
            </div>
            <div class="lg:col-span-6 lg:order-2 h-full overflow-hidden flex flex-col text-center">
                <p class="dark:text-gray-200 text-3xl">Plan</p>
                <p class="text-gray-200">Prefer sets it at night for next day</p>

                <!-- Display Submitted Values -->
                <div v-if="submitted" class="mt-10 text-left flex justify-center">
                    <div
                        class="p-6 bg-gray-100 dark:bg-gray-800 border border-gray-300 rounded-lg shadow-md w-full lg:w-3/4">
                        <h3 class="text-xl dark:text-gray-200 font-semibold mb-4 text-center">Today's plan</h3>

                        <!-- Total Time -->
                        <div class="flex justify-between py-2 border-b border-gray-200 dark:border-gray-700">
                            <span class="text-gray-500 dark:text-gray-400">Total Time:</span>
                            <span class="dark:text-gray-200 font-medium">{{ formData.totalTime }} minutes</span>
                        </div>

                        <!-- Total Entrance -->
                        <div class="flex justify-between py-2 border-b border-gray-200 dark:border-gray-700">
                            <span class="text-gray-500 dark:text-gray-400">Total Entrance:</span>
                            <span class="dark:text-gray-200 font-medium">{{ formData.totalEntrance }} times</span>
                        </div>

                        <!-- From -->
                        <div class="flex justify-between py-2 border-b border-gray-200 dark:border-gray-700">
                            <span class="text-gray-500 dark:text-gray-400">From:</span>
                            <span class="dark:text-gray-200 font-medium">{{ formData.timeOfDay.join(', ') }}</span>
                        </div>

                        <!-- On -->
                        <div class="flex justify-between py-2">
                            <span class="text-gray-500 dark:text-gray-400">On:</span>
                            <span class="dark:text-gray-200 font-medium">{{ formData.onActivity }}</span>
                        </div>
                    </div>
                </div>


                <!-- Form Section -->
                <div class="flex flex-col mt-6 p-8 space-y-4">
                    <!-- Total Time -->
                    <div class="flex items-center">
                        <label for="total-time" class="dark:text-gray-200 font-medium w-40 text-right">
                            Total Time:
                        </label>
                        <select id="total-time" v-model="formData.totalTime"
                            class="dark:bg-gray-800 dark:text-gray-200 border border-gray-300 rounded w-60 ml-4">
                            <option value="" disabled selected>Select total time</option>
                            <option value="10">10 minutes</option>
                            <option value="20">20 minutes</option>
                            <option value="120">120 minutes</option>
                            <option value="240">240 minutes</option>
                        </select>
                    </div>

                    <!-- Total Entrance -->
                    <div class="flex items-center">
                        <label for="total-entrance" class="dark:text-gray-200 font-medium w-40 text-right">
                            Total entrance:
                        </label>
                        <select id="total-entrance" v-model="formData.totalEntrance"
                            class="dark:bg-gray-800 dark:text-gray-200 border border-gray-300 rounded w-60 ml-4">
                            <option value="" disabled selected>Select total entrances</option>
                            <option value="2">2 times</option>
                            <option value="3">3 times</option>
                            <option value="5">5 times</option>
                            <option value="10">10 times</option>
                        </select>
                    </div>

                    <!-- From -->
                    <div class="flex items-center">
                        <label for="time-of-day" class="dark:text-gray-200 font-medium w-40 text-right">
                            From:
                        </label>
                        <select id="time-of-day" v-model="formData.timeOfDay"
                            class="dark:bg-gray-800 dark:text-gray-200 border border-gray-300 rounded w-60 ml-4 h-20"
                            multiple>
                            <option value="Early morning">Early morning</option>
                            <option value="Morning">Morning</option>
                            <option value="Noon">Noon</option>
                            <option value="Afternoon">Afternoon</option>
                            <option value="Evening">Evening</option>
                            <option value="Night">Night</option>
                            <option value="Midnight">Midnight</option>
                        </select>
                    </div>

                    <!-- On -->
                    <div class="flex items-center">
                        <label for="on-activity" class="dark:text-gray-200 font-medium w-40 text-right">
                            On:
                        </label>
                        <select id="on-activity" v-model="formData.onActivity"
                            class="dark:bg-gray-800 dark:text-gray-200 border border-gray-300 rounded w-60 ml-4"
                            multiple>
                            <option value="Videos">Videos</option>
                            <option value="Posts">Posts</option>
                            <option value="Networking">Networking</option>
                        </select>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex items-center space-x-4 justify-end mt-6">
                    <button @click="handleSubmit" class="bg-blue-500 text-white px-4 py-2 rounded">Submit</button>
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
import { reactive, ref } from "vue";

const props = defineProps({
    posts: Object,
    groups: Array,
    followings: Array
});

// Form data reactive object
const formData = reactive({
    totalTime: '',
    totalEntrance: '',
    timeOfDay: [],
    onActivity: ''
});

// Flag to show submitted values
const submitted = ref(false);

// Handle form submission
const handleSubmit = () => {
    submitted.value = true;  // Show the submitted values section
};
</script>
