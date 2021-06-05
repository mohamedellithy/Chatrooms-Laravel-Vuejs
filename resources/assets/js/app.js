/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.Event = new Vue();
window.$ = require('jquery');

// main.js
Vue.prototype.$userId = document.querySelector("meta[name='user-id']").getAttribute('content');
Vue.prototype.$activeUser = [];


import router from './router';
import filter from './filter';
import VueProgressBar from 'vue-progressbar';
Vue.use(VueProgressBar, {
    color: '#3f51b5',
    failedColor: 'red',
    height: '2px'
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('chat-room', require('./components/chatroom/ChatRoom.vue'));
Vue.component('previouse-messages', require('./components/chatroom/PreviouseMessages.vue'));
Vue.component('previtem-message', require('./components/chatroom/PrevitemMessage.vue'));
Vue.component('messages', require('./components/chatroom/Messages.vue'));
Vue.component('message', require('./components/chatroom/message.vue'));
Vue.component('tasks-support', require('./components/chatroom/TasksSupport.vue'));
Vue.component('form-sendmessage', require('./components/chatroom/FormSendmessage.vue'));

const app = new Vue({
    el: '#app',
    router,
    filter,

});