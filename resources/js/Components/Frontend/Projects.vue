<script setup>
import Project from './Project.vue';
import { ref } from "vue"; 
    const props = defineProps({
        projects: Object,
        projs: Object,
    });

    const filteredProjects = ref(props.projects.data);
    const selectedSkill = ref("all");

    const filterProjects = (id)=>{
        if(id === "all"){
            filteredProjects.value = props.projects.data;
            selectedSkill.value = id;
        }else{
            filteredProjects.value = props.projects.data.filter(project => {
                return project.projType.id === id;
            });
            selectedSkill.value = id;
        }
    };
</script>

<template>
    <div class="container mx-auto mt-2" v-motion :initial="{opacity:0,y:100,}" :visible="{opacity:1,y:0}">
        <!-- <nav class="mb-6 border-b-2 border-blue-200 dark:text-dark-navy-100">
            <ul class="flex flex-col lg:flex-row justify-evenly items-center">
                <li class="cursor-pointer capitalize m-4">
                    <button @click="filterProjects('all')" class="flex text-center px-4 py-2 btn btn-sm  rounded-md bg-blue-400  text-blue-100 hover:text-sky-100 hover:bg-blue-500 dark:text-blue-100" :class="[selectedSkill === 'all' ? 'bg-blue-700 text-blue-100 dark:text-blue-200' : '']">
                        All
                    </button>
                </li>
                <li class="cursor-pointer capitalize m-4" v-for="projectSkill in projs.data" :key="projectSkill.id">
                    <button @click="filterProjects(projectSkill.id)" class="flex text-center px-4 py-2 btn btn-sm  rounded-md bg-blue-400  text-blue-100 hover:text-blue-200 hover:bg-blue-500 dark:text-blue-200" :class="[selectedSkill == projectSkill.id ? 'bg-blue-700 text-blue-100 dark:text-blue-300' : '']">
                        {{projectSkill.Devname}}
                    </button>
                </li>
            </ul>
        </nav> -->
        <section class="grid gap-y-4 lg:grid-cols-3 lg:gap-8">
            <Project v-for="project in filteredProjects" :key="project.id" :project="project" />
        </section>
    </div>
</template>