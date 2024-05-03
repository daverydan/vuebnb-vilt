<template>
    <div class="h-80 flex-1 bg-hero bg-cover bg-center bg-no-repeat cursor-pointer relative group" :style="headerImageStyle" @click="$emit('header-clicked')">
        <div class="absolute top-0 left-0 bg-transparent group-hover:bg-[rgba(0,0,0,.1)] group-hover:transition group-hover:duration-300 group-hover:ease-in-out w-full h-full z-0"></div>
        <div class="default-container relative h-80 group">
            <div class="w-full flex justify-end pt-5">
                <ListingSave
                    v-if="$page.props.auth.user"
                    :button="true"
                    class="z-10"
                />
            </div>
            <button type="button" class="absolute bottom-5 bg-white hover:bg-gray-100 text-sm text-black font-black rounded px-3 py-2 shadow transition duration-150 z-10">View Photos</button>
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
