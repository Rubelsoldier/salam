<template>
    <div class="mb-3 dark:text-gray-200">
        <label>Group Name</label>
        <TextInput type="text" class="mt-1 block w-full" v-model="form.name" required autofocus />
    </div>

    <div class="mb-3 dark:text-gray-200">
        <label>
            <Checkbox name="remember" v-model:checked="form.auto_approval" />
            Enable Auto Approval
        </label>
    </div>

    <div class="mb-3 dark:text-gray-200">
        <label>About Group</label>
        <ckeditor :editor="editor" v-model="form.about" :config="editorConfig"></ckeditor>
    </div>
</template>

<script setup>
import Checkbox from "@/Components/Checkbox.vue";
import TextInput from "@/Components/TextInput.vue";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";

    defineProps({
        form: Object
    })

    const editor = ClassicEditor;
    const editorConfig = {
    toolbar: ['bold', 'italic', '|', 'bulletedList', 'numberedList', '|', 'heading', '|', 'outdent', 'indent', '|', 'link', '|', 'blockQuote'],
}

</script>