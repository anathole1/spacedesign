<script setup>
    defineProps({
        abouts: Object,
    })
</script>
<template>
    <section id="about" class="section dark:bg-dark-secondary mt-4 mb-4">
        <div class="container mx-auto bg-green-800 text-white rounded-lg p-2" v-motion :initial="{opacity:0,y:100,}" :visible="{opacity:1,y:0}">
            <div class="flex flex-col xl:flex-row gap-8 sm:gap-24" v-for="about in abouts.data" :key="about.id">
                <img :src="about.image" alt="about" class="object-cover h-full w-[566px] md:mx-auto lg:mx-0 rounded-2xl"/>
                <div class="flex flex-col items-center text-center lg:items-start lg:text-left">
                    <div class="flex flex-col">
                        <h2 class="text-3xl lg:text-4xl font-medium lg:font-extrabold mb-3 text-center">
                            ABOUT US
                        </h2>
                        <p class="mb-4 text-accent" v-html="about.content">
                            
                        </p>
                        <hr class="mb-8 opacity-90 dark:opacity-5" />
                        <h4 class="mb-2 text-right">{{about.title}}</h4>
                        <h6 class="mb-2 opacity-90 text-right">{{about.position}}</h6>
                        <h6 class="mb-2 opacity-80 text-right">{{about.accreditation}}</h6>
                    </div>
                    
                </div>
            </div>

        </div>

    </section>
</template>