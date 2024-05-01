<template>
    <AuthenticatedLayout v-if="$page.props.auth.user">
        <pre class="text-white">{{ listing }}</pre>
    </AuthenticatedLayout>

    <GuestLayout v-else>
        <pre class="text-white">{{ listing }}</pre>
    </GuestLayout>
</template>

<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

const props = defineProps({
    listing: Object,
})
</script>
