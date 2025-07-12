import { createRouter, createWebHistory } from 'vue-router'
import Login from '../components/element/loginForm.vue'
import Register from '../components/element/registerForm.vue'

const routes = [
  {
    path: '/login',
    name: 'login',
    component: Login,
  },
  {
    path: '/register',
    name: 'register',
    component: Register,
  },
]

const router = createRouter({
  history: createWebHistory(),
  routes,
})

export default router