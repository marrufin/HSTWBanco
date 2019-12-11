/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueNoty from 'vuejs-noty'
import { ClientTable } from 'vue-tables-2'
import VeeValidate, { Validator } from 'vee-validate'
import es from 'vee-validate/dist/locale/es.js'
import Loading from 'vue-loading-overlay'
import 'vue-loading-overlay/dist/vue-loading.css'
import vSelect from 'vue-select'
import { Settings } from './objects/settings.js'
import VueTheMask from 'vue-the-mask'

window.Vue.use(VueNoty, {
    timeout: 3500,
    progressBar: true,
    layout: 'bottomRight'
})

window.Vue.use(VueTheMask)

window.Vue.use(ClientTable, {
    texts: Settings.texts
}, false, 'bootstrap3', 'default')

Validator.localize('es', es)
Validator.localize(Settings.dictionary)
window.Vue.use(VeeValidate, {
    locale: 'es'
})

window.Vue.use(Loading)
    /**
     * The following block of code may be used to automatically register your
     * Vue components. It will recursively scan this directory for the Vue
     * components and automatically register them with their "basename".
     *
     * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
     */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('dashboard-component', require('./components/DashboardComponent.vue').default);
Vue.component('cliente-component', require('./components/ClienteComponent.vue').default);
Vue.component('modal-cliente-component', require('./components/Modals/ModalCliente.vue').default);
Vue.component('tarjeta-component', require('./components/TarjetaComponent.vue').default)
Vue.component('prestamo-component', require('./components/PrestamoComponent.vue').default);
Vue.component('cobranza-component', require('./components/CobranzaComponent.vue').default);
Vue.component('asignarprestamos-component', require('./components/AsignarPrestamos.vue').default);
Vue.component('modal-asigprestamo-component', require('./components/Modals/ModalAsigPrestamo.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});