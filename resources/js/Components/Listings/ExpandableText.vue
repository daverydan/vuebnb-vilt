<template>
    <div class="expandable-text">
        <p :class="{ 'line-clamp-4': contracted }" class="mb-2 leading-8">
            <slot></slot>
        </p>
        <button
            class="text-primary font-black hover:text-opacity-80"
            @click="contracted = !contracted"
        >
            {{ contracted ? '+ Read More' : '- Show Less' }}
        </button>
    </div>
</template>

<script setup>
import { ref } from 'vue';

const contracted = ref(true);
</script>
