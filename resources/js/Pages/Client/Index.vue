<script setup>
import SideBarLayout from '@/Layouts/SideBarLayout.vue';
import ClientCard from '@/Components/ClientCard.vue';
import Pagination from '@/Components/Pagination.vue';
import { Head, Link, router } from '@inertiajs/vue3';

const props = defineProps({
    clients: Object,

})
// function search(ev){
//     router.visit('/clients/search/'+ ev.target.value);

// }

</script>

<template>

    <Head title="Clients" />

    <SideBarLayout>
        <template #header>
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Clients Information</h2>
                <!-- <div style="position:relative">
                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-9 p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search clients here" @keydown.enter="search($event)">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#444  " width="20px" height="20px" viewBox="0 0 16 16"
                    style="position:absolute; top:10px; right:10px">
                    <path d="M12.027 9.92L16 13.95 14 16l-4.075-3.976A6.465 6.465 0 0 1 6.5 13C2.91 13 0 10.083 0 6.5 0 2.91 2.917 0 6.5 0 10.09 0 13 2.917 13 6.5a6.463 6.463 0 0 1-.973 3.42zM1.997 6.452c0 2.48 2.014 4.5 4.5 4.5 2.48 0 4.5-2.015 4.5-4.5 0-2.48-2.015-4.5-4.5-4.5-2.48 0-4.5 2.014-4.5 4.5z" fill-rule="evenodd"/>
                    </svg>
                </div> -->

                <div>
                    <Link v-if="$page.props.auth.permissions.includes('manage-clients')" class="button1 mb-2 py-2 px-3 bg-blue-300 shadow border-gray-300 border hover:bg-blue-400 rounded mr-3" as="button" href="/clients/create">Create Client</Link>

                </div>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-wrap" >
                <ClientCard v-for="client in props.clients.data" :client="client" :key="client.id"/>

            </div>
            <Pagination :links="clients.links" class="mt-6 flex justify-center"/>
        </div>
    </SideBarLayout>

</template>


