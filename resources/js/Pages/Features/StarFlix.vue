<template>
    <AuthenticatedLayout>
        <div class="grid lg:grid-cols-12 gap-3 p-4 mx-auto h-full overflow-auto">
            <div class="lg:col-span-3 lg:order-1 overflow-hidden">
                <FollowingList :users="followings" />
                <GroupList :groups="groups" class="h-10" />
            </div>
            <div class="lg:col-span-3 lg:order-3 h-full overflow-hidden">
                <UpcomingFeatures :users="followings" />
            </div>
            <div class="lg:col-span-6 lg:order-2 h-full overflow-hidden flex flex-col text-center dark:bg-gray-900 text-gray-700 dark:text-gray-200">
                    <header class="dark:bg-black px-4 py-2 flex flex-wrap gap-2 items-center justify-between">
                        <div class="flex items-center">
                            <img src="https://placehold.co/400" alt="Logo" class="h-8">
                            <span class="ml-2 text-lg font-bold">Starflix</span>
                        </div>
                        <nav class="flex flex-wrap ml-2">
                            <a href="#" class="text-gray-400 hover:text-white ml-4">Home</a>
                            <a href="#" class="text-gray-400 hover:text-white ml-4">Movies</a>
                            <a href="#" class="text-gray-400 hover:text-white ml-4">TV Shows</a>
                        </nav>
                    </header>
                <main class="px-4 py-8">
                    <!-- Featured section  -->
                    <section class="mb-8">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-2xl font-bold">Featured</h2>
                            <a href="#" class="text-gray-400 hover:text-white">View All</a>
                        </div>
                        <div class="overflow-x-auto">
                            <div class="flex space-x-4 w-20 h-20">
                                <!-- Carousel item -->
                                <div class="dark:bg-gray-800 rounded-lg overflow-hidden shadow-lg flex-shrink-0 ">
                                    <img src="https://placehold.co/400" alt="Movie Title"
                                        class="w-20 h-20 object-cover">
                                    <div class="p-4 w-20">
                                        <h3 class="text-lg font-bold mb-2">Movie Title</h3>
                                        <p class="text-gray-400">Ddescription</p>
                                    </div>
                                </div>
                                <div class="dark:dark:bg-gray-800 rounded-lg overflow-hidden shadow-lg flex-shrink-0 ">
                                    <img src="https://placehold.co/400" alt="Movie Title"
                                        class="w-20 h-20 object-cover">
                                    <div class="p-4 w-20">
                                        <h3 class="text-lg font-bold mb-2">Movie Title</h3>
                                        <p class="text-gray-400">Ddescription</p>
                                    </div>
                                </div>
                                <div class="dark:dark:bg-gray-800 rounded-lg overflow-hidden shadow-lg flex-shrink-0 ">
                                    <img src="https://placehold.co/400" alt="Movie Title"
                                        class="w-20 h-20 object-cover">
                                    <div class="p-4 w-20">
                                        <h3 class="text-lg font-bold mb-2">Movie Title</h3>
                                        <p class="text-gray-400">Ddescription</p>
                                    </div>
                                </div>
                                <div class="dark:dark:bg-gray-800 rounded-lg overflow-hidden shadow-lg flex-shrink-0 ">
                                    <img src="https://placehold.co/400" alt="Movie Title"
                                        class="w-20 h-20 object-cover">
                                    <div class="p-4 w-20">
                                        <h3 class="text-lg font-bold mb-2">Movie Title</h3>
                                        <p class="text-gray-400">Ddescription</p>
                                    </div>
                                </div>
                                <div class="dark:dark:bg-gray-800 rounded-lg overflow-hidden shadow-lg flex-shrink-0 ">
                                    <img src="https://placehold.co/400" alt="Movie Title"
                                        class="w-20 h-20 object-cover">
                                    <div class="p-4 w-20">
                                        <h3 class="text-lg font-bold mb-2">Movie Title</h3>
                                        <p class="text-gray-400">Ddescription</p>
                                    </div>
                                </div>
                                <div class="dark:dark:bg-gray-800 rounded-lg overflow-hidden shadow-lg flex-shrink-0 ">
                                    <img src="https://placehold.co/400" alt="Movie Title"
                                        class="w-20 h-20 object-cover">
                                    <div class="p-4 w-20">
                                        <h3 class="text-lg font-bold mb-2">Movie Title</h3>
                                        <p class="text-gray-400">Ddescription</p>
                                    </div>
                                </div>
                                <div class="dark:bg-gray-800 rounded-lg overflow-hidden shadow-lg flex-shrink-0 ">
                                    <img src="https://placehold.co/400" alt="Movie Title"
                                        class="w-20 h-20 object-cover">
                                    <div class="p-4 w-20">
                                        <h3 class="text-lg font-bold mb-2">Movie Title</h3>
                                        <p class="text-gray-400">Ddescription</p>
                                    </div>
                                </div>
                                <div class="dark:bg-gray-800 rounded-lg overflow-hidden shadow-lg flex-shrink-0 ">
                                    <img src="https://placehold.co/400" alt="Movie Title"
                                        class="w-20 h-20 object-cover">
                                    <div class="p-4 w-20">
                                        <h3 class="text-lg font-bold mb-2">Movie Title</h3>
                                        <p class="text-gray-400">Ddescription</p>
                                    </div>
                                </div>
                                <!-- Repeat for other featured items -->
                            </div>
                        </div>
                    </section>

                    <!-- Trending  -->
                    <section class="mb-8">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-2xl font-bold">Trending Now</h2>
                            <a href="#" class="text-gray-400 hover:text-white">View All</a>
                        </div>
                        <div class="flex overflow-x-auto space-x-4">
                            <!-- Carousel items -->
                            <div class="dark:bg-gray-800 rounded-lg overflow-hidden shadow-lg flex-shrink-0 ">
                                <img src="https://placehold.co/400" alt="Show Title" class="w-20 h-20 object-cover">
                                <div class="p-4 w-20">
                                    <h3 class="text-lg font-bold mb-2">Show Title</h3>
                                    <p class="text-gray-400">Ddescription</p>
                                </div>
                            </div>
                            <div class="dark:bg-gray-800 rounded-lg overflow-hidden shadow-lg flex-shrink-0 ">
                                <img src="https://placehold.co/400" alt="Show Title" class="w-20 h-20 object-cover">
                                <div class="p-4 w-20">
                                    <h3 class="text-lg font-bold mb-2">Show Title</h3>
                                    <p class="text-gray-400">Ddescription</p>
                                </div>
                            </div>
                            <div class="dark:bg-gray-800 rounded-lg overflow-hidden shadow-lg flex-shrink-0 ">
                                <img src="https://placehold.co/400" alt="Show Title" class="w-20 h-20 object-cover">
                                <div class="p-4 w-20">
                                    <h3 class="text-lg font-bold mb-2">Show Title</h3>
                                    <p class="text-gray-400">Ddescription</p>
                                </div>
                            </div>
                            <div class="dark:bg-gray-800 rounded-lg overflow-hidden shadow-lg flex-shrink-0 ">
                                <img src="https://placehold.co/400" alt="Show Title" class="w-20 h-20 object-cover">
                                <div class="p-4 w-20">
                                    <h3 class="text-lg font-bold mb-2">Show Title</h3>
                                    <p class="text-gray-400">Ddescription</p>
                                </div>
                            </div>
                            <div class="dark:bg-gray-800 rounded-lg overflow-hidden shadow-lg flex-shrink-0 ">
                                <img src="https://placehold.co/400" alt="Show Title" class="w-20 h-20 object-cover">
                                <div class="p-4 w-20">
                                    <h3 class="text-lg font-bold mb-2">Show Title</h3>
                                    <p class="text-gray-400">Ddescription</p>
                                </div>
                            </div>
                            <div class="dark:bg-gray-800 rounded-lg overflow-hidden shadow-lg flex-shrink-0 ">
                                <img src="https://placehold.co/400" alt="Show Title" class="w-20 h-20 object-cover">
                                <div class="p-4 w-20">
                                    <h3 class="text-lg font-bold mb-2">Show Title</h3>
                                    <p class="text-gray-400">Ddescription</p>
                                </div>
                            </div>
                            <!-- Repeat for other trending items -->
                        </div>
                    </section>

                    <!-- Recommended  -->
                    <section class="mb-8">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-2xl font-bold">Recommended for You</h2>
                            <a href="#" class="text-gray-400 hover:text-white">View All</a>
                        </div>
                        <div class="flex overflow-x-auto space-x-4">
                            <!-- Carousel items -->
                            <div class="dark:bg-gray-800 rounded-lg overflow-hidden shadow-lg flex-shrink-0 ">
                                <img src="https://placehold.co/400" alt="Movie Title" class="w-20 h-20 object-cover">
                                <div class="p-4 w-20">
                                    <h3 class="text-lg font-bold mb-2">Movie Title</h3>
                                    <p class="text-gray-400">Ddescription</p>
                                </div>
                            </div>
                            <div class="dark:bg-gray-800 rounded-lg overflow-hidden shadow-lg flex-shrink-0 ">
                                <img src="https://placehold.co/400" alt="Movie Title" class="w-20 h-20 object-cover">
                                <div class="p-4 w-20">
                                    <h3 class="text-lg font-bold mb-2">Movie Title</h3>
                                    <p class="text-gray-400">Ddescription</p>
                                </div>
                            </div>
                            <div class="dark:bg-gray-800 rounded-lg overflow-hidden shadow-lg flex-shrink-0 ">
                                <img src="https://placehold.co/400" alt="Movie Title" class="w-20 h-20 object-cover">
                                <div class="p-4 w-20">
                                    <h3 class="text-lg font-bold mb-2">Movie Title</h3>
                                    <p class="text-gray-400">Ddescription</p>
                                </div>
                            </div>
                            <div class="dark:bg-gray-800 rounded-lg overflow-hidden shadow-lg flex-shrink-0 ">
                                <img src="https://placehold.co/400" alt="Movie Title" class="w-20 h-20 object-cover">
                                <div class="p-4 w-20">
                                    <h3 class="text-lg font-bold mb-2">Movie Title</h3>
                                    <p class="text-gray-400">Ddescription</p>
                                </div>
                            </div>
                            <div class="dark:bg-gray-800 rounded-lg overflow-hidden shadow-lg flex-shrink-0 ">
                                <img src="https://placehold.co/400" alt="Movie Title" class="w-20 h-20 object-cover">
                                <div class="p-4 w-20">
                                    <h3 class="text-lg font-bold mb-2">Movie Title</h3>
                                    <p class="text-gray-400">Ddescription</p>
                                </div>
                            </div>
                            <div class="dark:bg-gray-800 rounded-lg overflow-hidden shadow-lg flex-shrink-0 ">
                                <img src="https://placehold.co/400" alt="Movie Title" class="w-20 h-20 object-cover">
                                <div class="p-4 w-20">
                                    <h3 class="text-lg font-bold mb-2">Movie Title</h3>
                                    <p class="text-gray-400">Ddescription</p>
                                </div>
                            </div>
                            <div class="dark:bg-gray-800 rounded-lg overflow-hidden shadow-lg flex-shrink-0 ">
                                <img src="https://placehold.co/400" alt="Movie Title" class="w-20 h-20 object-cover">
                                <div class="p-4 w-20">
                                    <h3 class="text-lg font-bold mb-2">Movie Title</h3>
                                    <p class="text-gray-400">Ddescription</p>
                                </div>
                            </div>
                            <div class="dark:bg-gray-800 rounded-lg overflow-hidden shadow-lg flex-shrink-0 ">
                                <img src="https://placehold.co/400" alt="Movie Title" class="w-20 h-20 object-cover">
                                <div class="p-4 w-20">
                                    <h3 class="text-lg font-bold mb-2">Movie Title</h3>
                                    <p class="text-gray-400">Ddescription</p>
                                </div>
                            </div>
                            <div class="dark:bg-gray-800 rounded-lg overflow-hidden shadow-lg flex-shrink-0 ">
                                <img src="https://placehold.co/400" alt="Movie Title" class="w-20 h-20 object-cover">
                                <div class="p-4 w-20">
                                    <h3 class="text-lg font-bold mb-2">Movie Title</h3>
                                    <p class="text-gray-400">Ddescription</p>
                                </div>
                            </div>
                            <!-- Repeat for other recommended items -->
                        </div>
                    </section>

                    <!-- New Release -->
                    <section class="mb-8">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-2xl font-bold">New Releases</h2>
                            <a href="#" class="text-gray-400 hover:text-white">View All</a>
                        </div>
                        <div class="flex overflow-x-auto space-x-4">
                            <!-- Carousel items -->
                            <div class="dark:bg-gray-800 rounded-lg overflow-hidden shadow-lg flex-shrink-0 ">
                                <img src="https://placehold.co/400" alt="Show Title" class="w-20 h-20 object-cover">
                                <div class="p-4 w-20">
                                    <h3 class="text-lg font-bold mb-2">Show Title</h3>
                                    <p class="text-gray-400">Ddescription</p>
                                </div>
                            </div>
                            <div class="dark:bg-gray-800 rounded-lg overflow-hidden shadow-lg flex-shrink-0 ">
                                <img src="https://placehold.co/400" alt="Show Title" class="w-20 h-20 object-cover">
                                <div class="p-4 w-20">
                                    <h3 class="text-lg font-bold mb-2">Show Title</h3>
                                    <p class="text-gray-400">Ddescription</p>
                                </div>
                            </div>
                            <div class="dark:bg-gray-800 rounded-lg overflow-hidden shadow-lg flex-shrink-0 ">
                                <img src="https://placehold.co/400" alt="Show Title" class="w-20 h-20 object-cover">
                                <div class="p-4 w-20">
                                    <h3 class="text-lg font-bold mb-2">Show Title</h3>
                                    <p class="text-gray-400">Ddescription</p>
                                </div>
                            </div>
                            <div class="dark:bg-gray-800 rounded-lg overflow-hidden shadow-lg flex-shrink-0 ">
                                <img src="https://placehold.co/400" alt="Show Title" class="w-20 h-20 object-cover">
                                <div class="p-4 w-20">
                                    <h3 class="text-lg font-bold mb-2">Show Title</h3>
                                    <p class="text-gray-400">Ddescription</p>
                                </div>
                            </div>
                            <div class="dark:bg-gray-800 rounded-lg overflow-hidden shadow-lg flex-shrink-0 ">
                                <img src="https://placehold.co/400" alt="Show Title" class="w-20 h-20 object-cover">
                                <div class="p-4 w-20">
                                    <h3 class="text-lg font-bold mb-2">Show Title</h3>
                                    <p class="text-gray-400">Ddescription</p>
                                </div>
                            </div>
                            <div class="dark:bg-gray-800 rounded-lg overflow-hidden shadow-lg flex-shrink-0 ">
                                <img src="https://placehold.co/400" alt="Show Title" class="w-20 h-20 object-cover">
                                <div class="p-4 w-20">
                                    <h3 class="text-lg font-bold mb-2">Show Title</h3>
                                    <p class="text-gray-400">Ddescription</p>
                                </div>
                            </div>
                            <div class="dark:bg-gray-800 rounded-lg overflow-hidden shadow-lg flex-shrink-0 ">
                                <img src="https://placehold.co/400" alt="Show Title" class="w-20 h-20 object-cover">
                                <div class="p-4 w-20">
                                    <h3 class="text-lg font-bold mb-2">Show Title</h3>
                                    <p class="text-gray-400">Ddescription</p>
                                </div>
                            </div>
                            <div class="dark:bg-gray-800 rounded-lg overflow-hidden shadow-lg flex-shrink-0 ">
                                <img src="https://placehold.co/400" alt="Show Title" class="w-20 h-20 object-cover">
                                <div class="p-4 w-20">
                                    <h3 class="text-lg font-bold mb-2">Show Title</h3>
                                    <p class="text-gray-400">Ddescription</p>
                                </div>
                            </div>
                            <div class="dark:bg-gray-800 rounded-lg overflow-hidden shadow-lg flex-shrink-0 ">
                                <img src="https://placehold.co/400" alt="Show Title" class="w-20 h-20 object-cover">
                                <div class="p-4 w-20">
                                    <h3 class="text-lg font-bold mb-2">Show Title</h3>
                                    <p class="text-gray-400">Ddescription</p>
                                </div>
                            </div>
                            <!-- Repeat for other new releases -->
                        </div>
                    </section>


                </main>

                <footer class="dark:bg-gray-800 px-4 py-2 text-center">
                    <div class="flex justify-center space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white">Privacy Policy</a>
                        <a href="#" class="text-gray-400 hover:text-white">Terms of Use</a>
                        <a href="#" class="text-gray-400 hover:text-white">Contact Us</a>
                    </div>
                    <p class="text-gray-400 mt-2">&copy; 2024 Your App. All rights reserved.</p>
                </footer>


            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "../../Layouts/AuthenticatedLayout.vue"
import GroupList from "@/Components/app/GroupList.vue";
import UpcomingFeatures from "@/Components/app/UpcomingFeatures.vue";
import FollowingList from "@/Components/app/FollowingList.vue";

const props = defineProps({
    posts: Object,
    groups: Array,
    followings: Array
  });
  
</script>