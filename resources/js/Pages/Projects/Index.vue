<script setup>
    import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
    import { Head, Link } from "@inertiajs/inertia-vue3";
    defineProps({
        projects:Object,
    })
    </script>
    <template>
          <Head title="Projects" />
        <AuthenticatedLayout>
            <template #header>
            <h2 class="font-semibold text-xl text-green-500 leading-tight">Projects</h2>
            </template>
            <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-end m-2 p-2">
                    <Link :href="route('projects.create')" class=" px-4 py-2 bg-green-500 hover:bg-green-700 text-white rounded-md">
                        New Project 
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
                <th scope="col" class="py-3 px-6 font-semibold">Project Type</th>
                <th scope="col" class="py-3 px-6 font-semibold">Project Name</th>
                <th scope="col" class="py-3 px-6 font-semibold">Image</th>
                <th scope="col" class="py-3 px-6 font-semibold">Location</th>
                <th scope="col" class="py-3 px-6 font-semibold">Other Detail</th>
                <th scope="col" class="py-3 px-6 font-semibold">Created_Date</th>
                <th scope="col" class="py-3 px-6 font-semibold">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="project in projects.data" :key="project.id"
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
                  {{project.id}}
                </th>
                <td class="py-4 px-6">{{project.projType.Devname}}</td>
                <td class="py-4 px-6">{{project.pname}}</td>
                <td class="py-4 px-6"><img :src="project.image" alt="imag" class="w-12 h-12 rounded-full"> </td>
                <td class="py-4 px-6">{{project.location}}</td>
                <td class="py-4 px-6" v-html="project.detail"></td>
                <td class="py-4 px-6">{{project.created_at}}</td>
                <td class="py-4 px-6 text-blue-500">
                  <Link :href="route('projects.edit', project.id)" class="font-medium text-blue-500 hover:text-blue-700 mr-2">Edit</Link>
                  <Link :href="route('projects.destroy', project.id)" method="delete" as="button" type="button" class="font-medium text-red-500 hover:text-red-700 mr-2">Delete</Link>
                </td>
              </tr>
             
            </tbody>
          </table>
        </div>
            </div>
        </div>
        </AuthenticatedLayout>
    </template>