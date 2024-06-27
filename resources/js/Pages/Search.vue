<template>
    <AuthenticatedLayout>
        <div class="max-w-[1024px] mx-auto h-full overflow-auto p-4">
            <div v-if="!search.startsWith('#')" class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                <div class="shadow bg-white p-3 rounded mb-3 dark:bg-slate-950">
                    <h2 class="text-lg font-bold dark:text-gray-200">Users</h2>
                    <div class="grid-cols-2">
                        <UserListItem v-if="users.length" v-for="user of users" :user="user" :key="user.id"/>
                        <div v-else class="py-8 text-center text-gray-500">
                            No users were found.
                        </div>
                    </div>
                </div>
                <div class="shadow bg-white p-3 rounded mb-3 dark:bg-slate-950">
                    <h2 class="text-lg font-bold dark:text-gray-200">Groups</h2>
                    <div class="grid-cols-2">
                        <GroupItem v-if="groups.length" v-for="group of groups" :group="group" :key="group.id"/>
                        <div v-else class="py-8 text-center text-gray-500">
                            No groups were found.
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <h2 class="text-lg font-bold dark:text-gray-200">Posts</h2>
                <PostList v-if="posts.data.length" :posts="posts.data" class="flex-1"/>
                <div v-else class="py-8 text-center text-gray-500">
                    No posts were found.
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import UserListItem from "@/Components/app/UserListItem.vue";
import GroupItem from "@/Components/app/GroupItem.vue";
import PostList from "@/Components/app/PostList.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

const props = defineProps({
    search: String,
    users: Array,
    groups: Array,
    posts: Object
})

</script>