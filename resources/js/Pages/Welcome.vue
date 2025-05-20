<script setup>
import { Head } from '@inertiajs/vue3';

defineProps({
    links: {
        type: String,
        required: false,
    },
});

</script>

<template>
    <Head title="Scraper app" />

    <div class="flex flex-col items-center justify-center">
        <h1 class="text-xl mt-6 mb-10">
            Scraper App
        </h1>

        <ul>
            <li v-for="link in links">
                {{ link }}
            </li>
        </ul>
    </div>
</template>
