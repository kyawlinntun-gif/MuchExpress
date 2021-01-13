/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

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

Vue.component('menu-container', require('./Modules/Menu/MenuContainer.vue').default);
Vue.component('card-component', require('./components/Card.vue').default);
Vue.component('resto-group', require('./Modules/restos/RestoGroup.vue').default);

// Vuejs Modal
import VModal from 'vue-js-modal';
Vue.use(VModal);

// Vuejs Turbolinks
import Turbolinks from 'turbolinks';
Turbolinks.start();

import TurbolinksAdapter from 'vue-turbolinks';
Vue.use(TurbolinksAdapter);

document.addEventListener('turbolinks:load', () => {
    const element = document.getElementById("app");

    if(element != null)
    {
        const app = new Vue({
            el: element,
        });
    }
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
// });
