<template>
    <AuthenticatedLayout v-if="$page.props.auth.user">
        <div class="mb-8">
            <ListingDetails :listing="listing" />
        </div>
    </AuthenticatedLayout>

    <GuestLayout v-else>
        <ListingDetails :listing="listing" />
    </GuestLayout>
</template>

<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import ListingDetails from '@/Components/Listings/ListingDetails.vue';

const props = defineProps({
    listing: Object,
})
</script>
