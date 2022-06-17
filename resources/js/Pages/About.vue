<template>
    <Head>
        <title>About</title>
        <meta type="description" content="Home information" head-key="description"> 
    </Head>
        <h1 class="text-3xl">About</h1>    
        <p> {{ about }} </p>
        
</template>

<script>
import { Head } from '@inertiajs/inertia-vue3'
export default {
 components: {
     Head
 },
 props: {
     'about': String
 }   
}
</script>