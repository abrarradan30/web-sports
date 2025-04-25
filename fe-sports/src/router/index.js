import { createRouter, createWebHistory } from 'vue-router'
import axios from 'axios'

import DefaultLayout from '@/views/layouts/DefaultLayout.vue'
import GuestLayout from '@/views/layouts/GuestLayout.vue'
import Dashboard from '@/views/Dashboard.vue'
import HomeView from '@/views/HomeView.vue'
import Login from '@/views/Login.vue'
import Cookies from 'js-cookie'

const routes = [
  {
    path: '/',
    component: DefaultLayout,
    children: [
      {
        path: '',
        name: 'Dashboard',
        component: Dashboard,
        meta: { requiresAuth: true },
      },
    ],
  },
  {
    path: '/login',
    component: GuestLayout,
    children: [
      {
        path: '',
        name: 'Login',
        component: Login,
      },
    ],
  },
  {
    path: '/Home',
    component: DefaultLayout,
    children: [
      {
        path: '',
        name: 'Home',
        component: HomeView,
        meta: { requiresAuth: true },
      },
    ],
  },
]

const router = createRouter({
  history: createWebHistory(),
  routes,
})

router.beforeEach(async (to, from, next) => {
  const checkByAPI = false // mau menggunakan pengecekan me atau tidak

  if (checkByAPI) {
    // === OPSI 1: Cek user by api biasanya /me ===
    try {
      const res = await axios.get('/api/me', { withCredentials: true })
      const isAuthenticated = !!res.data.user

      if (to.meta.requiresAuth && !isAuthenticated) {
        next({ name: 'Login' })
      } else if (to.name === 'Login' && isAuthenticated) {
        next({ name: 'Dashboard' })
      } else {
        next()
      }
    } catch (error) {
      if (to.meta.requiresAuth) next({ name: 'Login' })
      else next()
    }
  } else {
    // === OPSI 2: Cek dari session/cookie langsung ===
    const token = Cookies.get('token')
    const isAuthenticated = !!token

    if (to.meta.requiresAuth && !isAuthenticated) {
      next({ name: 'Login' })
    } else if (to.name === 'Login' && isAuthenticated) {
      next({ name: 'Dashboard' })
    } else {
      next()
    }
  }
})

export default router
