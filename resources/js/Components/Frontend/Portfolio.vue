<script setup>
    import Projects from './Projects.vue';
    defineProps({
        projects: Object,
        projs: Object,
    })
</script>
<template>
    <section id="project" class="section bg-light-primary dark:bg-dark-primary  mt-10" >
        <div class="container mx-auto " v-motion :initial="{opacity:0,y:100,}" :visible="{opacity:1,y:0}">
            <div class="flex flex-col items-center text-center bg-green-800 text-green-100">
                <h2 class="section-title text-4xl p-7">
                    PROJECTS
                </h2>
                
            </div>
            <Projects :projects="projects" :projs="projs" />
        </div>
    </section>
</template>