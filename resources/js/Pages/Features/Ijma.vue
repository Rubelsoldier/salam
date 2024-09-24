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
                <div class="p-8 max-w-[768px] mx-auto h-full overflow-auto dark:text-gray-200">
                    <div class="flex  gap-1">
                        <label for="">Topic:</label>
                        <h2>Boycott</h2>
                    </div>
                    <Disclosure>           
                        <DisclosureButton
                            class="text-gray-800 dark:text-gray-200 dark:bg-slate-900 dark:hover:bg-slate-800   flex gap-1 items-center justify-center bg-gray-100 rounded-lg hover:bg-gray-200 py-2 px-4 flex-1">
                            <ChatBubbleLeftRightIcon class="w-5 h-5" />                            
                            Comment
                        </DisclosureButton>
                        <DisclosurePanel class="comment-list mt-3 max-h-[400px] overflow-auto">
                            <!-- <CommentList :post="post" :data="{comments: post.comments}" /> -->
                            <CommentList :post="post" />
                        </DisclosurePanel>
                    </Disclosure>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import GroupList from "@/Components/app/GroupList.vue";
import UpcomingFeatures from "@/Components/app/UpcomingFeatures.vue";
import FollowingList from "@/Components/app/FollowingList.vue";

const props = defineProps({
    posts: Object,
    groups: Array,
    followings: Array
});

</script>