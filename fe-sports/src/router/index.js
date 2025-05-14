import { createRouter, createWebHistory } from 'vue-router'
import axios from 'axios'
import Cookies from 'js-cookie'

//import admin disini
import DefaultLayout from '@/views/admin/layouts/DefaultLayout.vue'
import Admin from '@/views/admin/Admin.vue'
import Login from '@/views/admin/layouts/Login.vue'
import BeritaAdmin from '@/views/admin/BeritaAdmin.vue'
import ReviewAdmin from '@/views/admin/ReviewAdmin.vue'
import AnggarAdmin from '@/views/admin/AnggarAdmin.vue'
import HandballAdmin from '@/views/admin/HandballAdmin.vue'
import BaseballAdmin from '@/views/admin/BaseballAdmin.vue'
import AngkatbesiAdmin from '@/views/admin/AngkatbesiAdmin.vue'
import SumoAdmin from '@/views/admin/SumoAdmin.vue'


//import guest disini
import GuestLayout from '@/views/layouts/GuestLayout.vue'
import Dashboard from '@/views/Dashboard.vue'
import Berita from '@/views/Berita.vue'
import Product from '@/views/Product.vue'
import Galeri from '@/views/Galeri.vue'
import Review from '@/views/Review.vue'
import Anggar from '@/views/Anggar.vue'
import Handball from '@/views/Handball.vue'
import Baseball from '@/views/Baseball.vue'
import Angkatbesi from '@/views/Angkatbesi.vue'
import Sumo from '@/views/Sumo.vue'

const routes = [
  // Guest
  {
    path: '/',
    component: GuestLayout,
    children: [
      
      {
        path: '',
        name: 'Dashboard',
        component: Dashboard,
      },
      {
        path: '/berita',
        name: 'Berita',
        component: Berita,
      },
      {
        path: '/product',
        name: 'Product',
        component: Product,
      },
      {
        path: '/galeri',
        name: 'Galeri',
        component: Galeri,
      },
      {
        path: '/review',
        name: 'Review',
        component: Review,
      },
      {
        path: '/anggar',
        name: 'Anggar',
        component: Anggar,
      },
      {
        path: '/handball',
        name: 'Handball',
        component: Handball,
      },
      {
        path: '/baseball',
        name: 'Baseball',
        component: Baseball,
      },
      {
        path: '/angkatbesi',
        name: 'Angkatbesi',
        component: Angkatbesi,
      },
      {
        path: '/sumo',
        name: 'Sumo',
        component: Sumo,
      },
    ],
  },
  {
    path: '/login',
    name: 'Login',
    component: Login,
  },
  // Admin
  {
    path: '/admin',
    component: DefaultLayout,
    children: [
      {
        path: '',
        name: 'Admin',
        component: Admin,
        meta: { requiresAuth: true },
      },
      {
        path: '/adminberita',
        name: 'BeritaAdmin',
        component: BeritaAdmin,
        meta: { requiresAuth: true },
      },
      {
        path: '/adminreview',
        name: 'ReviewAdmin',
        component: ReviewAdmin,
        meta: { requiresAuth: true },
      },
        {
          path: '/adminanggar',
          name: 'AnggarAdmin',
          component: AnggarAdmin,
          meta: { requiresAuth: true },
        },
        {
          path: '/adminhandball',
          name: 'HandballAdmin',
          component: HandballAdmin,
          meta: { requiresAuth: true },
        },
        {
          path: '/adminbaseball',
          name: 'BaseballAdmin',
          component: BaseballAdmin,
          meta: { requiresAuth: true },
        },
        {
          path: '/adminangkatbesi',
          name: 'AngkatbesiAdmin',
          component: AngkatbesiAdmin,
          meta: { requiresAuth: true },
        },
        {
          path: '/adminsumo',
          name: 'SumoAdmin',
          component: SumoAdmin,
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
        next({ name: 'Admin' })
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
      next({ name: 'Admin' })
    } else {
      next()
    }
  }
})

export default router
