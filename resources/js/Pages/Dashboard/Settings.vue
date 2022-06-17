<template>
  <DashLayout>
      <div>
        <form @submit.prevent="submitQuote">
          <div>
                <label for="quote" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Quote</label>
                <textarea v-model="quote" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Content..."></textarea>
                <button type="submit">Save</button>
            </div>
        </form>

        <form @submit.prevent="submitAbout">
          <div>
                <label for="about" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">About</label>
                <textarea v-model="about" rows="20" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Content..."></textarea>
                <button type="submit">Save</button>
            </div>
        </form>

      </div>
  </DashLayout>
  
</template>



<script>
    import DashLayout from "./DashLayout.vue"
    import axios from 'axios'
    export default {
      components: {
        DashLayout
      },

      props: {
        about: String,
        quote: String
      },


      methods: {
        
        submitQuote() {
          let formData = new FormData()
          formData.append('text', this.quote)

          axios({
            method: "post",
            data: formData,
            url: "/settings/quote",
          })
          .then(function (response) {
            console.log(response);
          })
          .catch(function (response) {
            console.log(response)
          })
        },

        submitAbout() {
          let formData = new FormData()
          formData.append('text', this.about)

          axios({
            method: "post",
            data: formData,
            url: "/settings/about",
          })
          .then(function (response) {
            console.log(response);
          })
          .catch(function (response) {
            console.log(response)
          })
        }
      }
    }
    
</script>