require('./bootstrap');
import Vue from 'vue'
import BootstrapVue from 'bootstrap-vue'
require('axios');

window.Vue = require('vue');
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('example', require('./components/Example.vue').default);
Vue.component('updates', require('./components/Updates.vue').default);
Vue.component('suggestions', require('./components/Suggestions.vue').default);
Vue.component('onlinelist', require('./components/OnlineList.vue').default);
Vue.component('comments', require('./components/Comment.vue').default);

Vue.use(BootstrapVue);

const app = new Vue({
    el: '#app'
});