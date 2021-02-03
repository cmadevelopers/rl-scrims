import Vue from "vue";
import { BootstrapVue, BootstrapVueIcons } from 'bootstrap-vue'
import App from "./App.vue";
import router from "./router";
import axios from 'axios'
import VueSession from 'vue-session'
import Argon from "./plugins/argon-kit";
import './registerServiceWorker'

Vue.use(BootstrapVue)
Vue.use(BootstrapVueIcons)
Vue.use(VueSession)
Vue.use(Argon);

Vue.prototype.$axios = axios
Vue.config.productionTip = false;

new Vue({
  router,
  render: h => h(App)
}).$mount("#app");
