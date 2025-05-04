<template>
  <div class="min-h-screen flex flex-col">
    <header class="fixed w-full top-0 z-50 bg-[#f8f6f5] text-[#001233] py-3 px-6 flex items-center justify-between shadow-md">
      <!-- Logo -->
      <div class="flex items-center">
        <img src="@/image/logo (2).png" alt="Logo" class="h-10 object-contain" />
      </div>
      <!-- Navigation -->
      <nav class="hidden md:flex space-x-10 text-base font-semibold">
        <RouterLink to="/" class="hover:text-[#ff6500] transition">Dashboard</RouterLink>
        <RouterLink to="/berita" class="hover:text-[#ff6500] transition">Berita</RouterLink>
        <!-- Mega Menu -->
        <div class="relative group" @mouseover="showDropdown = true" @mouseleave="showDropdown = false">
          <span class="cursor-pointer hover:text-[#ff6500] transition duration-300 ease-in-out">
            Olahraga
          </span>
          <div 
            v-if="showDropdown" 
            class="fixed left-0 right-0 top-[50px] bg-white text-black drop-shadow-md shadow-xl opacity-100 visible transition-all duration-300 z-50">
            <div class="max-w-screen-xl mx-auto px-9 py-10 grid grid-cols-5 gap-8">
              <!-- Olahraga 1 -->
              <RouterLink to="/anggar" class="text-center hover:scale-105 transition-transform duration-300 cursor-default" @click="hideDropdown">
                <img src="@/image/anggar.jpg" alt="Anggar" class="w-full h-44 object-cover rounded-md mb-2 shadow-md" />
                <span class="font-bold text-base">Anggar</span>
              </RouterLink>
              <!-- Olahraga 2 -->
              <RouterLink to="/handball" class="text-center hover:scale-105 transition-transform duration-300 cursor-default" @click="hideDropdown">
                <img src="@/image/handball.jpg" alt="Handball" class="w-full h-44 object-cover rounded-md mb-2 shadow-md" />
                <span class="font-bold text-base">Handball</span>
              </RouterLink>
              <!-- Olahraga 3 -->
              <RouterLink to="/baseball" class="text-center hover:scale-105 transition-transform duration-300 cursor-default" @click="hideDropdown">
                <img src="@/image/baseball.jpg" alt="Baseball" class="w-full h-44 object-cover rounded-md mb-2 shadow-md" />
                <span class="font-bold text-base">Baseball</span>
              </RouterLink>
              <!-- Olahraga 4 -->
              <RouterLink to="/angkatbesi" class="text-center hover:scale-105 transition-transform duration-300 cursor-default" @click="hideDropdown">
                <img src="@/image/angkatbesi.jpg" alt="Angkat Besi" class="w-full h-44 object-cover rounded-md mb-2 shadow-md" />
                <span class="font-bold text-base">Angkat Besi</span>
              </RouterLink>
              <!-- Olahraga 5 -->
              <RouterLink to="/sumo" class="text-center hover:scale-105 transition-transform duration-300 cursor-default" @click="hideDropdown">
                <img src="@/image/sumo.jpg" alt="Sumo" class="w-full h-44 object-cover rounded-md mb-2 shadow-md" />
                <span class="font-bold text-base">Sumo</span>
              </RouterLink>
            </div>
          </div>
        </div>

        <RouterLink to="/riview" class="hover:text-[#ff6500] transition">Riview</RouterLink>
      </nav>

      <!-- Login Button -->
      <router-link to="/login" class="hidden md:flex items-center text-[#001233] text-2xl hover:opacity-80 transition">
        <i class="fa-solid fa-user-circle"></i>
      </router-link>

      <!-- Mobile Menu Icon -->
      <button class="md:hidden text-[#001233] focus:outline-none">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
        </svg>
      </button>
    </header>

    <!-- Main Content -->
    <main class="bg-gray-100 pt-16">
      <RouterView />
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-10 px-6">
      <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
        <!-- Logo & Deskripsi -->
        <div>
          <h2 class="text-2xl font-bold text-amber-400 mb-2">SportID</h2>
          <p class="text-sm text-gray-300">
            Website CMS olahraga yang mendukung event dan berita terkini dunia olahraga nasional.
          </p>
        </div>

        <!-- Navigasi Cepat -->
        <div>
          <h3 class="text-lg font-semibold text-amber-400 mb-3">Navigasi</h3>
          <ul class="space-y-2 text-sm text-gray-300">
            <li><a href="/" class="hover:text-white">Dashboard</a></li>
            <li><a href="/berita" class="hover:text-white">Berita</a></li>
            <li><a href="/olahraga" class="hover:text-white">Olahraga</a></li>
            <li><a href="/riview" class="hover:text-white">Riview</a></li>
          </ul>
        </div>

        <!-- Kontak -->
        <div>
          <h3 class="text-lg font-semibold text-amber-400 mb-3">Kontak Kami</h3>
          <p class="text-sm text-gray-300">
            Jl. Atlet Nasional No.10, Jakarta<br />
            Email: info@sportid.id<br />
            Telp: +62 812 3456 7890
          </p>
        </div>

        <!-- Sosial Media -->
        <div>
          <h3 class="text-lg font-semibold text-amber-400 mb-3">Ikuti Kami</h3>
          <div class="flex space-x-4 text-2xl">
            <a href="https://www.facebook.com/kemenporaIndonesia/?fref=ts" target="_blank" class="hover:text-blue-500"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.instagram.com/kemenpora?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" class="hover:text-pink-500"><i class="fab fa-instagram"></i></a>
            <a href="https://x.com/KEMENPORA_RI" target="_blank" class="hover:text-sky-400"><i class="fab fa-twitter"></i></a>
            <a href="https://www.youtube.com/channel/UCxVNYxq1cYOZfu5ch18xOwA" target="_blank" class="hover:text-red-500"><i class="fab fa-youtube"></i></a>
          </div>
        </div>

      </div>

      <!-- Garis Bawah & Copyright -->
      <div class="mt-10 border-t border-gray-700 pt-4 text-center text-sm text-gray-400">
        &copy; 2025 SportID. Semua hak cipta dilindungi.
      </div>
    </footer>
  </div>
</template>

<script setup>
import { ref } from 'vue'

const showDropdown = ref(false)

const hideDropdown = () => {
  showDropdown.value = false
}
</script>
