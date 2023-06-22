import { createApp } from 'vue';
import App from './App.vue';
import router from './router';
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap';
import './assets/style/style.css';
import axios from './plugins/axios';
import Toast from "vue-toastification";
// Import the CSS or use your own!
import "vue-toastification/dist/index.css";

const app = createApp(App);
app.use(Toast);
app.config.globalProperties.$http = axios;
app.use(router);
app.mount('#app');
