<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';
import { onMounted } from 'vue';

defineProps({
    navItems: {
        type: Array,
        default: [],
    },
})

const open = ref(false);

const userTheme = localStorage.getItem('theme');
const systemTheme = window.matchMedia("(prefers-color-scheme: dark)").matches;

onMounted(() => {
    if (userTheme === 'dark' || (!userTheme && systemTheme)) {
        document.documentElement.classList.add('dark');
        return;
    }
})

const toggleDark = () => {
    if (document.documentElement.classList.contains('dark')) {
        document.documentElement.classList.remove('dark');
        localStorage.setItem('theme', 'light');
        return;
    }
    document.documentElement.classList.add('dark');
    localStorage.setItem('theme', 'dark');
};
</script>

<template>
    <nav class="bg-gray-800 b-8  border-b border-gray-700 sticky top-0 z-50">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <!-- Mobile menu button-->
                    <button
                        type="button"
                        class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                        aria-controls="mobile-menu"
                        aria-expanded="false"
                        @click="open = !open"
                    >
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open main menu</span>
                        <!-- Open Menu -->
                        <svg
                            v-if="!open"
                            class="block h-6 w-6"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            aria-hidden="true"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
                            />
                        </svg>
                        <!-- Close Menu -->
                        <svg
                            v-else
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="block w-6 h-6"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M6 18 18 6M6 6l12 12"
                            />
                        </svg>

                    </button>
                </div>

                <!-- Desktop Nav -->
                <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-between">
                    <!-- Desktop Logo -->
                    <div class="flex flex-shrink-0 items-center">
                        <Link href="/">
                        <ApplicationLogo />
                        </Link>
                    </div>
                    <!-- Desktop Nav Items -->
                    <div class="hidden sm:ml-6 sm:flex">
                        <div class="flex space-x-4">
                            <Link
                                v-for="item in navItems"
                                :href="item.url"
                                class="rounded-md px-3 py-2 text-sm font-medium"
                                :class="[item.url.includes($page.url) && $page.url != '/' ? 'bg-primary text-white font-black' : 'text-gray-300 hover:bg-gray-700 hover:text-white']"
                            >
                                {{ item.name }}
                            </Link>
                        </div>
                        <!-- Desktop Dropdown Menu -->
                        <div v-if="$page.props.auth.user" class="hidden sm:flex sm:items-center">
                            <div class="ms-4 relative">
                                <Dropdown align="right" width="48">
                                    <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button
                                                type="button"
                                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-400 hover:text-gray-300 bg-gray-700 focus:outline-none transition ease-in-out duration-150"
                                            >
                                                {{ $page.props.auth.user.name }}

                                                <svg
                                                    class="ms-2 -me-0.5 h-4 w-4"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                >
                                                    <path
                                                        fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"
                                                    />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>

                                    <template #content>
                                        <DropdownLink :href="route('profile.edit')"> Profile </DropdownLink>
                                        <DropdownLink :href="route('logout')" method="post" as="button">
                                            Log Out
                                        </DropdownLink>
                                    </template>
                                </Dropdown>
                            </div>
                        </div>

                        <button
                            type="button"
                            class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md w-9 text-sm font-medium ml-4 flex items-center justify-center"
                            @click="toggleDark"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hidden dark:block">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
                            </svg>
                            <i class="fa-solid fa-lg fa-moon block dark:hidden px-1 -rotate-[25deg]"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Nav -->
        <div
            v-if="open"
            class="sm:hidden absolute w-full bg-gray-800 z-50"
            id="mobile-menu"
        >
            <!-- Mobile Nav Items -->
            <div class="space-y-1 px-2 pb-3 pt-2">
                <Link
                    v-for="item in navItems"
                    :href="item.url"
                    class="block rounded-md px-3 py-2 text-base font-medium"
                    :class="[item.url.includes($page.url) && $page.url != '/' ? 'bg-primary text-white font-black' : 'text-gray-300 hover:bg-gray-700 hover:text-white']"
                    aria-current="page"
                >
                    {{ item.name }}
                </Link>
            </div>

            <!-- Mobile Dropdown Menu -->
            <div
                v-if="$page.props.auth.user"
                :class="{ block: open, hidden: !open }"
                class="sm:hidden"
            >
                <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
                    <div class="px-4">
                        <div class="font-medium text-base text-gray-800 dark:text-gray-200">
                            {{ $page.props.auth.user.name }}
                        </div>
                        <div class="font-medium text-sm text-gray-500">{{ $page.props.auth.user.email }}</div>
                    </div>
                    <div class="space-y-1 px-2 pb-3 pt-2">
                        <Link
                            :href="route('profile.edit')"
                            class="block rounded-md px-3 py-2 text-base font-medium"
                            :class="[$page.url === '/profile' ? 'bg-primary text-white font-black' : 'text-gray-300 hover:bg-gray-700 hover:text-white']"
                            aria-current="page"
                        >
                            Profile
                        </Link>
                        <Link
                            :href="route('logout')"
                            class="text-left w-full text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium"
                            method="post" as="button"
                        >
                            Logout
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</template>
