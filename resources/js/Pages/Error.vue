<script setup>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

const props = defineProps({
    title: String,
    body: String
})

</script>

<template>
    <AuthenticatedLayout>
        <div class="py-16 text-center dark:text-gray-200">
            <h1 class="text-2xl">{{ title }}</h1>
            <div>{{ body }}</div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>