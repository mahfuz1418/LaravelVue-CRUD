import './bootstrap';
import { createApp } from 'vue';
import App from './Layouts/App.vue';
import router from './router';

const app = createApp(App).use(router).mount('#app');
