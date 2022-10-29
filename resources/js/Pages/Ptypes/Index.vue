<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";

defineProps({
    projets: Object,
})
</script>
<template>
      <Head title="Project Type" />
    <AuthenticatedLayout>
        <template #header>
        <h2 class="font-semibold text-xl text-green-500 leading-tight">Projects Types</h2>
        </template>
         <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-end m-2 p-2">
                    <Link :href="route('project_type.create')" class=" px-4 py-2 bg-green-500 hover:bg-green-700 text-white rounded-md">
                        New Project Type
                    </Link>
                    </div>
                    <div class="overflow-x-auto relative mt-2">
                        <table
                            class="w-full text-sm text-left text-gray-500 dark:text-gray-400"
                        >
                            <thead
                            class="
                                text-xs text-gray-700
                                uppercase
                                bg-green-300
                                dark:bg-gray-700 dark:text-gray-400
                            "
                            >
                            <tr>
                                <th scope="col" class="py-3 px-6 font-semibold">#</th>
                                <th scope="col" class="py-3 px-6 font-semibold">Project Development Name</th>
                                <th scope="col" class="py-3 px-6 font-semibold">Created_Date</th>
                                <th scope="col" class="py-3 px-6 font-semibold">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="proj in projets.data" :key="proj.id"
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                            >
                                <th
                                scope="row"
                                class="
                                    py-4
                                    px-6
                                    font-medium
                                    text-gray-900
                                    whitespace-nowrap
                                    dark:text-white
                                "
                                >
                                {{proj.id}}
                                </th>

                                <td class="py-4 px-6">{{proj.Devname}}</td>
                                <td class="py-4 px-6">{{proj.created_at}}</td>
                                <td class="py-4 px-6 text-blue-500">
                                <Link :href="route('project_type.edit', proj.id)" class="font-medium text-blue-500 hover:text-blue-700 mr-2">Edit</Link>
                                <Link :href="route('project_type.destroy', proj.id)" method="delete" as="button" type="button" class="font-medium text-red-500 hover:text-red-700 mr-2">Delete</Link>
                                </td>
                            </tr>
                            
                            </tbody>
                        </table>
                        </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>