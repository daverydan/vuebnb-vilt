<script setup>
import NavBar from '@/Components/NavBar.vue'
import { usePage } from '@inertiajs/vue3'

const navItems = [
    { name: 'Login', url: `${usePage().props.url}/login` },
    { name: 'Register', url: `${usePage().props.url}/register` },
];
</script>

<template>
    <NavBar :navItems="navItems" />

    <main class="min-h-screen bg-gray-100 dark:bg-gray-900 pt-8">
        <slot />
    </main>
</template>
