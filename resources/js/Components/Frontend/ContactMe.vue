<script setup>
    import { ref } from 'vue';
    import {useForm} from '@inertiajs/inertia-vue3';

    const showMessage = ref(false);
    const form = useForm({
        name: "",
        email: "",
        message:"",
       
    });
    function setShowMessage(value){
        showMessage.value = value;
    }
    function cleanForm(){
        form.reset();
        setShowMessage(true);
        setTimeout(()=>setShowMessage(false),3000);
    }
    const submit = () => {
                form.post(route('contact'),{
                    preserveScroll: true,
                    onSuccess: ()=>cleanForm(),
                    
                });
            };
</script>
<template>
    <section class="section bg-white text-gray-700 dark:bg-green-900 mt-3" id="contact">
        <div class="container mx-auto" v-motion :initial="{opacity:0,y:100,}" :visible="{opacity:1,y:0}">
            <div class="flex flex-col items-center text-center">
                <h2 class="section-title text-4xl font-bold mt-6 p-4">CONTACT US</h2>
            </div>
            <div class="w-full  md:max-w-full mx-auto">
  <div class="p-6 border border-gray-300 bg-gray-800 sm:rounded-md">
    <form method="POST" @submit.prevent="submit">
      <div v-if="showMessage" class="m-2 p-2 bg-green-400 text-white text-center text-2xl font-bold" >Thank You for Contacting Us</div>
      <label class="block mb-6">
        <span class="text-white">Your name</span>
        <input
          type="text"
          v-model="form.name"
          class="
            block
            w-full
            mt-1
            border-gray-300
            rounded-md
            shadow-sm
            focus:border-indigo-300
            focus:ring
            focus:ring-indigo-200
            focus:ring-opacity-50
          "
          placeholder="Enter your name"
        />
        <span class="text-sm mt-1 text-green-200  rounded-lg px-1" v-if="form.errors.name">{{form.errors.name}}</span>
      </label>
      <label class="block mb-6">
        <span class="text-white">Email address</span>
        <input
        v-model="form.email"
          type="email"
          class="
            block
            w-full
            mt-1
            border-gray-300
            rounded-md
            shadow-sm
            focus:border-indigo-300
            focus:ring
            focus:ring-indigo-200
            focus:ring-opacity-50
          "
          placeholder="Enter your Email"
          
        />
        <span class="text-sm mt-1 text-green-200  rounded-lg px-1" v-if="form.errors.email">{{form.errors.email}}</span>
      </label>
      <label class="block mb-6">
        <span class="text-white">Message</span>
        <textarea
        v-model="form.message"
          class="
            block
            w-full
            mt-1
            border-gray-300
            rounded-md
            shadow-sm
            focus:border-indigo-300
            focus:ring
            focus:ring-indigo-200
            focus:ring-opacity-50
          "
          rows="3"
          placeholder="Leave your comment here..."
        ></textarea>
        <span class="text-sm mt-1 text-green-200  rounded-lg px-1" v-if="form.errors.message">{{form.errors.message}}</span>
      </label>
      <div class="mb-6">
        <button
        :disabled="form.processing"
          class="
            h-12
            py-2
            px-5
            text-indigo-100
            bg-green-700
            rounded-lg
            transition-colors
            duration-150
            focus:shadow-outline
            hover:bg-indigo-800
          "
        >
          Contact Us
        </button>
      </div>

    </form>
  </div>
</div>









            <!-- <div class="grid lg:grid-cols-2 gap-8 ">
                <div class="flex flex-1 flex-col items-start space-y-8 bm-12 lg:mb-0 lg:pt-2">
                    <div class="flex flex-col lg:flex-row gap-x-4">
                        <div class=" w-14 h-14  flex items-start justify-center mt-2 mb-1 lg:mb-0 text-2xl px-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                            </svg>
                        </div>
                        <div class="px-3 ">
                            <h4 class="font-body text-xl mb-1 ">Have a Suggestion?</h4>
                            <p class="mb-1 text-paragraph ">We are here to serve you</p>
                           <i class=""> Mail at:</i> <a href="mailto:info@spacedesing.rw" class="font-normal "> info@spasedesign.rw</a>
                            <br/>
                            <i class="">call Us:</i> <a href="tel:+250781570900" class="font-normal "> +250 781 570 900</a>
                        </div>
                    </div>
                </div>
                <form @submit.prevent="submit" class="space-y-8 w-full max-w-full mb-3" >
                    <div v-if="showMessage" class="m-2 p-2 bg-blue-400 text-white text-center text-2xl font-bold" >Thank You for Contacting Us</div>
                    <div class="flex gap-8 px-3 mt-3 sm:mt-0">
                        <div>
                            <input type="text" v-model="form.name" class="h-[54px] outline-none pl-6 w-full font-body text-[15px] rounded-lg focus:outline focus:outline-1 focus:outline-accent" placeholder="Your name">
                            <span class="text-sm mt-1 text-red-400 bg-white rounded-lg px-1" v-if="form.errors.name">{{form.errors.name}}</span>
                        </div>
                        <div>
                            <input type="email" v-model="form.email"  class="h-[54px] outline-none pl-6 w-full font-body text-[15px] rounded-lg focus:outline focus:outline-1 focus:outline-accent" placeholder="Your Email">
                            <span class="text-sm mt-1 text-red-400 bg-white rounded-lg px-1" v-if="form.errors.email">{{form.errors.email}}</span>
                        </div>
                    </div>
                    <div class="px-3">
                        <label for="" >Your Message</label>
                        <textarea v-model="form.message"  cols="50" rows="3" class="rounded-lg pl-6"> </textarea>
                        <span class="text-sm mt-1 text-red-400 bg-white rounded-lg px-1" v-if="form.errors.message">{{form.errors.message}}</span>
                    </div>
                    <div class="px-3 ">
                       
                        <button  class="btn btn-sm rounded-lg bg-blue-500 p-3 text-blue-100 hover:bg-yellow-500 hover:text-yellow-100" :disabled="form.processing">Send Message</button>
                    </div>
                </form>
            </div> -->
        </div>
    </section>

   
</template>