<script >

// import Slide from "@/Components/Frontend/CarouselItem.vue"
// defineProps({
//     projects:Object
// });

export default{
    name: 'Carousel',
    data: () => ({
    images: [
      "img/pr1.png",
      "img/pr2.jpg",
      "img/pr3.jpg"
    ],
    active: 0
  }),
  mounted() {
    let i = 0;
    setInterval(() => {
      if (i > this.images.length - 1) {
        i = 0;
      }
      this.active = i;
      i++;
    }, 6000);
  }
}



</script>

<template> 
<div class="relative slide container mx-auto sm:pt-5 top mb-20 sm:mb-20">
    <div class="carousel-indicators absolute bottom-0 flex bg-green-100 h-20 w-full justify-center items-center">
      <ol class="z-50 flex w-4/12 justify-center">
        <li v-for="(img, i) in images" :key="i" class="md:w-4 md:h-4 bg-gray-300 rounded-full cursor-pointer mx-2"></li>
      </ol>
    </div>
    <div class="carousel-inner relative overflow-hidden w-full ">
      <div v-for="(img, i) in images" :id="`slide-${i}`" :key="i" :class="`${active === i ? 'active' : 'left-full'}`" class="carousel-item inset-0 relative w-full transform transition-all duration-500 ease-in-out">
        <img class="block w-full h-60 sm:h-64" :src="img" alt="First slide" />
      </div>
    </div>
  </div>
</template>
<style  scoped>
.top{
    top:60px;
    
}
img{
    object-fit:cover
}
.left-full {
  left: -100%;
}

.carousel-item {
  float: left;
  position: relative;
  display: block;
  width: 100%;
  margin-right: -100%;
  backface-visibility: hidden;
}

.carousel-item.active {
  left: 0;
}
</style>