<template>
    <div class="h-80 flex-1 bg-hero bg-cover bg-center bg-no-repeat cursor-pointer hover:opacity-80 transition duration-200" :style="headerImageStyle" @click="$emit('header-clicked')">
        <!-- listing-save goes here -->
        <div class="default-container relative h-80">
            <button type="button" class="absolute bottom-5 bg-white hover:bg-opacity-80 text-sm text-black font-black rounded px-3 py-2 shadow transition duration-150">View Photos</button>
        </div>
    </div>
</template>

<script setup>
    // import ListingSave from './ListingSave.vue';

    const props = defineProps({
        id: String|Number,
        imageUrl: String,
    })

    const headerImageStyle = { 'background-image': `url(${props.imageUrl})` };
</script>
