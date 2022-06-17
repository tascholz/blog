<template>  
    <Head>
        <title>My App</title>
        <meta type="description" content="Information about my app" head-key="description">
    </Head>
    <Nav />
   
    <section class="p-6">
        <div class="max-w-screen-xl mx-auto">
            <slot />
        </div>

    </section>
    
</template>

<script>
import Nav from './Nav'
import { Head } from '@inertiajs/inertia-vue3'

export default {
    components: {
        Nav, Head
    },
    computed: {
        username() {
            return this.$page.props.auth.user.username
        }
    }
}
</script>