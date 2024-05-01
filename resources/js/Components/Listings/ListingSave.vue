<template>
    <div @click.stop="toggleSaved()" class="listing-save">
        <button v-if="button" class="flex items-center bg-white hover:bg-gray-100 text-sm text-black font-black rounded px-3 py-[6px] shadow transition duration-150">
            <svg class="w-6 h-6 mr-1" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            Save
        </button>

        <svg v-else class="w-6 h-6" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </div>
</template>

<script setup>
const props = defineProps({
    button: Boolean,
})

function toggleSaved() {
    console.log('ListingSave component');
}
</script>
