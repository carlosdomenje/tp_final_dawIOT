/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import VueMqtt from 'vue-mqtt';
import MqttComponent from './components/MqttComponent.vue';
import SubsComponent from './components/MqttSubscriber.vue';
import LineCharts from './components/ChartComponent.vue';
import GaugeChart from './components/GaugeComponent.vue';
import StatusComponent from './components/StatusComponent.vue';

window.Vue = require('vue');



/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.use(VueMqtt, 'ws://localhost:1884', { clientId: 'WebClient-' + parseInt(Math.random() * 100000) });
Vue.config.productionTip = false;
Vue.config.productionTip = false;
Vue.component('mqtt-component', MqttComponent);
Vue.component('subs-component', SubsComponent);
Vue.component('line-chart', LineCharts);
Vue.component('gauge-chart', GaugeChart);
Vue.component('status-component', StatusComponent);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',

});