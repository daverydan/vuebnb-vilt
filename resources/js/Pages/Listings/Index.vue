<template>

    <Head title="Home" />

    <AuthenticatedLayout v-if="$page.props.auth.user && !isSavedListingsPage">
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

    <GuestLayout  v-if="!$page.props.auth.user && !isSavedListingsPage">
        <div class="py-8">
            <ListingSummaryGroup
                v-for="(group, country) in listing_groups"
                :key="country"
                :listings="group"
                :country="country"
                class="pb-5 text-gray-800 dark:text-white"
            ></ListingSummaryGroup>
        </div>
    </GuestLayout>

    <!-- Saved Listings Page -->
    <AuthenticatedLayout v-if="$page.props.auth.user && isSavedListingsPage">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Saved Listings</h2>
        </template>
        <div class="py-8">
            <div class="default-container">
                <div class="listings-wrapper">
                    <div v-for="saved in savedListings" class="listing">
                        <ListingSummaryDetails
                            :listing="saved"
                            class="w-[300px] sm:w-[350px]"
                        />
                    </div>
                </div>
            </div>
            <div class="clear-both"></div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import ListingSummaryGroup from '@/Components/Listings/ListingSummaryGroup.vue';
import ListingSummaryDetails from '@/Components/Listings/ListingSummaryDetails.vue';
import { Head, usePage } from '@inertiajs/vue3';
import { computed, onMounted, ref, watch } from 'vue';
import { useSaveListing } from '@/Composables/useSaveListing'

const props = defineProps({
    listings: {
        type: Array,
    },
});

const { initializeSavedListings } = useSaveListing();

const page = usePage();

const isSavedListingsPage = ref(false);

onMounted(() => {
    if (window.location.href.includes('saved')) isSavedListingsPage.value = true;
    if (page.props.auth.user) initializeSavedListings(page.props.auth.user.saved_listings)
})

const savedListings = computed(() => page.props.auth.user ? props.listings.filter(li => page.props.auth.user.saved_listings.includes(li.id)) : [])

watch(() => props.listings, () => {
    if (!page.props.auth.user) isSavedListingsPage.value = false
})

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

<style scoped>
.listing {
    float: left;
    width: 100%;
    margin-bottom: 48px;
    display: flex;
    justify-content: center;
}
@media screen and (min-width: 796px) and (max-width: 1263px) {
    .listings-wrapper {
        max-width: 796px !important;
        margin: auto;
    }
    .listings-wrapper .listing {
        width: 50%;
    }
}
@media screen and (min-width: 1264px) {
    .listings-wrapper {
        max-width: 1279px;
    }
    .listings-wrapper .listing {
        max-width: 405px;
    }
}
</style>
