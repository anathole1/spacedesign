<script setup>
import {ref} from 'vue'
  defineProps({
    project:Object
  });
  const currentSlide = ref(1);
</script>

<template>
    <div class="carousel-item slide-info" v-show="currentSlide === project.id">
        <img :src="project.image" :alt="project.pname" />
    </div>
</template>

<style scoped>

.slide-info{
    position:absolute;
    top:0;
    left:0;
    width:100%;
    max-height: 100%;
    height:100%;
    padding-left:12px;
    padding-right:12px;

    
}
img{
       
        object-fit:cover;
    }
</style>