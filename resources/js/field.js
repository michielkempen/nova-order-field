Nova.booting((Vue, router) => {
    Vue.component('index-order-field', require('./components/IndexField'));
    Vue.component('detail-order-field', require('./components/DetailField'));
    Vue.component('form-order-field', require('./components/FormField'));
})
