<script setup>

</script>
<template>
    <section class="section bg-white dark:bg-dark-secondary" id="services">
        <div class="container mx-auto" v-motion :initial="{opacity:0,y:100,}" :visible="{opacity:1,y:0}">
            <div class="flex flex-col items-center text-center mt-6 mb-2 bg-green-800 text-green-100">
                <h2 class="section-title text-2xl md:text-4xl pt-5"> SERVICES</h2>
              <hr class="mb-8 text-green-900 opacity-90 dark:opacity-5">
            </div>
            <div class="grid lg:grid-cols-4 gap-8 ">
                <div class="bg-gray-800 text-white dark:bg-blue-500 p-6 rounded-2xl">
                    <div class="text-accent rounded-sm  w-full  flex justify-center items-center mb-12 text-[28px]">
                       <img src="/img/real estate.jfif" alt="" class="w-full h-40 object-cover">

                    </div>
                    <h4 class="text-2xl font-medium mb-2">REAL ESTATE </h4>
                    <p>After provision of trustful services 
                    and remarkable customer care. customer survey
                    Ours clients given us an idea to help them in buying
                    And selling plots and buildings. 
                    </p>
                        </div>
                <div class="bg-gray-800 text-white dark:bg-blue-500 p-6 rounded-2xl">
                    <div class="text-accent rounded-sm w-full  flex justify-center items-center mb-12 text-[28px]">
                        <img src="/img/interior design.jfif" alt="" class="w-full h-40 object-cover"/>
                    </div>
                    <h4 class="text-2xl font-medium mb-2">INTERIOR DESIGNS </h4>
                                <p>Rwandans like organized stuffs, 
            Well-designed and arranged furnitures in their homes. 
            We are best in that!
            </p>
                </div>
                <div class="bg-gray-800 text-white dark:bg-blue-500 p-6 rounded-2xl">
                    <div class="text-accent rounded-sm w-full flex justify-center items-center mb-12 text-[28px]">
                        <img src="/img/real estate.jfif" alt="" class="w-full h-40 object-cover"/>

                    </div>
                    <h4 class="text-2xl font-medium mb-2">LAND SERVICES </h4>
                                <p>Our Surveyors make physical plans, 
            cadastral maps, land subdivisions and land marking, Etc.
            </p>
                </div>
                <div class="bg-gray-800 text-white dark:bg-blue-500 p-6 rounded-2xl">
                    <div class="text-accent rounded-sm w-full flex justify-center items-center mb-12 text-[28px]">
                        <img src="/img/education.jpg" alt="" class="w-full h-40 object-cover"/>
                    </div>
                    <h4 class="text-2xl font-medium mb-2 capitalize">EDUCATION </h4>
                    <p>Entered in the education industry to help 

young engineers in industry to get designing skills
</p>
                </div>
            </div>
        </div>
    </section>
</template>