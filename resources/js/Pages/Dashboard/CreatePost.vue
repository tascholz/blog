<template>
  <DashLayout>
      <div>
        <form @submit.prevent="submit">
            <div class="mb-6">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Title</label>
                <input type="text" v-model="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Posttitle" required>
            </div>

            <div>
                <label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Content</label>
                <textarea v-model="content" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Content..."></textarea>
            </div>



            <!--File Upload -->
            <div class="flex flex-wrap flex-row">
                
                <div v-for="file in fileList" :key="file.name">
                    <img class="h-64 w-auto p-4 m-2 bg-white rounded wrap" :src="file.url">
                </div>
                
                
            </div>
            

            <input id="inputFile" type="file" @change="previewFiles">
            <button type="button" @click="selectFile" class=" mt-3 relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-red-300 to-red-200 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-red-100 dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                    Add new Photo
                </span>
            </button>             

            <!-- EndOf File Upload -->

            <button type="submit" class=" mt-3 relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-red-300 to-red-200 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-red-100 dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                    Create new Post
                </span>
            </button>
      </form>
      </div>
      
  </DashLayout>
  
</template>

<style scoped>
    #inputFile {
        display: block;
        visibility: hidden;
        width: 0;
        height: 0;
    }
</style>

<script>
    import DashLayout from './DashLayout'
    import { useForm } from '@inertiajs/inertia-vue3'
    import axios from 'axios'
    export default {
        components: {
            DashLayout,
            useForm
        },

        data () {
            return {
                title: '',
                content: '',
                fileList : []
            }
        },
        setup() {
            const form = useForm({
                title: '',
                content: ''
            })
        },

        methods: {
            selectFile() {
                document.getElementById('inputFile').click();
            },
            previewFiles(e) {
                console.log(e.target.files[0]);
                var file = {url: URL.createObjectURL(e.target.files[0]), file: e.target.files[0]}
                this.fileList.push(file);
            },

            submit() {
                let formData = new FormData()
                formData.append('title', this.title);
                formData.append('content', this.content)
                this.fileList.forEach(function (item, index) {
                    formData.append(`images[${index}]`, item.file)
                });

                axios({
                    method: "post",
                    url: "/posts",
                    data: formData,
                    headers: { "Content-Type": "multipart/form-data" },
                    })
                    .then(function (response) {
                        //handle success
                        console.log(response);
                    })
                    .catch(function (response) {
                        //handle error
                        console.log(response);
                    });
                },

            
        }
    
    }
</script>


