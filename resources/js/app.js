/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import moment from 'moment';

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('article-list-item', require('./components/ArticleListItemComponent.vue').default);
Vue.component('article-list', require('./components/ArticleListComponent.vue').default);
Vue.component('article-view', require('./components/ArticleComponent.vue').default);
Vue.component('admin-article-table', require('./components/AdminArticleTableComponent.vue').default);
Vue.component('admin-article-table-item', require('./components/AdminArticleTableItemComponent.vue').default);

Vue.filter('formatDate', function(value) {
    if (value) {
        return moment(String(value)).format('Do MMM YYYY')
    }
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data: {
    	articles: []
    },
    created() {
    	console.log("Vue App created");
    }
});