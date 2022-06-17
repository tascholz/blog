<template>
    <NavLink :href= "`/posts/${post.id}`" class="flex flex-col items-center rounded-lg m-4 bg-white rounded-lg border shadow-md md:flex-row md:max-w-screen hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
        <img class="object-cover w-full h-96 rounded-t-lg md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="https://picsum.photos/200/300" alt="">
        <div class="flex flex-col justify-between p-4 leading-normal">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"> {{ post.title }} </h5>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ post.content }}</p>
        </div>
    </NavLink>
</template>


<script>
import NavLink from '../../Shared/NavLink'
export default {
    components: {
        NavLink
    },

    props: {
        post: Object
    }
}
</script>