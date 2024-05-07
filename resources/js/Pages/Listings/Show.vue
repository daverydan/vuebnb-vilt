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
import { useSaveListing } from '@/Composables/useSaveListing'
import { usePage } from '@inertiajs/vue3';
import { onMounted } from 'vue';

const props = defineProps({
    listing: Object,
})

const { initializeSavedListings } = useSaveListing();

const page = usePage();

onMounted(() => {
    if (page.props.auth.user) initializeSavedListings(page.props.auth.user.saved_listings)
})
</script>
