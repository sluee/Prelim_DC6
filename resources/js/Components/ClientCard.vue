<template>
    <div class="mx-auto mt-5 w-80 transform overflow-hidden rounded-lg bg-white dark:bg-slate-800 shadow-md  hover:shadow-lg ">
        <div class="cursor-pointer " @click="open(client)">
            <img class="h-48 w-full object-cover object-center"  :src="client.picUrl" />
        <div class="p-4">
            <div class="flex items-center">
                <h2 class="mb-2 mr-4 text-lg  dark:text-white text-gray-900"><span class="font-semibold">Name: </span> {{ client.first_name }} {{ client.last_name }}</h2>
                <h2 class="mb-2 text-lg dark:text-white text-gray-900"><span class="font-semibold">Level: </span> {{ client.level }}</h2>
            </div>
            <p class="mb-2 text-lg text-gray-900 dark:text-white"><span class="font-semibold">Address: </span> {{ client.address }}</p>
            <p class="mb-2 text-lg text-gray-900 dark:text-white"><span class="font-semibold">Phone: </span>{{ client.phone }}</p>
        </div>
        <!-- <div class="flex justify-between">
            <div>&nbsp;</div>
            <label class="switch">
                <input type="checkbox"  @change.prevent="toggleEnabled(client)">
                <span class="slider"></span>
              </label>
        </div> -->
        </div>

      </div>

</template>

<script setup>
import { router } from '@inertiajs/vue3';


const props = defineProps({
    client: Object,

})

// function open(client) {
//     router.visit('/clients/' + client.id)
// }


// function toggleEnabled(client){
//     router.visit('/clients/toggle/' +client.id , {
//         method:'post',
//         preserveScroll:true
//     })
// }
</script>

<style scoped>
.switch {
    position: relative;
    display: inline-block;
    width: 120px;
    height: 34px;
   }

   .switch input {
    display: none;
   }

   .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #3C3C3C;
    -webkit-transition: .4s;
    transition: .4s;
    border-radius: 34px;
   }

   .slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
    border-radius: 50%;
   }

   input:checked + .slider {
    background-color: #0E6EB8;
   }

   input:focus + .slider {
    box-shadow: 0 0 1px #2196F3;
   }

   input:checked + .slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(85px);
   }

   /*------ ADDED CSS ---------*/
   .slider:after {
    content: 'DISABLED';
    color: white;
    display: block;
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    font-size: 10px;
    font-family: Verdana, sans-serif;
   }

   input:checked + .slider:after {
    content: 'ENABLED';
   }

   /*--------- END --------*/

</style>
