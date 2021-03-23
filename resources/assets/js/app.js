import Vue from 'vue'
import axios from 'axios'


//main Page
import App from '../js/views/App.vue'

Vue.config.productionTip = false;

Vue.prototype.$api = axios.create({
    baseURL: 'http://localhost:8000/api/'
  })

const app = new Vue({
  el: '#app',
  components: { App },
  render: h => h(App)
});




