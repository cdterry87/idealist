import Vue from 'vue'

import "bulma/css/bulma.min.css";
import "bulma-switch/dist/css/bulma-switch.min.css";
import "@fortawesome/fontawesome-free/css/all.min.css";

Vue.filter('truncate', function (string, length = 150) {
    if (!string) return ''
    string = string.toString()
    return _.truncate(string, { length })
});

import App from './components/App'

import Tabs from './utilities/Tabs';
Vue.component('tabs', Tabs);

import Tab from './utilities/Tab';
Vue.component('tab', Tab);

import Account from './components/Account';
Vue.component('account', Account);

const app = new Vue({
    el: '#app',
    components: { App },
});
