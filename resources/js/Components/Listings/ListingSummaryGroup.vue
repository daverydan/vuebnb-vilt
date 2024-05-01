<template>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 mb-5">
        <h1 class="text-2xl font-black pb-5">Places in {{ country }}</h1>

        <div class="listing-carousel">
            <!-- carousel -->
        </div>

        <div class="overflow-x-scroll">
            <!-- Listing Summaries -->
            <div class="flex justify-between space-x-4" :style="listingSummariesStyle">
                <ListingSummaryDetails
                    v-for="listing in listings"
                    :listing="listing"
                    :key="listing.id"
                />
            </div>
        </div>
    </div>
</template>

<script setup>
import { computed, ref } from 'vue';
import ListingSummaryDetails from './ListingSummaryDetails.vue';

const props = defineProps({
    listings: Array,
    country: String,
})

const rowSize = 3;
const listingSummaryWidth = 365;

const offset = ref(0);

const listingSummariesStyle = computed(() => { transform: `translateX(${offset.value * -listingSummaryWidth}px)` })

const leftArrowStyle = computed(() => { visibility: (this.offset > 0 ? 'visible' : 'hidden') })

const rightArrowStyle = computed(() => { visibility: (this.offset < (this.listings.length - rowSize) ? 'visible' : 'hidden') })
</script>

<style>
    .listing-carousel {
        position: relative;
    }

    .listing-carousel .controls {
        display: flex;
        justify-content: space-between;
        position: absolute;
        top: calc(50% - 45px);
        left: -45px;
        width: calc(100% + 90px);
    }

    .listing-carousel .controls .carousel-control {
        color: #c5c5c5;
        font-size: 1.5rem;
        cursor: pointer;
    }
</style>
