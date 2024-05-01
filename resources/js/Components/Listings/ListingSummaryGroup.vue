<template>
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8 mb-5">
        <h1 class="text-2xl font-black pb-5">Places in {{ country }}</h1>

        <div class="listing-carousel">
            <!-- carousel -->
        </div>

        <!-- <div class="listing-summaries-wrapper"> -->
        <div class="overflow-x-scroll">
            <div class="listing-summaries" :style="listingSummariesStyle">
                <ListingSummary
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
import ListingSummary from './ListingSummary.vue';

const props = defineProps({
    listings: Array,
    country: String,
})

const rowSize = 3;
const listingSummaryWidth = 365;

const offset = ref(0);

const listingSummariesStyle = computed(() => { transform: `translateX(${offset.value * -listingSummaryWidth}px)` })
</script>

<style>
    .listing-summary-group {
        padding-bottom: 20px;
    }

    .listing-summaries-wrapper {
        overflow: hidden;
    }

    .listing-summaries {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        transition: transform 0.5s;
    }

    .listing-summaries > .listing-summary {
        margin-right: 15px;
    }

    .listing-summaries > .listing-summary:last-child {
        margin-right: 0;
    }

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
