<script setup>
import NavBar from '@/Components/NavBar.vue'
import { usePage } from '@inertiajs/vue3'

const url = usePage().props.url;

const navItems = [
    { name: 'Login', url: `${url}/login` },
    { name: 'Register', url: `${url}/register` },
];
</script>

<template>
    <NavBar :navItems="navItems" />

    <main class="min-h-screen bg-gray-100 dark:bg-gray-900 pt-8">
        <slot />
    </main>
</template>
