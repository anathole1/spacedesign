<script setup>
import { ref , onMounted} from "vue";
const showMobileMenu = ref("false");
const scrollBg =ref(false);
const navigations = [
  {name: "Home", href:"#home"},
  {name: "About", href:"#about"},
  {name: "Services", href:"#services"},
  {name: "Project", href:"#project"},
  {name: "Contact", href:"#contact"},
];
const setScrollBg = (value)=>{
  scrollBg.value = value;
}
onMounted(()=>{
  window.addEventListener("scroll",()=>{
    return window.scrollY > 50 ? setScrollBg(true):setScrollBg(false)
  })
})
</script>

<template>
  <nav
    class="
      w-full
      fixed
      z-20
      border-yellow-500
      px-2
      sm:px-4
      py-2
      rounded
      mb-4
      
    "
    style="margin-top:-16px"
    :class="{
      'bg-green-800 text-white dark:bg-dark-primary':scrollBg,
      'bg-green-800 text-white dark:bg-slate-800': !scrollBg
    }"
  >
    <div class="container flex flex-wrap justify-between items-center mx-auto">
      <a href="#" class="flex items-center text-2xl sm:text-3xl">
        <img
          src="/img/logo.jpg"
          class="mr-3 mt-4 h-10  sm:h-16 sm:mt-6"
          alt="space design Logo"
        />
        Space Design & Construction
      </a>
      <button
        @click="showMobileMenu = !showMobileMenu"
        data-collapse-toggle="navbar-default"
        type="button"
        class="
          inline-flex
          items-center
          p-2
          ml-3
          mt-3
          text-sm text-white
          rounded-lg
          md:hidden
          hover:bg-gray-700
          focus:outline-none focus:ring-2 focus:ring-gray-200
          dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600
        "
        aria-controls="navbar-default"
        aria-expanded="false"
      >
        <span class="sr-only">Open main menu</span>
        <svg
          class="w-6 h-6"
          aria-hidden="true"
          fill="currentColor"
          viewBox="0 0 20 20"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            fill-rule="evenodd"
            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
            clip-rule="evenodd"
          ></path>
        </svg>
      </button>
      <div
        class="w-full md:block md:w-auto"
        id="navbar-default"
        :class="{ hidden: showMobileMenu }"
      >
        <ul
          class="
            flex flex-col
            p-4
            mt-4
            rounded-lg
            border border-light-tail-500
            dark:border-dark-navy-100
            md:flex-row
            md:space-x-8
            md:mt-0
            md:text-sm
            md:font-medium
            md:border-0
          "
        >
          <li v-for="(navigation,index) in navigations" :key="index">
            <a
              :href="navigation.href"
              class="
                block
                py-2
                pr-4
                pl-3
                text-white
                text-2xl
                hover:text-white
                hover:bg-green-600
                hover:px-3
                dark:bg-dark-navy-100
                rounded
                md:bg-transparent md:text-white md:p-0
                
              "
              
              aria-current="page"
              >{{navigation.name}}</a
            >
          </li>
      
        </ul>
      </div>
    </div>
  </nav>
</template>