
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window.$ = window.jQuery = require('jquery');
require('./bootstrap');


//require('.custom.js'); 
window.Vue = require('vue');
Vue.component('custom', require('./custom.js'));

const app = new Vue({
    el: '#app'
});

//console.log($('body'));
