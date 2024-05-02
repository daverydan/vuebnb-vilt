<template>
    <div class="mx-auto max-w-[1440px]">
        <HeaderImage
            :image-url="listing.images[0]"
            @header-clicked="openModal"
            :id="listing.id"
        />
    </div>
    <!-- Info -->
    <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8 mt-8">
        <div class="listing-container">
            <div class="mb-8">
                <div class="flex justify-between items-start space-x-4 mb-2">
                    <div>
                        <h1 class="text-3xl font-black">{{ listing.title }}</h1>
                        <p class="text-gray-400">{{ listing.address }}</p>
                    </div>
                    <span class="inline-flex items-center rounded-md bg-primary px-3 py-[5px] mt-[5px] font-medium text-white">{{ listing.price_per_night }}</span>
                </div>
            </div>
            <hr>
            <div class="my-8">
                <h3 class="text-[22px] font-black mb-2">About this listing</h3>
                <ExpandableText>{{ listing.about }}</ExpandableText>
            </div>
        </div>
        <!-- Amenities -->
        <div class="mb-10">
            <hr>
            <div class="text-lg mt-8 mb-6 font-black">Amenities</div>
            <div class="space-y-5 sm:space-y-0 sm:grid sm:grid-cols-3 sm:gap-5">
                <div v-for="amenity in computedAmenities" class="">
                    <i class="fa fa-lg" :class="amenities[amenity][0].icon"></i>
                    <span class="inline-flex ml-3">{{ amenities[amenity][0].title }}</span>
                </div>
            </div>
        </div>
        <!-- Prices -->
        <div class="pb-10">
            <hr>
            <div class="text-lg mt-8 mb-6 font-black">Prices</div>
            <div class="space-y-5 sm:space-y-0 sm:grid sm:grid-cols-2 sm:gap-5">
                <div v-for="(amount, title) in computedPrices" class="">
                    <span class="inline-block" :class="[amount === 'No charge' ? 'w-20' : 'w-8']">{{ amount }}</span>
                    <span class="inline-flex ml-3">{{ prices[title] }}</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import HeaderImage from '@/Components/Listings/HeaderImage.vue'
import ExpandableText from '@/Components/Listings/ExpandableText.vue'
import { computed } from 'vue';

const props = defineProps({
    listing: Object,
})

const amenities = {
    amenity_wifi: [{ title: 'Wireless Internet', icon: 'fa-wifi' }],
    amenity_pets_allowed: [{ title: 'Pets Allowed', icon: 'fa-paw' }],
    amenity_tv: [{ title: 'TV', icon: 'fa-television' }],
    amenity_kitchen: [{ title: 'Kitchen', icon: 'fa-cutlery' }],
    amenity_breakfast: [{ title: 'Breakfast Available', icon: 'fa-apple-whole' }],
    amenity_laptop: [{ title: 'Computer Available', icon: 'fa-laptop' }],
}

const prices = {
    price_per_night: 'Per night',
    price_extra_people: 'Per extra person',
    price_weekly_discount: 'Weekly discount',
    price_monthly_discount: 'Monthly discount',
}

const computedAmenities = computed(() => Object.keys(Object.fromEntries(Object.entries(props.listing).filter(([key, value]) => key.includes('amenity_') && value))));

const computedPrices = computed(() => Object.fromEntries(Object.entries(props.listing).filter(([key, value]) => key.includes('price_'))));

function openModal() {
    //
}
</script>

