<script setup>
import { onMounted, ref } from 'vue';

const props = defineProps({
    placeholder: String
})

const model = defineModel({
    type: String,
    required: true,
});

const input = ref(null);
// const placeholder = ref('Enter your text here');

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <input
        class="border-gray-300 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
        v-model="model"
        ref="input"
        :placeholder="placeholder"
    />
</template>
