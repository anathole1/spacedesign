<script setup>
defineProps({
    projs: Object,
})
</script>
<template>
    <section class="bg-light-tail-100 dark:bg-dark-navy-500 py-16">
        <div class="container mx-auto">
            <div class="grid grid-cols-8 md:grid-flow-col">
                <div class="flex items-center justify-center" v-for="proj in projs.data" :key="proj.id">
                   {{proj.Devname}}
                </div>
            </div>
        </div>
    </section>
</template>