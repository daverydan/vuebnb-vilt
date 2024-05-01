<script setup>
import NavBar from '@/Components/NavBar.vue'
import { usePage } from '@inertiajs/vue3'

const url = usePage().props.url;

const navItems = [
    { name: 'Listings', url: `${url}/listings` },
    { name: 'Saved', url: `${url}/saved` },
];
</script>

<template>
    <NavBar :navItems="navItems" />

    <div class="min-h-screen bg-gray-100 text-gray-900 dark:text-white dark:bg-gray-900">
        <!-- Page Heading -->
        <header
            class="bg-white dark:bg-gray-800 shadow"
            v-if="$slots.header"
        >
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <slot name="header" />
            </div>
        </header>

        <!-- Page Content -->
        <main>
            <slot />
        </main>
    </div>
</template>
