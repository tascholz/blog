import { createApp, h } from 'vue'
import { createInertiaApp, Link } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'
import { Inertia } from '@inertiajs/inertia'
import Layout from "./Shared/Layout"

/* import the fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core'
/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

createInertiaApp({
  resolve: async name => {
    let page = (await import(`./Pages/${name}`)).default;
    
    if (page.layout == undefined) {
      page.layout = Layout
    }

    return page;
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .component('Link', Link)
      .component('font-awesome-icon', FontAwesomeIcon)
      .mount(el)
  },
})

InertiaProgress.init({
    showSpinner: true
})