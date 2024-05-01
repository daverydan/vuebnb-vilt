<template>
    <!-- <div class="listing-summary"> -->
    <div class="flex flex-grow-0 relative group transition-all duration-200">
        <Link :href="route('listings.show', { 'id': listing.id })" class="px-2">
            <!-- <div class="wrapper"> -->
            <div class="block w-[350px]">
                <!-- <div class="thumbnail" :style="backgroundImageStyle"></div> -->
                <div class="w-[350px] h-[250px] object-cover bg-center group-hover:opacity-75 group-hover:transition group-hover:duration-200 group-hover:ease-in-out mb-2" :style="backgroundImageStyle"></div>
                <!-- <div class="info title"> -->
                <div class="font-black whitespace-nowrap text-ellipsis overflow-hidden mb-1">
                    <span class="inline-flex items-center rounded-md bg-primary px-2 pt-[2px] text-sm font-medium text-white mr-[5px]">{{ listing.price_per_night }}</span>
                    <span class="group-hover:text-primary group-hover:transition group-hover:duration-200 group-hover:ease-in-out">{{ listing.title }}</span>
                </div>
                <div class="text-sm whitespace-nowrap text-ellipsis overflow-hidden">{{ listing.address }}</div>
            </div>
        </Link>
    </div>
</template>

<script setup>
import { computed } from 'vue'
import { Link } from '@inertiajs/vue3'

const props = defineProps({ listing: Object })

const backgroundImageStyle = computed(() => {
    return {'background-image': `url("${props.listing.thumb}")`}
})
</script>

<style>
    /* .listing-summary {
        flex: 0 0 auto;
        position: relative;
    }

    .listing-summary a {
        text-decoration: none;
    }

    .listing-summary .wrapper {
        max-width: 350px;
        display: block;
    }

    .listing-summary .thumbnail {
        width: 350px;
        height: 250px;
        background-size: cover;
        background-position: center;
    } */

    /* .listing-summary .info {
        color: #484848;
        word-wrap: break-word;
        letter-spacing: 0.2px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .listing-summary .info.title {
        padding-top: 5px;
        font-weight: 700;
        font-size: 16px;
        line-height: 24px;
    }

    .listing-summary .info.address {
        font-size: 14px;
        line-height: 18px;
    } */

    @media (max-width: 400px) {
        .listing-summary .listing-save {
            left: 15px;
            right: auto;
        }
    }
</style>
