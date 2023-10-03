<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import SideBarLayout from '@/Layouts/SideBarLayout.vue';

const props = defineProps({
    products:Object
})

const form = useForm({
    name:props.products.name,
    qty:props.products.qty,
    price:props.products.price,
})

function submit (){
    form.put('/products/'+props.products.id)
}
</script>

<template>
      <Head title="Edit Product" />

    <SideBarLayout>
        <template #header>
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Product</h2>
            </div>
        </template>
        <div class="py-6">
            <div class="flex flex-col justify-center items-center">
                <div class="relative flex flex-col items-center rounded-[20px] w-[500px] max-w-[95%] mx-auto bg-white bg-clip-border shadow-3xl shadow-shadow-500 dark:!bg-navy-800 dark:text-white dark:!shadow-none p-3">
                    <div class="mt-2 mb-8 w-full">
                        <form @submit.prevent="submit" class="flex">
                            <div class="flex-1 pr-4">
                                <h4 class="px-2 text-xl font-bold text-navy-700 dark:text-black">
                                    Product Details
                                </h4>
                                <div class="px-5 py-5">
                                    <label class="font-semibold text-sm text-gray-600  block" for="name">Name</label>
                                    <input type="text" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full text-gray-600 " v-model="form.name"/>
                                    <div class="text-red-600" v-if="form.errors.name">{{ form.errors.name }}</div>

                                    <label class="font-semibold text-sm text-gray-600  block" for="qty">Quantity</label>
                                    <input type="number" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full text-gray-600 " v-model="form.qty" />
                                    <div class="text-red-600" v-if="form.errors.qty">{{ form.errors.qty }}</div>

                                    <label class="font-semibold text-sm text-gray-600  block" for="price">Price</label>
                                    <input type="decimal" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full text-gray-600 " v-model="form.price" />
                                    <div class="text-red-600" v-if="form.errors.price">{{ form.errors.price }}</div>

                                  </div>
                                  <button class="px-4 py-2 mt-2 bg-blue-400 w-full rounded border border-blue-600 shadow hover:bg-blue-500">
                                    Update Product
                                </button>
                            </div>


                        </form>

                    </div>
                </div>
            </div>
        </div>
    </SideBarLayout>


</template>
