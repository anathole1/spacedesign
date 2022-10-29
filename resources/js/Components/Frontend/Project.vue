<script setup>
    import {Link} from "@inertiajs/inertia-vue3"
    defineProps({
        project: Object,
    })
</script>
<template>
    <div class="group flex flex-col items-center  text-center cursor-pointer">
        <div class="mb-4">
            <img :src="project.image" :alt="project.name" class="rounded-2xl h-56"/>
        </div>
        <h3 class="group-hover:text-light-tail-500 text-2xl font-semibold capitalize ">{{project.pname}}</h3>
        <!-- <span class="group-hover:text-light-tail-500 capitalize text-accent text-sm mb-3">{{project.projType.Devname}}</span>
        <h3 class="group-hover:text-light-tail-500 capitalize mb-3">{{project.location}}</h3>
        <h3 class="group-hover:text-light-tail-500 capitalize mb-3" v-html="project.detail"></h3>
        <h3 class="group-hover:text-light-tail-500 capitalize mb-3">{{project.completion}}</h3> -->
    </div>
</template>