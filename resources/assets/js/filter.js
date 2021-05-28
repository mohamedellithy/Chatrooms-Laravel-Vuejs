window.Vue = require('vue');
Vue.filter('capitalize', function(value, length) {
    if (!value) return ''
    value = value.toString();
    return value.substring(0, length) + ' .. ';
});