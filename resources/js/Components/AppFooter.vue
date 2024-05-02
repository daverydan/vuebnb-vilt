<template>
    <div class="pt-6 pb-7 text-center text-white w-full bg-gray-800 border-y border-gray-700">
        <p class="flex flex-col sm:flex-row justify-center items-center mb-2">
            <ApplicationLogo class="mb-2 sm:mb-0" />
            <span class="hidden sm:inline-block text-[20px] font-black mx-3">/</span>
            <span class="inline-flex text-sm mt-1">A VILT stack demo app.</span>
        </p>
        <p class="text-xs">Built by <span class="font-black text-primary">Danny Avery</span></p>
    </div>
</template>

<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue'
</script>
