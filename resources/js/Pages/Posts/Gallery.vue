<template>
       
       <Carousel>
            <template #slides>
                <Slide v-for="image in images" :key="image.id">
                    <img :src="image.post_image_path" />
                </Slide>
            </template>

            <template #addons>
                <Navigation />
                <Pagination />
            </template>
        </Carousel>
</template>

<script>
import GalleryModal from './GalleryModal'
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel'

import "vue3-carousel/dist/carousel.css";
export default {
    components: {
        GalleryModal,
        Carousel,
        Slide,
        Pagination,
        Navigation
    },
    props: {
        images: Array
    }

}
</script>