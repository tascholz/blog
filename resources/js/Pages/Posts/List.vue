<template>
    <div>
        <ListItem v-for="post in posts" :key="post.id" v-bind:post="post"> {{ post.title }}</ListItem>
    </div>
</template>



<script setup>
    import Pagination from '../../Shared/Pagination';
    import { ref, watch} from 'vue';
    import { Inertia } from '@inertiajs/inertia';
    import ListItem from './ListItem.vue'
defineProps({
    posts: Object
}) 

</script>
