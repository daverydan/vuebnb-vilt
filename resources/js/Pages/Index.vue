<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
});
</script>

<template>

    <Head title="Home" />

    <AuthenticatedLayout v-if="$page.props.auth.user">
        <!-- Content -->
    </AuthenticatedLayout>

    <GuestLayout v-else>
        <!-- Content -->
    </GuestLayout>
</template>
