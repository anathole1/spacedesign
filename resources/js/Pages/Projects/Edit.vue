<template>
    <Head title="Projects" />
    <AuthenticatedLayout>
      <template #header>
        <h2 class="font-semibold text-xl text-green-800 leading-tight">
          Edit Projects
        </h2>
      </template>
      <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 bg-white rounded-md shadow-sm shadow-green-500/50 border-t-4 border-green-500">
          <form @submit.prevent="submit" class="p-4">
            <div class="mt-1">
              <InputLabel for="name" value="Type of Development" />
              <select
                v-model="form.proj_id"
                id="proj_id"
                name="proj_id"
                class="
                  mt-1
                  block
                  w-full
                  pl-3
                  pr-10
                  py-2
                  text-base
                  border-gray-300
                  focus:outline-none focus:ring-indigo-500 focus:border-indigo-500
                  sm:text-sm
                  rounded-md
                "
              >
                <option v-for="proj in projectType" :key="proj.id" :value="proj.id">
                  {{ proj.name }}
                </option>
              </select>
            </div>
            <div class="mt-1">
              <InputLabel for="name" value="Name" />
              <TextInput
                id="name"
                type="text"
                class="mt-1 block w-full"
                v-model="form.name"
                
                autocomplete="name"
              />
              <InputError class="mt-2" :message="form.errors.name" />
            </div>
            <div class="mt-2">
              <InputLabel for="location" value="Location" />
              <TextInput
                id="location"
                type="text"
                class="mt-1 block w-full"
                v-model="form.location"
                autocomplete="location"
              />
              <InputError class="mt-2" :message="form.errors.location" />
            </div>
            <div class="mt-2">
              <InputLabel for="detail" value="detail" />
              <ckeditor :editor="form.editor" v-model="form.detail" :config="editorConfig"></ckeditor>
              <!-- <TextInput
                id="detail"
                type="text"
                class="mt-1 block w-full"
                v-model="form.detail"
                autocomplete="detail"
              /> -->
              <InputError class="mt-2" :message="form.errors.detail" />
            </div>
            <div class="mt-2">
              <InputLabel for="completion" value="completion" />
              <TextInput
                id="completion"
                type="text"
                class="mt-1 block w-full"
                v-model="form.completion"
                autocomplete="completion"
              />
              <InputError class="mt-2" :message="form.errors.completion" />
            </div>
            <div class="mt-2">
              <InputLabel for="image" value="Image" />
              <TextInput
                id="image"
                type="file"
                class="mt-1 block w-full"
                @input="form.image = $event.target.files[0]"
              />
              <InputError class="mt-2" :message="form.errors.image" />
            </div>
  
            <div class="flex items-center justify-end mt-4">
              <PrimaryButton
                class="ml-4"
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
              >
                Update
              </PrimaryButton>
            </div>
          </form>
        </div>
      </div>
    </AuthenticatedLayout>
  </template>
     <script setup>
  import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
  import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
  import InputError from "@/Components/InputError.vue";
  import InputLabel from "@/Components/InputLabel.vue";
  import PrimaryButton from "@/Components/PrimaryButton.vue";
  import TextInput from "@/Components/TextInput.vue";
  import { Inertia } from "@inertiajs/inertia" 
  import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
  const props= defineProps({
    projectType: Array,
    project: Object
  });
  const form = useForm({
    editor:ClassicEditor,
    name: props.project?.name,
    proj_id: props.project?.project_type_id,
    image: null,
    location: props.project?.location,
    detail: props.project?.other_detail,
    completion: props.project?.compl_year,
  });
  
  const submit = () => {
    Inertia.post(`/projects/${props.project.id}`,{
        _method:"put",
        name: form.name,
        image:form.image,
        proj_id:form.proj_id,
        location:form.location,
        detail:form.detail,
        completion:form.completion,
    })
  };
  
  </script>
     