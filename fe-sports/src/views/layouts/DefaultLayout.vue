<script setup>
import Swal from 'sweetalert2'
import Cookies from 'js-cookie'
import { useRouter } from 'vue-router'

const router = useRouter()

function handleLogout() {
  Swal.fire({
    title: 'Yakin ingin logout?',
    text: "Kamu akan keluar dari akun ini.",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#3085d6',
    confirmButtonText: 'Logout',
    cancelButtonText: 'Batal'
  }).then((result) => {
    if (result.isConfirmed) {
      Cookies.remove('token')
      router.push('/login')
    }
  })
}
</script>



<template>
    <div class="min-h-screen flex flex-col">
    <!-- Navbar -->
    <header class="bg-gray-200 text-gray-800 p-4 flex justify-between items-center shadow-md">
  <!-- Logo / Title -->
  <h1 class="text-2xl font-bold tracking-wide">CMS Olahraga</h1>

  <!-- Navigation Links -->
  <nav class="hidden md:flex space-x-6 text-lg font-medium">
    <RouterLink to="/" class="hover:text-blue-500 transition duration-300 ease-in-out">Dashboard</RouterLink>
    <RouterLink to="/Home" class="hover:text-blue-500 transition duration-300 ease-in-out">Berita</RouterLink>
    <RouterLink to="" class="hover:text-blue-500 transition duration-300 ease-in-out">Kategori</RouterLink>
    <RouterLink to="" class="hover:text-blue-500 transition duration-300 ease-in-out">Jadwal</RouterLink>
    <RouterLink to="" class="hover:text-blue-500 transition duration-300 ease-in-out">Galeri</RouterLink>
    <RouterLink to="" class="hover:text-blue-500 transition duration-300 ease-in-out">Contact</RouterLink>
    <button
  @click="handleLogout"
  class="flex items-center hover:opacity-80 transition duration-300 ease-in-out"
>
  <img src="/logoutt.png" alt="Logout" class="w-8 h-8" />
</button>


  </nav>

  <!-- Mobile Menu Button -->
  <button class="md:hidden text-gray-800 focus:outline-none">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
    </svg>
  </button>
</header>
    
    <!-- Main Content -->
    <main class="flex-grow bg-gray-100 p-6">
      <RouterView />
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center py-4">
      &copy; 2025 CMS Olahraga by Tim K2
    </footer>
  </div>
</template>