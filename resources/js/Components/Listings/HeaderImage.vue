<template>
    <div class="h-80 flex-1 bg-hero bg-cover bg-center bg-no-repeat cursor-pointer" :style="headerImageStyle" @click="$emit('header-clicked')">
        <div class="default-container relative h-80">
            <ListingSave
                :button="true"
                class="absolute top-5 right-0"
            />
            <button type="button" class="absolute bottom-5 bg-white hover:bg-gray-100 text-sm text-black font-black rounded px-3 py-2 shadow transition duration-150">View Photos</button>
        </div>
    </div>
</template>

<script setup>
    import ListingSave from './ListingSave.vue';

    const props = defineProps({
        id: String|Number,
        imageUrl: String,
    })

    const headerImageStyle = { 'background-image': `url(${props.imageUrl})` };
</script>
