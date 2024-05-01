<template>

    <Head title="Home" />

    <AuthenticatedLayout v-if="$page.props.auth.user">
        <div class="py-8">
            <ListingSummaryGroup
                v-for="(group, country) in listing_groups"
                :key="country"
                :listings="group"
                :country="country"
                class="pb-5 text-gray-800 dark:text-white"
            ></ListingSummaryGroup>
        </div>
    </AuthenticatedLayout>

    <GuestLayout v-else>
        <div class="h-screen">
            <ListingSummaryGroup
                v-for="(group, country) in listing_groups"
                :key="country"
                :listings="group"
                :country="country"
                class="pb-5 text-gray-800 dark:text-white"
            ></ListingSummaryGroup>
        </div>
    </GuestLayout>
</template>

<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import ListingSummaryGroup from '@/Components/Listings/ListingSummaryGroup.vue';
import { Head } from '@inertiajs/vue3';
import { computed } from 'vue';

const props = defineProps({
    listings: {
        type: Array,
    },
});

const listing_groups = computed(() => {
    if (!props.listings) return {};
    return props.listings.reduce(function (rv, x) {
        let key = ['Taiwan', 'Poland', 'Cuba'].find(country => x.address.indexOf(country) > -1);
        if (!rv[key]) {
            rv[key] = [];
        }
        rv[key].push(x);
        return rv;
    }, {});
});
</script>
