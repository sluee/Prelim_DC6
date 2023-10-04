<script setup>
    import { Link } from '@inertiajs/vue3';
    import { defineProps } from 'vue';


  defineProps({
    collapse:Boolean
  })
</script>

<template>

<div class="main-nav" :class="collapse">
    <!-- <h4 class="text-center text-white mt-3 "><span v-show="!collapse">Administrator</span></h4>
    <hr> -->
    <Link href="dashboard">
        <i class="fa fa-home"></i> <span v-show="!collapse">Dashboard</span></Link>
    <Link href="/clients" v-if="$page.props.auth.permissions.includes('manage-clients')">
        <i class="fa-solid fa-users" ></i> <span  v-show="!collapse" > Clients</span>  </Link>
    <Link href="/suppliers" v-if="$page.props.auth.permissions.includes('manage-suppliers')" >
        <i class="fa-solid fa-users" v-show="!collapse" ></i> <span  > Suppliers</span>  </Link>
    <Link href="/products" v-if="$page.props.auth.permissions.includes('manage-products')">
        <i class="fa-solid fa-users"></i> <span  v-show="!collapse"> Products</span>  </Link>

</div>

</template>
