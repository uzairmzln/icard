import './bootstrap';
import { createApp } from 'vue';
import App from './app.vue';
import router from './router';
import axios from 'axios';

import PrimeVue from 'primevue/config';
import Aura from '@primeuix/themes/aura';
import 'primeicons/primeicons.css'

axios.defaults.withCredentials = true;
axios.defaults.baseURL = 'http://icard.test/api';

const app = createApp(App);

app.use(router);
app.use(PrimeVue, {
    theme: {
        preset: Aura,
        options: {
            darkModeSelector: false || 'none',
        }
    },
});

app.mount('#app');
