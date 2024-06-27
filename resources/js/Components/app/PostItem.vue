
<template>
    <div class="bg-white  dark:bg-slate-950 dark:border-slate-900 dark:text-gray-200 border rounded p-4 b-3">
        <div class="flex items-center justify-between mb-3">
            <PostUserHeader :post="post" />
            <div class="flex items-center gap-2">
                <div v-if="isPinned" class="flex items-center text-xs">
                    <MapPinIcon
                                class="h-3 w-3"
                                aria-hidden="true" />
                    pinned
                </div>
                <EditDeleteDropdown :user="post.user" :post="post"
                                    @edit="openEditModal"
                                    @delete="deletePost"
                                    @pin="pinUnpinPost"
                />
            </div>
        </div>
        <div class="mb-3">
            <ReadMoreReadLess :content="postBody" />
            <UrlPreview :preview="post.preview" :url="post.preview_url"/>
        </div>
        <div class="grid gap-3 mb-3" :class="[
            post.attachments.length === 1 ? 'grid-cols-1' : 'grid-cols-2'
        ]">
            <template v-for="(attachment, ind) of post.attachments.slice(0, 4)" :key="ind">

                <div @click="openAttachment(ind)"
                    class="group aspect-square bg-blue-100 flex flex-col items-center justify-center text-gray-500 relative cursor-pointer">

                    <div v-if="ind === 3 && post.attachments.length > 4"
                        class="absolute left-0 top-0 right-0 bottom-0 z-10 bg-black/60 text-white flex items-center justify-center text-2xl">
                        +{{ post.attachments.length - 4 }} more
                    </div>

                    <!-- Download-->
                    <a @click.stop :href="route('post.download', attachment)"
                        class="z-20 opacity-0 group-hover:opacity-100 transition-all w-8 h-8 flex items-center justify-center text-gray-100 bg-gray-700 rounded absolute right-2 top-2 cursor-pointer hover:bg-gray-800">
                        <ArrowDownTrayIcon class="w-4 h-4" />
                    </a>
                    <!--/ Download-->

                    <img v-if="isImage(attachment)" :src="attachment.url" class="object-contain aspect-square" />
                    <div v-else-if="isVideo(attachment)" class="relative flex justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="z-20 absolute w-16 h-16 text-gray-800 text-white opacity-70">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z" />
                        </svg>

                        <div class="absolute left-0 top-0 w-full h-full bg-black/50 z-10"></div>
                        <video :src="attachment.url"></video>
                    </div>
                    <div v-else class="flex flex-col justify-center items-center">
                        <PaperClipIcon class="w-10 h-10 mb-3" />

                        <small>{{ attachment.name }}</small>
                    </div>
                </div>
            </template>
        </div>
        <Disclosure v-slot="{ open }">
            <!-- Like & comment buttons  -->
            <div class="flex gap-2">
                <button @click="sendReaction"
                    class="text-gray-800 dark:text-gray-200 flex gap-1 items-center justify-center  rounded-lg py-2 px-4 flex-1" :class="[
                    post.current_user_has_reaction ?
                     'bg-sky-100 dark:bg-sky-900 hover:bg-sky-200 dark:hover:bg-sky-950' :
                     'bg-gray-100  dark:bg-slate-800 dark:bg-slate-900 dark:hover:bg-slate-800'
                ]">
                    <HandThumbUpIcon class="w-5 h-5" />
                    <span class="mr-2">{{ post.num_of_reactions }}</span>
                    {{ post.current_user_has_reaction ? 'Unlike' : 'Like' }}
                </button>
                <DisclosureButton
                    class="text-gray-800 dark:text-gray-200 dark:bg-slate-900 dark:hover:bg-slate-800   flex gap-1 items-center justify-center bg-gray-100 rounded-lg hover:bg-gray-200 py-2 px-4 flex-1">
                    <ChatBubbleLeftRightIcon class="w-5 h-5" />
                    <span class="mr-2">{{ post.num_of_comments }}</span>
                    Comment
                </DisclosureButton>
            </div>
            <DisclosurePanel class="comment-list mt-3 max-h-[400px] overflow-auto">
                <CommentList :post="post" :data="{comments: post.comments}" />
            </DisclosurePanel>
        </Disclosure>

    </div>
</template>

<script setup>
import {ChatBubbleLeftRightIcon, ChatBubbleLeftEllipsisIcon, HandThumbUpIcon, ArrowDownTrayIcon} from '@heroicons/vue/24/outline'
import {Disclosure, DisclosureButton, DisclosurePanel} from '@headlessui/vue'
import PostUserHeader from "@/Components/app/PostUserHeader.vue";
import {router, useForm, usePage} from '@inertiajs/vue3'
import {isImage, isVideo} from '../../helper.js'
import {PaperClipIcon} from "@heroicons/vue/24/solid/index.js";
import axiosClient from "@/axiosClient.js";
import EditDeleteDropdown from "@/Components/app/EditDeleteDropdown.vue";
import {ref} from "vue";
import ReadMoreReadLess from "@/Components/app/ReadMoreReadLess.vue";
import CommentList from "@/Components/app/CommentList.vue";
import {computed} from "vue";
import UrlPreview from "@/Components/app/UrlPreview.vue";
import {MapPinIcon} from "@heroicons/vue/24/outline/index.js";

const authUser = usePage().props.auth.user;
const editingComment = ref(null);

const props = defineProps({
    post: Object
})

const group = usePage().props.group;

const emit = defineEmits(['editClick', 'attachmentClick'])

// Computed 
const postBody = computed(() => {
    let content = props.post.body.replace(
        /(?:(\s+)|<p>)((#\w+)(?![^<]*<\/a>))/g,
        (match, group1, group2) => {
            const encodedGroup = encodeURIComponent(group2);
            return `${group1 || ''}<a href="/search/${encodedGroup}" class="hashtag">${group2}</a>`;
        }
    )

    return content;
})

const isPinned = computed(() => {
    if (group?.id) {
        return group?.pinned_post_id === props.post.id
    }

    return authUser?.pinned_post_id === props.post.id
})


// Methods 
function openEditModal() {
    emit('editClick', props.post)
}

function deletePost() {
    if (window.confirm('Are you sure you want to delete this post?')) {
        router.delete(route('post.destroy', props.post), {
            preserveScroll: true
        })
    }
}

function openAttachment(ind) {
    emit('attachmentClick', props.post, ind)
}

function sendReaction() {
    axiosClient.post(route('post.reaction', props.post), {
        reaction: 'like'
    })
        .then(({data}) => {
            props.post.current_user_has_reaction = data.current_user_has_reaction
            props.post.num_of_reactions = data.num_of_reactions;
        })
}

function pinUnpinPost() {
    const form = useForm({
        forGroup: group?.id
    })
    let isPinned = false;
    if (group?.id) {
        isPinned = group?.pinned_post_id === props.post.id;
    } else {
        isPinned = authUser?.pinned_post_id === props.post.id;
    }

    form.post(route('post.pinUnpin', props.post.id), {
        preserveScroll: true,
        onSuccess: () => {
            if (group?.id) {
                group.pinned_post_id = isPinned ? null : props.post.id
            } else {
                authUser.pinned_post_id = isPinned ? null : props.post.id
            }
        }
    })
}

</script>

<style scoped>
    .avatar-image{
        width: 40px;
        height: 40px;
    }
</style>
