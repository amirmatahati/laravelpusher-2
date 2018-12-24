require('./bootstrap');
require('axios');

window.Vue = require('vue');
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('example', require('./components/Example.vue').default);
Vue.component('updates', require('./components/Updates.vue').default);
Vue.component('suggestions', require('./components/Suggestions.vue').default);
Vue.component('onlinelist', require('./components/OnlineList.vue').default);

const app = new Vue({
    el: '#app'
});