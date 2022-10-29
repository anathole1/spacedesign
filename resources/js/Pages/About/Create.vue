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


const form = useForm({
    editor:ClassicEditor,
    content: "",
    image: null,
    position:"",
    title:"",
    accreditation:""
});
const submit = () => {
            form.post(route('about_us.store'));
        };
</script>
<template>
      <Head title="Create About" />
    <AuthenticatedLayout>
        <template #header>
        <h2 class="font-semibold text-xl text-green-500 leading-tight">New About</h2>
        </template>
         <div class="py-12">
            <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 bg-white">
                
                <form @submit.prevent="submit" class="p-4">
    
                    <div class="mt-2">
                        <InputLabel for="title" value="Name" />
                        <TextInput
                        id="title"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.title"
                        autocomplete="title"
                        />
                        <InputError class="mt-2" :message="form.errors.title" />
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
                        <InputLabel for="content" value="Content" />
                        <ckeditor :editor="form.editor" v-model="form.content" :config="editorConfig"></ckeditor>
                        <!-- <TextInput
                        id="detail"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.detail"
                        autocomplete="detail"
                        /> -->
                        <InputError class="mt-2" :message="form.errors.content" />
                    </div>
                    <div class="mt-2">
                        <InputLabel for="position" value="position" />
                        <TextInput
                        id="position"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.position"
                        autocomplete="position"
                        />
                        <InputError class="mt-2" :message="form.errors.position" />
                    </div>
                    <div class="mt-2">
                        <InputLabel for="accreditation" value="Accreditation" />
                        <TextInput
                        id="accreditation"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.accreditation"
                        autocomplete="accreditation"
                        />
                        <InputError class="mt-2" :message="form.errors.accreditation" />
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