<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';



defineProps({
    projets: Array,
});
const form = useForm({
    editor:ClassicEditor,
    name: "",
    proj_id: "",
    image: null,
    location:"",
    detail:"",
    completion:""
});
const submit = () => {
            form.post(route('projects.store'));
        };
</script>
<template>
      <Head title="Project Type" />
    <AuthenticatedLayout>
        <template #header>
        <h2 class="font-semibold text-xl text-green-500 leading-tight">New Projects</h2>
        </template>
         <div class="py-12">
            <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 bg-white">
                
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
                        <option v-for="projet in projets" :key="projet.id" :value="projet.id">
                            {{ projet.name }}
                        </option>
                        </select>
                        <InputError class="mt-2" :message="form.errors.proj_id" />
                    </div>
                    <div class="mt-1">
                        <InputLabel for="name" value="Project Name" />
                        <TextInput
                        id="name"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.name"
                        autofocus
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
                        <InputLabel for="image" value="Image" />
                        <TextInput
                        id="image"
                        type="file"
                        class="mt-1 block w-full"
                        @input="form.image = $event.target.files[0]"
                        />
                        <InputError class="mt-2" :message="form.errors.image" />
                    </div>
                    <div class="mt-2">
                        <InputLabel for="detail" value="Other Detail" />
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
                        <InputLabel for="completion" value="Completion Year" />
                        <TextInput
                        id="completion"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.completion"
                        autocomplete="completion"
                        />
                        <InputError class="mt-2" :message="form.errors.completion" />
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <PrimaryButton
                        class="ml-4"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        >
                        Save
                        </PrimaryButton>
                    </div>
                    </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>