<template>
    <!-- Listing Summary -->
    <div class="flex flex-grow-0 relative group transition-all duration-200">
        <Link :href="route('listings.show', { 'id': listing.id })">
            <div class="block w-[350px]">
                <!-- Thumbnail -->
                <div class="w-[350px] h-[250px] object-cover bg-center rounded mb-2 relative" :style="backgroundImageStyle">
                    <div class="absolute bg-transparent group-hover:bg-[rgba(0,0,0,.2)] group-hover:transition group-hover:duration-200 group-hover:ease-in-out w-full h-full"></div>
                    <ListingSave
                        v-if="$page.props.auth.user"
                        class="absolute top-3 right-3"
                    />
                </div>
                <!-- Title -->
                <div class="font-black whitespace-nowrap text-ellipsis overflow-hidden mb-1">
                    <span class="inline-flex items-center rounded-md bg-primary px-2 pt-[2px] text-sm font-medium text-white mr-[5px]">{{ listing.price_per_night }}</span>
                    <span class="group-hover:text-primary group-hover:transition group-hover:duration-200 group-hover:ease-in-out">{{ listing.title }}</span>
                </div>
                <!-- Address -->
                <div class="text-sm whitespace-nowrap text-ellipsis overflow-hidden">
                    {{ listing.address }}
                </div>
            </div>
        </Link>
    </div>
</template>

<script setup>
import { computed } from 'vue'
import { Link } from '@inertiajs/vue3'
import ListingSave from '@/Components/Listings/ListingSave.vue'

const props = defineProps({ listing: Object })

const backgroundImageStyle = computed(() => {
    return {'background-image': `url("${props.listing.thumb}")`}
})
</script>

<style>
    @media (max-width: 400px) {
        .listing-summary .listing-save {
            left: 15px;
            right: auto;
        }
    }
</style>
