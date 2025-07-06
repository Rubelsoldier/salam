<template>
    <GuestLayout>

        <Head title="Log in" />
        <div class="text-center dark:text-gray-500">
            <!-- logo dark/light mode  -->

            <img v-if="isDarkMode" src="/img/white-logo.png" alt="Dark Logo" class="w-10 h-10 mx-auto block mb-4" />
            <img v-else src="/img/black-logo.png" alt="Light Logo" class="w-7 h-7 mx-auto block mb-4" />

            <h1 class="text-2xl text-center">Login</h1>
            <span class="text-gray-400 text-sm">or</span>
            <div class="flex justify-center">
                <Link :href="route('register')" class="inline-block underline dark:text-gray-200 hover:text-gray-400">
                    create new account
                </Link>
            </div>
            <div>
                <p class="dark:text-blue-200">To login,use</p>
                <div class="mt-2 mb-2 m-auto w-64">
                    <div class="flex items-center dark:text-gray-400 text-xs">
                        <span>Email: demo-login@saalam.site</span>
                        <button @click="copyToClipboard('demo-login@saalam.site', 'email')" class="ml-2 text-xs underline" title="Copy email">
                            {{ copied.email ? 'copied' : 'copy' }}
                        </button>
                    </div>
                    <div class="flex items-center dark:text-gray-400 text-xs">
                        <span>Pass: 11111111 (eight 1's)</span>
                        <button @click="copyToClipboard('11111111', 'pass')" class="ml-2 text-xs underline" title="Copy password">
                            {{ copied.pass ? 'copied' : 'copy' }}
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="email" value="Email" class="dark:text-gray-200" />

                <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus
                    autocomplete="username" placeholder="Enter your email" />

                <InputError class="mt-2 dark:text-gray-200" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Password" class="dark:text-gray-200" />

                <TextInput id="password" type="password" class="mt-1 block w-full" v-model="form.password" required
                    autocomplete="current-password" placeholder="Enter your password" />

                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <Checkbox name="remember" v-model:checked="form.remember" />
                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-200">Remember me</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link v-if="canResetPassword" :href="route('password.request')"
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:text-gray-200 dark:hover:text-gray-400">
                Forgot your password?
                </Link>

                <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Log in
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>

<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { computed } from 'vue';

// for dark mode/light mode logo enabling starts 
import { ref, onMounted, onUnmounted } from 'vue';

const isDarkMode = ref(document.documentElement.classList.contains('dark'));

const updateDarkMode = () => {
    isDarkMode.value = document.documentElement.classList.contains('dark');
};

onMounted(() => {
    window.addEventListener('DOMContentLoaded', updateDarkMode);
    window.addEventListener('change', updateDarkMode);
});

onUnmounted(() => {
    window.removeEventListener('DOMContentLoaded', updateDarkMode);
    window.removeEventListener('change', updateDarkMode);
});

// for dark mode/light mode logo enabling starts 


defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};

// Clipboard copy functionality with feedback

const copied = ref({ email: false, pass: false });

function copyToClipboard(text, type) {
    navigator.clipboard.writeText(text);
    copied.value[type] = true;
    setTimeout(() => {
        copied.value[type] = false;
    }, 1200);
}
</script>
