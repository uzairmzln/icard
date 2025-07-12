import './bootstrap';
import { createApp } from 'vue';
// import App from './components/App.vue';
import Login from './components/pages/auth.vue';
import router from './router';

// createApp(App).mount('#app');

const login = createApp(Login);
login.use(router);
login.mount('#login');