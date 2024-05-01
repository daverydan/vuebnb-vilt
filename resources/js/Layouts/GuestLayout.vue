<script setup>
import NavBar from '@/Components/NavBar.vue'

const navItems = [
    { name: 'Login', url: 'login' },
    { name: 'Register', url: 'register' },
];
</script>

<template>
    <NavBar :navItems="navItems" />

    <main class="bg-gray-100 dark:bg-gray-900 pt-8">
        <slot />
    </main>
</template>
