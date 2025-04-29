<script setup>
import Swal from 'sweetalert2'
import Cookies from 'js-cookie'
import { useRouter } from 'vue-router'

const router = useRouter()

const confirmLogout = () => {
  Swal.fire({
    title: 'Yakin ingin logout?',
    text: 'Kamu akan keluar dari akun ini.',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#3085d6',
    confirmButtonText: 'Logout',
    cancelButtonText: 'Batal'
  }).then((result) => {
    if (result.isConfirmed) {
      Cookies.remove('token')
      router.push('/') // Ganti dengan rute login jika perlu
    }
  })
}

</script>
<template>
  <div class="min-h-screen flex flex-col">
    <!-- Navbar -->
    <header class="bg-[#4B70F5] text-white p-4 flex justify-between items-center shadow-md">
      <!-- Logo / Title -->
      <h1 class="text-2xl font-bold tracking-wide">CMS Olahraga</h1>

      <!-- Navigation Links -->
      <nav class="hidden md:flex space-x-6 text-lg font-medium">
        <RouterLink to="/Admin" class="hover:text-[#6D8FF9] transition duration-300 ease-in-out">Dashboard</RouterLink>
        <RouterLink to="/adminberita" class="hover:text-[#6D8FF9] transition duration-300 ease-in-out">Berita</RouterLink>
        <RouterLink to="/adminkategori" class="hover:text-[#6D8FF9] transition duration-300 ease-in-out">Kategori</RouterLink>
        <RouterLink to="/adminproduct" class="hover:text-[#6D8FF9] transition duration-300 ease-in-out">Product</RouterLink>
        <RouterLink to="/admingaleri" class="hover:text-[#6D8FF9] transition duration-300 ease-in-out">Galeri</RouterLink>
        <RouterLink to="/admincontact" class="hover:text-[#6D8FF9] transition duration-300 ease-in-out">Contact</RouterLink>

        <!-- Logout Button with Confirm -->
        <router-link
          to=""
          @click.prevent="confirmLogout"
          class="flex items-center justify-center hover:text-[#6D8FF9] transition duration-300 ease-in-out text-white text-xl"
        >
          <i class="fa-solid fa-right-to-bracket"></i>
        </router-link>
      </nav>

      <!-- Mobile Menu Button -->
      <button class="md:hidden text-white focus:outline-none">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
             viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round"
                stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
        </svg>
      </button>
    </header>

    <!-- Main Content -->
    <main class="flex-grow bg-gray-100 p-6">
      <RouterView />
    </main>

    <!-- Footer -->
    <footer class="bg-[#4B70F5] text-white text-center py-4">
      &copy; 2025 CMS Olahraga by Tim K2
    </footer>
  </div>
</template>


