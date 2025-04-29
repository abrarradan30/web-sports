<template>
  <div class="min-h-screen flex flex-col">
    <!-- Navbar -->
    <header class="bg-[#FF6500] text-white p-4 flex items-center justify-between shadow-md relative">
      <!-- Logo / Title -->
      <h1 class="flex items-center">
        <img src="@/image/logo (2).png" alt="SportHub Logo" class="h-14 max-h-20 object-contain" />
      </h1>

      <!-- Navigation Links -->
      <nav class="hidden md:flex space-x-6 text-lg font-medium text-white relative justify-center">
        <RouterLink to="/" class="hover:text-[#1E3A8A] transition duration-300 ease-in-out">Dashboard</RouterLink>
        <RouterLink to="/berita" class="hover:text-[#1E3A8A] transition duration-300 ease-in-out">Berita</RouterLink>

        <!-- Mega Menu -->
        <div class="relative group">
          <span class="cursor-pointer hover:text-[#1E3A8A] transition duration-300 ease-in-out">
            Kategori
          </span>
         <!-- Dropdown with images -->
         <div class="fixed left-0 right-0 top-[80px] bg-[#FF6500] text-black shadow-xl opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-all duration-300 z-50">
  <div class="max-w-screen-xl mx-auto px-9 py-10 grid grid-cols-5 gap-6">



              <!-- Kategori 1 -->
              <RouterLink to="/kategori/anggar" class="block text-center group hover:scale-105 transition">
                <img src="@/image/anggar.jpg" alt="Anggar" class="w-full h-28 object-cover rounded-md mb-2 shadow-md" />
                <span class="font-semibold text-sm">Anggar</span>
              </RouterLink>
              <!-- Kategori 2 -->
              <RouterLink to="/kategori/handball" class="block text-center group hover:scale-105 transition">
                <img src="@/image/handball.jpg" alt="Handball" class="w-full h-28 object-cover rounded-md mb-2 shadow-md" />
                <span class="font-semibold text-sm">Handball</span>
              </RouterLink>
              <!-- Kategori 3 -->
              <RouterLink to="/kategori/baseball" class="block text-center group hover:scale-105 transition">
                <img src="@/image/baseball.jpg" alt="Baseball" class="w-full h-28 object-cover rounded-md mb-2 shadow-md" />
                <span class="font-semibold text-sm">Baseball</span>
              </RouterLink>
              <!-- Kategori 4 -->
              <RouterLink to="/kategori/angkat-besi" class="block text-center group hover:scale-105 transition">
                <img src="@/image/angkatbesi.jpg" alt="Angkat Besi" class="w-full h-28 object-cover rounded-md mb-2 shadow-md" />
                <span class="font-semibold text-sm">Angkat Besi</span>
              </RouterLink>
              <!-- Kategori 5 -->
              <RouterLink to="/kategori/sumo" class="block text-center group hover:scale-105 transition">
                <img src="@/image/sumo.jpg" alt="Sumo" class="w-full h-28 object-cover rounded-md mb-2 shadow-md" />
                <span class="font-semibold text-sm">Sumo</span>
              </RouterLink>
            </div>
          </div>
        </div>

        <RouterLink to="/product" class="hover:text-[#1E3A8A] transition duration-300 ease-in-out">Product</RouterLink>
        <RouterLink to="/galeri" class="hover:text-[#1E3A8A] transition duration-300 ease-in-out">Galeri</RouterLink>
        <RouterLink to="/contact" class="hover:text-[#1E3A8A] transition duration-300 ease-in-out">Contact</RouterLink>
      </nav>

      <!-- Tombol Logout -->
      <router-link
        to="/login"
        class="hidden md:flex items-center justify-center hover:opacity-80 transition duration-300 ease-in-out text-white text-xl"
      >
        <i class="fa-solid fa-right-to-bracket"></i>
      </router-link>

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
    <footer class="bg-[#FF6500] text-white text-center py-4">
      &copy; 2025 CMS Olahraga by Tim K2
    </footer>
  </div>
</template>

<script setup>
import { useRouter } from 'vue-router'

const router = useRouter()
</script>
