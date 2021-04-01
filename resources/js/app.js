import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
require('./bootstrap');

window.Vue = require('vue').default;

Vue.use(BootstrapVue)
Vue.use(IconsPlugin)
import router from "./router";


/**
 * MomentJS for dealing with Data and Time
 */
 import moment from 'moment';
 //import 'moment/locale/bn-bd';
 Vue.filter('formatDate', function(value) {
     if (value) {
         return moment(String(value)).format('MMMM Do YYYY, h:mm a')
     }
 })


import VueSweetalert2 from 'vue-sweetalert2';

// If you don't need the styles, do not connect
import 'sweetalert2/dist/sweetalert2.min.css';

Vue.use(VueSweetalert2);

Vue.component('mainapp', require('./mainapp.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router
});
