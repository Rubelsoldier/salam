<template>
    <AuthenticatedLayout>
        <div class="max-w-[768px] mx-auto h-full overflow-auto">
            <div class="px-4">
                <div v-show="showNotification && success"
                    class="my-2 py-2 px-3 font-medium text-sm bg-emerald-500 text-white">
                    {{ localSuccess }}
                </div>
                <div v-if="errors.cover" class="my-2 py-2 px-3 font-medium text-sm bg-red-400 text-white">
                    {{ errors . cover }}
                </div>
                <div class="group relative bg-white  dark:bg-slate-950 dark:text-gray-200">
                    <img :src="coverImageSrc || user.cover_url || '/img/default_cover.jpg'"
                        class="w-full h-[200px] object-cover">

                    <div class="absolute top-2 right-2">

                        <!-- Update cover image -->
                        <button v-if="!coverImageSrc"
                            class="bg-gray-50 hover:bg-gray-100 text-gray-800 py-1 px-2 text-xs flex items-center opacity-0 group-hover:opacity-100 transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-3 h-3 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" />
                            </svg>

                            Update cover image

                            <input type="file" class="absolute left-0 top-0 bottom-0 right-0 opacity-0"
                                @change="onCoverChange" />
                        </button>

                        <div v-else class="flex gap-2 bg-white p-2 opacity-0 group-hover:opacity-100">
                            <button @click="resetCoverImage"
                                class="bg-gray-50 hover:bg-gray-100 text-gray-800 py-1 px-2 text-xs flex items-center">
                                <XMarkIcon class="h-3 w-3 mr-2" />
                                Cancel
                            </button>
                            <button @click="submitCoverImage"
                                class="bg-gray-800 hover:bg-gray-900 text-gray-100 py-1 px-2 text-xs flex items-center">
                                <CheckCircleIcon class="h-3 w-3 mr-2" />
                                Submit
                            </button>
                        </div>

                    </div>

                    <!-- Profile picture  -->
                    <div class="flex">
                        <div
                            class="flex items-center justify-center relative group/avatar -mt-[64px] ml-[48px] w-[128px] h-[128px] rounded-full">
                            <img :src="avatarImageSrc || user.avatar_url || '/img/default_avatar.jpg'"
                                class="w-full h-full object-cover rounded-full">
                            <button v-if="!avatarImageSrc"
                                class="absolute left-0 top-0 right-0 bottom-0 bg-black/50 text-gray-200 rounded-full opacity-0 flex items-center justify-center group-hover/avatar:opacity-100">
                                <CameraIcon class="w-8 h-8" />

                                <input type="file" class="absolute left-0 top-0 bottom-0 right-0 opacity-0"
                                    @change="onAvatarChange" />
                            </button>
                            <div v-else class="absolute top-1 right-2 top-4 flex flex-col gap-2">
                                <button @click="resetAvatarImage"
                                    class="w-4 h-4 flex items-center justify-center bg-red-500/80 text-white rounded-full">
                                    <XMarkIcon class="h-4 w-4" />
                                </button>
                                <button @click="submitAvatarImage"
                                    class="w-4 h-4 flex items-center justify-center bg-emerald-500/80 text-white rounded-full">
                                    <CheckCircleIcon class="h-4 w-4" />
                                </button>
                            </div>
                        </div>
                        <!-- new part  -->
                        <div class="flex justify-between items-center flex-1 p-4">
                            <div>
                                <h2 class="font-bold text-lg">{{ user.name }}</h2>
                                <p class="text-xs text-gray-500">{{ followerCount }} followers</p>
                            </div>

                            <div v-if="!isMyProfile">
                                <PrimaryButton v-if="!isCurrentUserFollower" @click="followUser">
                                    Follow User
                                </PrimaryButton>
                                <DangerButton v-else @click="followUser">
                                    Unfollow User
                                </DangerButton>
                            </div>
                        </div>
                        <!-- new part  -->
                    </div>
                </div>
            </div>
            <div class="border-t m-4 mt-0">
                <TabGroup>
                    <TabList class="flex flex-1 flex-wrap bg-white dark:bg-slate-950 dark:text-white">
                        <Tab v-slot="{ selected }" as="template">
                            <TabItem text="Posts" :selected="selected" />
                        </Tab>
                        <Tab v-slot="{ selected }" as="template">
                            <TabItem text="Followers" :selected="selected" />
                        </Tab>
                        <Tab v-slot="{ selected }" as="template">
                            <TabItem text="Followings" :selected="selected" />
                        </Tab>
                        <Tab v-slot="{ selected }" as="template">
                            <TabItem text="Photos" :selected="selected" />
                        </Tab>
                        <Tab v-if="isMyProfile" v-slot="{ selected }" as="template">
                            <TabItem text="My Profile" :selected="selected" />
                        </Tab>
                    </TabList>

                    <TabPanels class="mt-2">
                        <TabPanel>
                            <template v-if="posts">
                                <CreatePost />
                                <PostList :posts="posts.data" class="flex-1" />
                            </template>
                            <div v-else class="py-8 text-center dark:text-gray-400">
                                You don't have permission to view these posts.
                            </div>
                        </TabPanel>
                        <TabPanel>
                            <div class="mb-3">
                                <TextInput :model-value="searchFollowersKeyword" placeholder="Type to search"
                                    class="w-full" />
                            </div>
                            <div v-if="followers.length" class="grid grid-cols-2 gap-3">
                                <UserListItem v-for="user of followers" :user="user" :key="user.id"
                                    class="shadow rounded-lg" />
                            </div>
                            <div v-else class="text-center py-8 dark:text-gray-200">
                                User does not have followers.
                            </div>
                        </TabPanel>
                        <TabPanel>
                            <div class="mb-3">
                                <TextInput :model-value="searchFollowingsKeyword" placeholder="Type to search"
                                           class="w-full"/>
                            </div>
                            <div v-if="followings.length" class="grid grid-cols-2 gap-3">
                                <UserListItem v-for="user of followings"
                                              :user="user"
                                              :key="user.id"
                                              class="shadow rounded-lg"/>
                            </div>
                            <div v-else class="text-center py-8">
                                The user is not following to anybody
                            </div>
                        </TabPanel>
                        <TabPanel>
                            <TabPhotos :photos="photos"/>
                        </TabPanel>
                        <TabPanel v-if="isMyProfile">
                            <Edit :must-verify-email="mustVerifyEmail" :status="status" />
                        </TabPanel>
                    </TabPanels>
                </TabGroup>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
    // Imports 

    import {
        computed,
        ref,
        watch
    } from 'vue'
    import {
        XMarkIcon,
        CheckCircleIcon,
        CameraIcon
    } from '@heroicons/vue/24/solid'
    import {
        TabGroup,
        TabList,
        Tab,
        TabPanels,
        TabPanel
    } from '@headlessui/vue'
    import {
        usePage,
        useForm
    } from "@inertiajs/vue3";
    import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
    import TabItem from "@/Pages/Profile/Partials/TabItem.vue";
    import Edit from "@/Pages/Profile/Edit.vue";
    import PrimaryButton from "@/Components/PrimaryButton.vue";
    import DangerButton from "@/Components/DangerButton.vue";
    import PostList from '@/Components/app/PostList.vue';
    import CreatePost from '@/Components/app/CreatePost.vue';
    import TextInput from '@/Components/TextInput.vue';
    import UserListItem from '@/Components/app/UserListItem.vue';
    import TabPhotos from './TabPhotos.vue';

    // Uses 
    const imagesForm = useForm({
        avatar: null,
        cover: null,
    })

    const showNotification = ref(true)
    const authUser = usePage().props.auth.user;
    const isMyProfile = computed(() => authUser && authUser.id === props.user.id)
    const coverImageSrc = ref('')
    const avatarImageSrc = ref('')
    const localSuccess = ref(false);
    const searchFollowersKeyword = ref('')
    const searchFollowingsKeyword = ref('')

    // Props & Emits 
    const props = defineProps({
        errors: Object,
        mustVerifyEmail: {
            type: Boolean,
        },
        status: {
            type: String,
        },
        isCurrentUserFollower : Boolean,
        followerCount: Number,
        success: {
            type: String,
        },
        user: {
            type: Object
        },
        posts: Object,
        followers: Array,
        followings: Array,
        photos: Array
    });

    // Methods 

    watch(() => props.success, (newVal) => {
        localSuccess.value = newVal;   
        if (showNotification && newVal) {
            hideNotification();
        }
    });

    const hideNotification = () => {
        showNotification.value = true;
        setTimeout(() => {
        showNotification.value = false;
        }, 2000);
    };

    function onCoverChange(event) {
        imagesForm.cover = event.target.files[0]
        if (imagesForm.cover) {
            const reader = new FileReader()
            reader.onload = () => {
                coverImageSrc.value = reader.result;
            }
            reader.readAsDataURL(imagesForm.cover)
        }
    }

    function onAvatarChange(event) {
    imagesForm.avatar = event.target.files[0]
    if (imagesForm.avatar) {
        const reader = new FileReader()
        reader.onload = () => {
            avatarImageSrc.value = reader.result;
        }
        reader.readAsDataURL(imagesForm.avatar)
    }
}  

    function resetCoverImage() {
        imagesForm.cover = null;
        coverImageSrc.value = null;
    }

    function resetAvatarImage() {
        imagesForm.avatar = null;
        avatarImageSrc.value = null
    }

    function submitCoverImage() {
        imagesForm.post(route('profile.updateImages'), {
            preserveScroll: true,
            onSuccess: (user) => {
                resetCoverImage()
                hideNotification();
            },
        })
    }

    function submitAvatarImage() {
        imagesForm.post(route('profile.updateImages'), {
            preserveScroll: true,
            onSuccess: (user) => {
                resetAvatarImage()
                hideNotification();
            }
        })
    }

    function followUser() {
        const form = useForm({
            follow: !props.isCurrentUserFollower
        })

        form.post(route('user.follow', props.user.id), {
            preserveScroll: true
        })
    }

</script>


<style scoped>
</style>
