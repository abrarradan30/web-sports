<script setup>
import { useRouter } from 'vue-router'

const router = useRouter()
</script>

<template>
  <div class="min-h-screen flex flex-col">
    <!-- Navbar -->
    <header class="bg-[#FFA500] text-white p-4 flex justify-between items-center shadow-md">
      <!-- Logo / Title -->
      <h1 class="text-2xl font-bold tracking-wide flex items-center gap-2">
  <i class="fas fa-trophy"></i>
  SportHub
</h1>


 <!-- Navigation Links -->
<nav class="hidden md:flex space-x-6 text-lg font-medium text-white">
  <RouterLink to="/" class="hover:text-[#1E3A8A] transition duration-300 ease-in-out">Dashboard</RouterLink>
  <RouterLink to="/berita" class="hover:text-[#1E3A8A] transition duration-300 ease-in-out">Berita</RouterLink>
  <RouterLink to="/kategori" class="hover:text-[#1E3A8A] transition duration-300 ease-in-out">Kategori</RouterLink>
  <RouterLink to="/product" class="hover:text-[#1E3A8A] transition duration-300 ease-in-out">Product</RouterLink>
  <RouterLink to="/galeri" class="hover:text-[#1E3A8A] transition duration-300 ease-in-out">Galeri</RouterLink>
  <RouterLink to="/contact" class="hover:text-[#1E3A8A] transition duration-300 ease-in-out">Contact</RouterLink>

  <!-- Tombol Logout -->
  <router-link
    to="/login"
    class="flex items-center justify-center hover:opacity-80 transition duration-300 ease-in-out text-white text-xl"
  >
    <i class="fa-solid fa-right-to-bracket"></i>
  </router-link>
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
    <footer class="bg-[#FFA500] text-white text-center py-4">
      &copy; 2025 CMS Olahraga by Tim K2
    </footer>
  </div>
</template>
