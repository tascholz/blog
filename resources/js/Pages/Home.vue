<template>
    <Head>
        <title>Home</title>
        <meta type="description" content="Home information" head-key="description"> 
    </Head>
        <h1 class="text-3xl italic"> " {{ quote.text }} "</h1>    

        <List v-bind:posts="posts"></List>
        
</template>

<script>
import { Head } from '@inertiajs/inertia-vue3'
import  List  from './Posts/List'
export default {
 components: {
     Head,
     List
 },
 props: {
     'posts': Object,
     'quote': String,
     'images': Object
 }   
}
</script>