<template>
    <div>
        <h1 class="text-2xl font-bold"> {{ post.title }} </h1>
        <p> {{ post.content }} </p>
        <section class="overflow-hidden text-gray-700">
            <div class="container px-5 py-2 mx-auto lg:pt-12 lg:px-32">
                <div class="flex flex-wrap -m-1 md:-m-2">
                    <div v-for="image in images" :key="image.id" class="flex flex-wrap w-1/3">
                        <div class="w-full p-1 md:p-2">
                            <button @click="toggleGallery">
                                <img :src="image.post_image_path" class="block object-cover object-center w-full h-full rounded-lg" alt="gallery" data-bs-toggle="gallery">
                            </button>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <Gallery class="w-800" id="gallery" v-bind:images="images"></Gallery>
    </div>
</template>

<style scoped>
    #gallery {
        display: none
    }
</style>

<script>
import Gallery from './Gallery'
export default {
    components: {
        Gallery
    },
    props: {
       'post' : Object,
       'images': Array 
    },
    methods: {
        toggleGallery() {
            
            let modal = document.getElementById('gallery')
            console.log(modal.style.display)
            if (modal.style.display == 'block') {
                console.log("Toggle Gallery visible")
                modal.style.display = 'none'
            } else {
                console.log("Toggle Gallery hidden")
                modal.style.display = 'block'
            }
        }
    }
}
</script>