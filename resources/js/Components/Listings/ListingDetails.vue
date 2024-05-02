<template>
    <div class="mx-auto max-w-[1440px]">
        <HeaderImage
            :image-url="listing.images[0]"
            @header-clicked="openModal"
            :id="listing.id"
        />
    </div>

    <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8 mt-8">
        <div class="listing-container">
            <div class="mb-8">
                <h1 class="text-3xl font-black mb-2">{{ listing.title }}</h1>
                <p class="text-gray-400">{{ listing.address }}</p>
            </div>
            <hr>
            <div class="about">
                <h3 class="text-[22px] font-black mb-2">About this listing</h3>
                <ExpandableText>{{ listing.about }}</ExpandableText>
            </div>
        </div>
        <!-- Amenities -->
        <div class="lists">
            <!-- <feature-list title="Amenities" :items="listing.amenities">
                <template slot-scope="amenity">
                    <i class="fa fa-lg" :class="amenity.icon"></i>
                    <span>{{ amenity.title }}</span>
                </template>
            </feature-list>
            <feature-list title="Prices" :items="listing.prices">
                <template slot-scope="price">
                    {{ price.title }}: <strong>{{ price.value }}</strong>
                </template>
            </feature-list> -->
        </div>
    </div>
</template>

<script setup>
import HeaderImage from '@/Components/Listings/HeaderImage.vue'
import ExpandableText from '@/Components/Listings/ExpandableText.vue'

const props = defineProps({
    listing: Object,
})

function openModal() {
    //
}
</script>

<style>

.about {
    margin: 2em 0;
}

.about h3 {
    /* font-size: 22px; */
}
</style>
