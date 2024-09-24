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
                <div class="p-8 max-w-[768px] h-full overflow-auto dark:text-gray-200">
                    <div v-if="showQuestions"
                        class="flex flex-col items-center justify-center bg-gray-100 dark:bg-slate-900">
                        <div class="bg-white dark:bg-slate-800 p-6 rounded shadow-md w-full max-w-md">
                            <p class="text-lg dark:text-gray-200 mb-4">{{ currentQuestionIndex + 1 }} <span>)</span> {{
                                currentQuestion.question }}</p>
                            <ul>
                                <li v-for="(option, i) in currentQuestion.options" :key="i" @click="selectOption"
                                    class="cursor-pointer p-2 rounded mb-2 hover:bg-gray-200 dark:hover:bg-gray-700">
                                    {{ String.fromCharCode(97 + i) }}) {{ option }}
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div v-else class="flex items-center gap-1">                        
                        <InputTextarea v-model="newCommentText" placeholder="write ! we are listening !!" rows="1"
                            class="w-full max-h-[160px] resize-none rounded-r-none">
                        </InputTextarea>
                        <PaperAirplaneIcon 
                            class="w-5 h-5 cursor-pointer"
                        />
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue';
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputTextarea from '@/Components/InputTextarea.vue';
import GroupList from "@/Components/app/GroupList.vue";
import UpcomingFeatures from "@/Components/app/UpcomingFeatures.vue";
import FollowingList from "@/Components/app/FollowingList.vue";
import { PaperAirplaneIcon } from "@heroicons/vue/24/solid";

defineProps({
    posts: Object,
    groups: Array,
    followings: Array
});

const questions = ref([
    {
        question: "How often have you been bothered by feeling down, depressed, or hopeless in the past month?",
        options: ["Not at all", "Several days", "More than half the days", "Nearly every day"],
        correctAnswer: "More than half the days"
    },
    {
        question: "How often have you been bothered by little interest or pleasure in doing things in the past month?",
        options: ["Not at all", "Several days", "More than half the days", "Nearly every day"],
        correctAnswer: "Nearly every day"
    },
    {
        question: "How often have you been bothered by trouble falling or staying asleep, or sleeping too much in the past month?",
        options: ["Not at all", "Several days", "More than half the days", "Nearly every day"],
        correctAnswer: "Several days"
    },
    {
        question: "How often have you been bothered by feeling tired or having little energy in the past month?",
        options: ["Not at all", "Several days", "More than half the days", "Nearly every day"],
        correctAnswer: "More than half the days"
    },
    {
        question: "How often have you been bothered by feeling bad about yourself, or that you are a failure or have let yourself or your family down in the past month?",
        options: ["Not at all", "Several days", "More than half the days", "Nearly every day"],
        correctAnswer: "More than half the days"
    }
]);

// alert(questions.value[0].question)

// Current question index
const currentQuestionIndex = ref(0);
const currentQuestion = computed(() => questions.value[currentQuestionIndex.value]);
const showQuestions = ref(true)

const selectOption = () => {
    if (currentQuestionIndex.value < questions.value.length - 1) {
        currentQuestionIndex.value++;
    } else {
        // alert('Thank you for completing the questionnaire!');
        // currentQuestionIndex.value = 0;  // Reset to first question
        showQuestions.value = false;
    }
};

</script>