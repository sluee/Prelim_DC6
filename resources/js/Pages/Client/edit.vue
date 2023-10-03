<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import SideBarLayout from '@/Layouts/SideBarLayout.vue';

const props = defineProps({
    clients:Object
})

const form = useForm({
    last_name:props.clients.last_name,
    first_name:props.clients.first_name,
    address:props.clients.address,
    phone:props.clients.phone,
    level:props.clients.level,
    pic:props.clients.pic
})

function submit (){
    form.put('/clients/'+props.clients.id)
}
</script>

<template>
      <Head title="Edit Client" />

    <SideBarLayout>
        <template #header>
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Client</h2>
            </div>
        </template>
        <div class="py-6">
            <div class="flex flex-col justify-center items-center">
                <div class="relative flex flex-col items-center rounded-[20px] w-[500px] max-w-[95%] mx-auto bg-white bg-clip-border shadow-3xl shadow-shadow-500 dark:!bg-navy-800 dark:text-white dark:!shadow-none p-3">
                    <div class="mt-2 mb-8 w-full">
                        <form @submit.prevent="submit" class="flex">
                            <div class="flex-1 pr-4">
                                <h4 class="px-2 text-xl font-bold text-navy-700 dark:text-black">
                                    Client Details
                                </h4>
                                <div class="px-5 py-5">
                                    <label class="font-semibold text-sm text-gray-600  block" for="last_name">Lastname</label>
                                    <input type="text" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full text-gray-600 " v-model="form.last_name"/>
                                    <div class="text-red-600" v-if="form.errors.last_name">{{ form.errors.last_name }}</div>

                                    <label class="font-semibold text-sm text-gray-600  block" for="first_name">Firstname</label>
                                    <input type="text" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full text-gray-600 " v-model="form.first_name"/>
                                    <div class="text-red-600" v-if="form.errors.first_name">{{ form.errors.first_name }}</div>

                                    <label class="font-semibold text-sm text-gray-600  block" for="address">Address</label>
                                    <input type="text" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full text-gray-600 " v-model="form.address" />
                                    <div class="text-red-600" v-if="form.errors.address">{{ form.errors.address }}</div>

                                    <label class="font-semibold text-sm text-gray-600  block" for="phone">Phone number</label>
                                    <input type="number" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full text-gray-600 " v-model="form.phone" />
                                    <div class="text-red-600" v-if="form.errors.phone">{{ form.errors.phone }}</div>

                                    <label class="font-semibold text-sm text-gray-600  block" for="level" >Level</label>
                                    <input type="number" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full text-gray-600 " v-model="form.level" />
                                    <div class="text-red-600" v-if="form.errors.level">{{ form.errors.level }}</div>

                                    <label class="font-semibold text-sm text-gray-600  block" for="pic" >Client Photo</label>
                                    <input type="file" @input="form.pic = $event.target.files[0]" class="h-full border-gray-800 rounded text-center text-gray-600 "    accept="image/jpeg" />
                                    <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                                        {{ form.progress.percentage }}%
                                    </progress>

                                  </div>
                                  <button class="px-4 py-2 mt-2 bg-blue-400 w-full rounded border border-blue-600 shadow hover:bg-blue-500">
                                    Update Client
                                </button>
                            </div>


                        </form>

                    </div>
                </div>
            </div>
        </div>
    </SideBarLayout>


</template>
