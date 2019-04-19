import Vue from 'vue'

import "bulma/css/bulma.min.css";
import "@fortawesome/fontawesome-free/css/all.min.css";

Vue.filter('truncate', function (string, length = 150) {
    if (!string) return ''
    string = string.toString()
    return _.truncate(string, { length })
});

const app = new Vue({
    el: '#app',
});
