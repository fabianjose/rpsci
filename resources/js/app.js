/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

// window.baseUrl+ 'http://127.0.0.1:8000';

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('companies-gestion', require('./components/companies/gestion/CompaniesGestion.vue').default);

Vue.component('personal-fab', require('./components/items/personalFab.vue').default);

Vue.component('company-creation', require('./components/companies/creation/CreationForm.vue').default);

Vue.component('company-update', require('./components/companies/update/updateForm.vue').default);

Vue.component('company', require('./components/items/companies/company.vue').default);

Vue.component('detailed-company', require('./components/items/companies/detailedCompany.vue').default);

Vue.component('c-modal', require('./components/items/modal/modal.vue').default);

Vue.component('banners-gestion', require('./components/companies/gestion/BannersGestion.vue').default);
Vue.component('company-highlight', require('./components/companies/creation/HighlightForm.vue').default);


// Ofertas
Vue.component('offers-gestion', require('./components/offers/gestion/OffersGestion.vue').default);
Vue.component('offer-creation', require('./components/offers/creation/CreationForm.vue').default);
Vue.component('offer', require('./components/items/offers/offer.vue').default);
Vue.component('offer-details', require('./components/items/offers/detailedOffer.vue').default);
Vue.component('offer-update', require('./components/offers/update/updateForm.vue').default);

// Servicios
Vue.component('service-creation', require("./components/services/creation/creationForm.vue").default);
Vue.component('service-gestion', require("./components/services/gestion/gestion.vue").default);
Vue.component('service', require('./components/items/services/service.vue').default);
Vue.component('service-details', require('./components/items/services/detailedService.vue').default);
Vue.component('service-update', require('./components/services/update/updateForm.vue').default);

Vue.component('plans-creation', require("./components/plans/creation/creationForm.vue").default);
Vue.component('plans-gestion', require("./components/plans/gestion/plansGestion.vue").default);

Vue.component('zone-select', require('./components/items/zone/zoneSelect.vue').default);

//Vue.component('plans', require('./components/items/plans/plans.vue').default);
//Vue.component('plans-details', require('./components/items/services/detailedService.vue').default);
//Vue.component('plans-update', require('./components/services/update/updateForm.vue').default);


import AutocompleteVue from 'autocomplete-vue';
Vue.component('autocomplete-vue', AutocompleteVue);

import DateTimePicker from 'vuejs-datetimepicker';
Vue.component('datetimepicker', DateTimePicker)

import VueResource from 'vue-resource';
Vue.use(VueResource);

import Loading from 'vue-loading-overlay';
// Import stylesheet
import 'vue-loading-overlay/dist/vue-loading.css';
// Init plugin
Vue.use(Loading,{
    loader:"spinner",
    color:"#20adf4",
    isFullPage:true,
    height:170,
    width:170,
    backgroundColor:"#13293d",
    opacity: 0.08,
});

/**

 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    components:{
        /** */
    }
});
