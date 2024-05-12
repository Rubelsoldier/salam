<template>
    <div class="p-4 bg-white rounded-lg border mb-3">
        <InputTextarea 
            @click="postCreating = true" 
            class="mb-3 w-full" 
            placeholder="Click here to create new post" rows="1" 
            v-model="newPostForm.body" 
            ref="input"
        />
        <div v-if="postCreating" class="flex gap-2 justify-between">
            <button 
                type="button" 
                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 relative"
            >
                Attach Files
                <input type="file" class="absolute left-0 top-0 right-0 bottom-0 opacity-0">
            </button>
            <button 
                @click="submit" 
                type="submit" 
                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Submit
            </button>
        </div>
    </div>
</template>

<script setup>

// Imports 
import {ref} from "vue";
import InputTextarea from '@/Components/InputTextarea.vue'
import { useForm } from "@inertiajs/vue3";


// Refs 
const input = ref(null);

// uses 
const postCreating = ref(false)
const newPostForm = useForm({
    body: ''
})

// Methods 

function submit(){
    newPostForm.post(route('post.create'), {
        onSuccess: () => {
            newPostForm.reset()
            textareaReset()
        }
    })
}

function textareaReset() {
  if (input.value && input.value.$el) {
    input.value.$el.style.height = 'auto';
  }
}

</script>

<style scoped>

</style>
