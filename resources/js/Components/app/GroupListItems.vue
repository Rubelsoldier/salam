<template>
    <div class="h-58 overflow-auto">
        <div class="flex gap-2  mt-4">
            <TextInput :model-value="searchKeyword" placeholder="Type to search" class="w-full"/>
            <button @click="showNewGroupModal = true"
                    class="text-sm bg-indigo-500 hover:bg-indigo-600 text-white rounded py-1 px-2 w-[120px]">
                <span class="text-xs">Create new group</span>
            </button>
        </div>

        <div class="mt-3 h-[200px] lg:flex-1 overflow-auto">
            <div v-if="false" class="text-gray-400 text-center p-3">
                You are not joined to any groups
            </div>
            <div v-else>
                <GroupItem v-for="group of groups"
                        :key="group.id"
                        :group="group"
                />
            </div>
        </div>
    </div>

    <GroupModal v-model="showNewGroupModal" @create="onGroupCreate"/>

</template>

<script setup>
import TextInput from "@/Components/TextInput.vue";
import GroupItem from "@/Components/app/GroupItem.vue";
import GroupModal from "@/Components/app/GroupModal.vue";
import { ref } from "vue";

const props = defineProps({
    groups: Array
})

const showNewGroupModal = ref(false)

const searchKeyword = ref('')


function onGroupCreate(group) {
    console.log('group '+group.id);
    props.groups.unshift(group)
}

</script>

<style scoped>

</style>
