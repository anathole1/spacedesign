<template>
    <Head title="Type of Development" />
    <AuthenticatedLayout>
           <template #header>
               <h2 class="font-semibold text-xl text-green-800 leading-tight">
                   Edit Type of Development
               </h2>
               
           </template>
           <div class="py-6">
               <div class="max-w-md mx-auto sm:px-6 lg:px-8 bg-white rounded-md shadow-sm shadow-green-500/50 border-t-4 border-green-500">
                <form @submit.prevent="submit" class="p-4">
            <div>
                <InputLabel for="name" value="Name" />
                <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name"  autocomplete="name" />
                <InputError class="mt-2" :message="form.errors.name" />
            </div>


            <div class="flex items-center justify-end mt-4">
           
                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Update
                </PrimaryButton>
            </div>
        </form>
                   
               </div>
           </div>
       </AuthenticatedLayout>
   </template>
   <script setup>
       import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
       import { Head, Link, useForm} from '@inertiajs/inertia-vue3';
       import InputError from '@/Components/InputError.vue';
       import InputLabel from '@/Components/InputLabel.vue';
       import PrimaryButton from '@/Components/PrimaryButton.vue';
       import TextInput from '@/Components/TextInput.vue';
       import { Inertia } from "@inertiajs/inertia"
        const props= defineProps({
            projectType:Object,
        })
       const form = useForm({
            name: props.projectType?.name,
           
        });

        const submit = () => {
            Inertia.post(`/project_type/${props.projectType.id}`,{
                _method: "put",
                name:form.name
                
            });
        };
   </script>
   