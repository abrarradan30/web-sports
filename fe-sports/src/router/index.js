import { createRouter, createWebHistory } from 'vue-router'
import axios from 'axios'
import Cookies from 'js-cookie'

//import admin disini
import DefaultLayout from '@/views/admin/layouts/DefaultLayout.vue'
import Admin from '@/views/admin/Admin.vue'
import Login from '@/views/admin/layouts/Login.vue'
import BeritaAdmin from '@/views/admin/BeritaAdmin.vue'
import KategoriAdmin from '@/views/admin/KategoriAdmin.vue'
import ProductAdmin from '@/views/admin/ProductAdmin.vue'
import GaleriAdmin from '@/views/admin/GaleriAdmin.vue'
import ContactAdmin from '@/views/admin/ContactAdmin.vue'


//import guest disini
import GuestLayout from '@/views/layouts/GuestLayout.vue'
import Dashboard from '@/views/Dashboard.vue'
import Berita from '@/views/Berita.vue'
import Kategori from '@/views/Kategori.vue'
import Product from '@/views/Product.vue'
import Galeri from '@/views/Galeri.vue'
import Contact from '@/views/Contact.vue'

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
        path: '/kategori',
        name: 'Kategori',
        component: Kategori,
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
        path: '/contact',
        name: 'Contact',
        component: Contact,
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
        path: '/adminkategori',
        name: 'KategoriAdmin',
        component: KategoriAdmin,
        meta: { requiresAuth: true },
      },
      {
        path: '/adminproduct',
        name: 'ProductAdmin',
        component: ProductAdmin,
        meta: { requiresAuth: true },
      },
      {
        path: '/admingaleri',
        name: 'GaleriAdmin',
        component: GaleriAdmin,
        meta: { requiresAuth: true },
      },
      {
        path: '/admincontact',
        name: 'ContactAdmin',
        component: ContactAdmin,
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
