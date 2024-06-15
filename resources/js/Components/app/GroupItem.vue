<template>
    <div class="cursor-pointer hover:bg-gray-100">
        <Link :href="route('group.profile',group.slug)" class="flex items-start gap-1 py-2 px-2">
            <img :src="group.thumbnail_url" class="w-[32px] rounded-full avatar-image"/>
            <div class="flex-1">
                <div class="flex items-center justify-between">
                    <h3 class="font-black">{{ group.name }}</h3>
                </div>
                <!-- <div class="text-xs text-gray-500" v-html="group.description"></div> -->
                 
                <span class="text-xs font-bold text-indigo-400">
                        {{ group.status === 'approved' ? (group.role === 'admin' ? group.role : '') : 'not approved'}}
                </span>

            </div>
        </Link>
    </div>
</template>

<script setup>
import {Link} from '@inertiajs/vue3'

defineProps({
    group: Object
})
</script>

<style scoped>
    .avatar-image{
        width: 32px;
        height: 32px;
    }
</style>
