import { ref } from 'vue'
import { router } from '@inertiajs/vue3'

const savedListings =  ref([]);

export function useSaveListing() {

    function toggleSavedListing(userId, listingId) {
        if (savedListings.value?.includes(listingId)) {
            savedListings.value = savedListings.value.filter(item => item !== listingId);
        } else {
            savedListings.value.push(listingId);
        }
        router.post(route('toggle-saved', {
                user: userId,
                listing: listingId,
            }), {}, { preserveScroll: true });
    }

    function initializeSavedListings(savedListingIds) {
        savedListings.value = savedListingIds === null ? [] : savedListingIds;
    }

    return {
        savedListings,
        toggleSavedListing,
        initializeSavedListings,
    }
}
