window.Vue = require('vue');
Vue.filter('capitalize', function(value, length) {
    if (!value) return ''
    value = value.toString();
    return value.substring(0, length) + ' .. ';
});

Vue.filter('FetchNames', function(value) {
    if (!value) return '';
    let names = '';
    value.forEach(function(user, key) {
        names += user.name + ' / ';
    });

    return names;
});


Vue.filter('FetchMessage', function(value) {
    if (!value) return '';
    let Lastmessage = '';
    value.forEach(function(message, key) {
        Lastmessage = message.message;
    });

    return Lastmessage;
});