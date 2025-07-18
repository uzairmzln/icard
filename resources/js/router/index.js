// router/index.js
import { createRouter, createWebHistory } from 'vue-router';

import AuthLayout from '../components/layout/authLayout.vue';
import DashboardLayout from '../components/element/menu/sideMenu.vue';

import Login from '../components/pages/login.vue';
import Register from '../components/pages/register.vue';
import Dashboard from '../components/pages/dashboard.vue';
import CreateCard from '../components/element/form/createCardForm.vue';

const routes = [
  {
    path: '/',
    redirect: '/login'
  },
  {
    path: '/:catchAll(.*)',
    redirect: '/login'
  },
  {
    path: '/',
    component: AuthLayout,
    children: [
      {
        path: 'login',
        name: 'login',
        component: Login
      },
      {
        path: 'register',
        name: 'register',
        component: Register
      }
    ]
  },
  {
    path: '/dashboard',
    component: DashboardLayout,
    meta: { requiresAuth: true },
    children: [
      {
        path: '',
        name: 'dashboard',
        component: Dashboard
      },
      {
        path: 'create-card',
        name: 'create-card',
        component: CreateCard
      }
    ]
  },
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

router.beforeEach((to, from, next) => {
  const token = localStorage.getItem('auth_token');

  if (to.meta.requiresAuth && !token) {
    return next({ name: 'login' }); // block guests from dashboard
  }

  if ((to.name === 'login' || to.name === 'register') && token) {
    return next({ name: 'dashboard' }); // block logged-in users from login/register
  }

  next();
});

export default router