/**
 * Load specific Vue components made for Bootstrap
 */

Vue.component('alert', require('./components/Alert.vue'));
Vue.component('well', require('./components/Well.vue'));

Vue.component('project-showcase', require('./components/ProjectShowcase.vue'));
Vue.component('article-showcase', require('./components/Article.vue'));
Vue.component('notification', require('./components/Notification.vue'));
Vue.component('tweet', require('./components/Tweet.vue'));

require('./components/filters.vue');