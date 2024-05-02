<script setup>
import NavBar from '@/Components/NavBar.vue'
import AppFooter from '@/Components/AppFooter.vue'
import { usePage } from '@inertiajs/vue3'

const url = usePage().props.url;

const navItems = [
    { name: 'Login', url: `${url}/login` },
    { name: 'Register', url: `${url}/register` },
];
</script>

<template>
    <NavBar :navItems="navItems" />

    <main class="bg-gray-100 text-gray-900 dark:text-white dark:bg-gray-900">
        <slot />
    </main>

    <!-- <AppFooter class="sm:fixed sm:bottom-0" /> -->
    <AppFooter :class="{ 'sm:fixed sm:bottom-0': $page.url === '/login' || $page.url === '/register' || $page.url === '/forgot-password' }" />
</template>

<style>
body {
    @apply bg-gray-100 text-gray-900 dark:text-white dark:bg-gray-900
}
</style>
