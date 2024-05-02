<template>
    <AuthenticatedLayout v-if="$page.props.auth.user">
        <div class="mb-20">
            <ListingDetails :listing="listing" />
        </div>
    </AuthenticatedLayout>

    <GuestLayout v-else>
        <div class="mb-20">
            <ListingDetails :listing="listing" />
        </div>
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
