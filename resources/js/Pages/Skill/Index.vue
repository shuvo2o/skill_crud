<script setup>
import { Link, router } from "@inertiajs/vue3";
import { Head } from "@inertiajs/vue3";
// import AdminLayout from "../Admin/Components/AdminLayout.vue";

defineProps({
  skills: {
    type: Object,
    required: true,
  }
});
const updatePageNumber = (link) => {
  if (link.url) {
    const url = new URL(link.url);
    const pageNumber = url.searchParams.get('page');
    router.visit('/admin/skills?page=' + pageNumber);
  }
}




</script>

<template>
  <AdminLayout>
    <Head title="Skill" />
    <h2 class="text-xl text-blue-700 leading-tight text-center">Skills Home Page</h2>

    <div class="w-full pb-5">
      <Link :href="route('skill.create')"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
        Add Skill
      </Link>
    </div>

    <div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
      <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-blue-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <th scope="col" class="px-6 py-3">ID</th>
              <th scope="col" class="px-6 py-3">Name</th>
              <th scope="col" class="px-6 py-3">Image</th>
              <th scope="col" class="px-6 py-3">Edit</th>
              <th scope="col" class="px-6 py-3">Delete</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="skill in skills" :key="skill.id" class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ skill.id }}</th>
              <td class="px-6 py-4">{{ skill.name }}</td>
              <td class="px-6 py-4">
                <img :src="`/${skill.image}`" alt="" class="h-10 w-20 object-cover rounded-full border border-blue-300 p-2"/>
              </td>

             <td class="px-6 py-4">
              <Link :href="route('skill.edit', skill.id)" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</Link>

             </td>
             
            
            </tr>
          </tbody>
        </table>
        
      </div>
    </div>
  </AdminLayout>
</template>

<style scoped>

</style>
