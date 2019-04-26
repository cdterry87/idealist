import Vue from 'vue'

import "bulma/css/bulma.min.css";
import "@fortawesome/fontawesome-free/css/all.min.css";

Vue.filter('truncate', function (string, length = 150) {
    if (!string) return ''
    string = string.toString()
    return _.truncate(string, { length })
});

import App from './components/App'

import Settings from './components/Settings';
Vue.component('settings', Settings);

import MyIdeas from './components/MyIdeas';
Vue.component('myideas', MyIdeas);

import Favorites from './components/Favorites';
Vue.component('favorites', Favorites);

import History from './components/History';
Vue.component('history', History);

const app = new Vue({
    el: '#app',
    components: { App },
});
