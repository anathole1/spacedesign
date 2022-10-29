<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import FrontendLayout from '../Layouts/Frontend.vue';
import Carousel from '@/Components/Frontend/Carousel.vue';
import About from '@/Components/Frontend/About.vue';
import Vision from '@/Components/Frontend/Vision.vue';
import Portfolio from '@/Components/Frontend/Portfolio.vue';
import Services from '@/Components/Frontend/Services.vue';
import ContactMe from '../Components/Frontend/ContactMe.vue';
defineProps({
    abouts: Object,
    projs: Object,
    projects: Object,
    
})
</script>

<template>
    <Head title="Welcome to " />
<FrontendLayout >
    <!-- Hero primary -->
    <Carousel :projects="projects"/>
    <!-- promote tail-100 -->
    <!-- <Promote/> -->
    <!-- about secondary -->

    <About :abouts="abouts" />
    <!-- Vision -->
    <Vision />
 
    <!-- projects primary -->
    <Portfolio :projects="projects" :projs="projs" />
    <!-- services secondary -->
    <Services />
    <!-- contact primary -->
    <ContactMe />
</FrontendLayout>
    
</template>
