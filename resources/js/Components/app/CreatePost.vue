<template>
    <div class="p-4 bg-white dark:bg-slate-950 rounded-lg border dark:border-slate-900 mb-3">
        <div @click="showCreatePostModal" class="py-2 px-3 border-2 border-gray-200 text-gray-500 rounded-md mb-3 w-full dark:border-slate-900">
            Click here to create new post
        </div>            
        <PostModal :post="newPost" :group="group" v-model="showModal"/>
    </div>    
</template>

<script setup>

// Imports 
import {ref} from "vue";
import { usePage} from "@inertiajs/vue3";
import PostModal from "./PostModal.vue";


// Refs 
const input = ref(null);

// uses 

const authUser = usePage().props.auth.user;

const showModal = ref(false)
const newPost = ref({
    id: null,
    body: '',
    user: authUser
})

defineProps({
    group:{
        type: Object,
        default: null
    }
})

// Methods 

function showCreatePostModal() {
    showModal.value = true
}

// function textareaReset() {
//   if (input.value && input.value.$el) {
//     input.value.$el.style.height = 'auto';
//   }
// }

</script>

<style scoped>

</style>
