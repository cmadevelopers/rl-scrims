import Vue from "vue";
import App from "./App.vue";
import router from "./router";
import axios from 'axios'
import VueSession from 'vue-session'
import Argon from "./plugins/argon-kit";
import './registerServiceWorker'

Vue.use(VueSession)
Vue.prototype.$axios = axios
Vue.config.productionTip = false;
Vue.use(Argon);
new Vue({
  router,
  render: h => h(App)
}).$mount("#app");
