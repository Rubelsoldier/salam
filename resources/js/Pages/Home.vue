<template>
    <Head title="Salam" />

    <AuthenticatedLayout>
        <div class="grid lg:grid-cols-12 gap-3 p-4">
            <div class="lg:col-span-3 lg:order-1  overflow-hidden">
                <FollowingList :users="followings"/>
                <GroupList :groups="groups" class="h-10"/>
            </div>
            <div class="lg:col-span-3 lg:order-3 h-full overflow-hidden">
                <UpcomingFeatures :users="followings"/>
            </div>
            <div class="lg:col-span-6 lg:order-2 h-full overflow-hidden flex flex-col">
                <CreatePost/>
                <PostList :posts="posts.data" class="flex-1"/>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import { Head, Link } from '@inertiajs/vue3';
import GroupList from "@/Components/app/GroupList.vue";
import UpcomingFeatures from "@/Components/app/UpcomingFeatures.vue";
import FollowingList from "@/Components/app/FollowingList.vue";
import CreatePost from "@/Components/app/CreatePost.vue";
import PostList from "@/Components/app/PostList.vue";
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

defineProps({
    posts: Object,
    groups: Array,
    followings: Array
});


</script>
<style>

</style>
