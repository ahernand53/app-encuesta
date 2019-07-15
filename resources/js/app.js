
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('materialize-stepper/dist/js/mstepper.min');
require('materialize-css/dist/js/materialize');
require('jquery/dist/jquery.min');
require('datatables.net-dt/js/dataTables.dataTables.min');

window.Vue = require('vue');

import BootstrapVue from 'bootstrap-vue'
Vue.use(BootstrapVue);

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

import StagesListComponent from './components/Admins/Polls/StagesListComponent.vue'
import StepperComponent from './components/Admins/Polls/Stepper/StepperComponent.vue'

const app = new Vue({
    el: '#app',
    components: {
        'stages-list-component': StagesListComponent,
        'stepper-component': StepperComponent
    }
});
