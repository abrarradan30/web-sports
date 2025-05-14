<template>
  <div class="min-h-screen flex flex-col">
    <!-- Header -->
    <header class="fixed w-full top-0 z-50 bg-[#f8f6f5] text-[#001233] py-3 px-6 flex items-center justify-between shadow-md">
      <!-- Logo -->
      <div class="flex items-center">
        <img src="@/image/logo.png" alt="Logo" class="h-10 object-contain" />
      </div>

      <!-- Desktop Navigation -->
      <nav class="hidden md:flex space-x-10 text-base font-semibold">
        <RouterLink to="/" class="hover:text-[#ff6500] transition">Dashboard</RouterLink>
        <RouterLink to="/berita" class="hover:text-[#ff6500] transition">Berita</RouterLink>

        <!-- Mega Menu -->
        <div id="olahraga-menu" class="relative group" @mouseover="showDropdown = true" @mouseleave="showDropdown = false">
          <span class="cursor-pointer hover:text-[#ff6500] transition duration-300 ease-in-out">Olahraga</span>
          <div 
            v-if="showDropdown" 
            class="fixed left-0 right-0 top-[50px] bg-white text-black drop-shadow-md shadow-xl opacity-100 visible transition-all duration-300 z-50">
            <div class="max-w-screen-xl mx-auto px-9 py-10 grid grid-cols-5 gap-8">
              <RouterLink to="/anggar" class="text-center hover:scale-105 transition-transform duration-300 cursor-default" @click="hideDropdown">
                <img src="@/image/anggar1.jpg" alt="Anggar" class="w-full h-44 object-cover rounded-md mb-2 shadow-md" />
                <span class="font-bold text-base">Anggar</span>
              </RouterLink>
              <RouterLink to="/handball" class="text-center hover:scale-105 transition-transform duration-300 cursor-default" @click="hideDropdown">
                <img src="@/image/handball.jpg" alt="Handball" class="w-full h-44 object-cover rounded-md mb-2 shadow-md" />
                <span class="font-bold text-base">Handball</span>
              </RouterLink>
              <RouterLink to="/baseball" class="text-center hover:scale-105 transition-transform duration-300 cursor-default" @click="hideDropdown">
                <img src="@/image/baseball1.jpg" alt="Baseball" class="w-full h-44 object-cover rounded-md mb-2 shadow-md" />
                <span class="font-bold text-base">Baseball</span>
              </RouterLink>
              <RouterLink to="/angkatbesi" class="text-center hover:scale-105 transition-transform duration-300 cursor-default" @click="hideDropdown">
                <img src="@/image/besi1.jpg" alt="Angkat Besi" class="w-full h-44 object-cover rounded-md mb-2 shadow-md" />
                <span class="font-bold text-base">Angkat Besi</span>
              </RouterLink>
              <RouterLink to="/sumo" class="text-center hover:scale-105 transition-transform duration-300 cursor-default" @click="hideDropdown">
                <img src="@/image/sumo2.jpeg" alt="Sumo" class="w-full h-44 object-cover rounded-md mb-2 shadow-md" />
                <span class="font-bold text-base">Sumo</span>
              </RouterLink>
            </div>
          </div>
        </div>

        <RouterLink to="/review" class="hover:text-[#ff6500] transition">Review</RouterLink>
      </nav>

      <!-- Desktop Login Icon -->
      <router-link to="/login" class="hidden md:flex items-center text-[#001233] text-2xl hover:opacity-80 transition">
        <i class="fa-solid fa-user-circle"></i>
      </router-link>

      <!-- Mobile Menu Icon -->
      <button @click="toggleMobileMenu" class="md:hidden text-[#001233] focus:outline-none">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
        </svg>
      </button>
    </header>

    <!-- Mobile Navigation -->
    <div v-if="isMobileMenuOpen"  class="md:hidden bg-[#f8f6f5] text-[#001233] w-full px-6 pt-4 pb-6 space-y-4 shadow-md mt-16">
      <RouterLink to="/" class="block font-semibold hover:text-[#ff6500]" @click="toggleMobileMenu">Dashboard</RouterLink>
      <RouterLink to="/berita" class="block font-semibold hover:text-[#ff6500]" @click="toggleMobileMenu">Berita</RouterLink>

      <!-- Dropdown Olahraga Mobile -->
      <details class="group">
        <summary class="font-semibold cursor-pointer hover:text-[#ff6500]">Olahraga</summary>
        <div class="grid grid-cols-2 gap-4 mt-6">
          <RouterLink to="/anggar" class="text-center" @click="toggleMobileMenu">
            <img src="@/image/anggar.jpg" alt="Anggar" class="h-20 object-cover mx-auto rounded-md shadow" />
            <span class="text-sm block mt-1">Anggar</span>
          </RouterLink>
          <RouterLink to="/handball" class="text-center" @click="toggleMobileMenu">
            <img src="@/image/handball.jpg" alt="Handball" class="h-20 object-cover mx-auto rounded-md shadow" />
            <span class="text-sm block mt-1">Handball</span>
          </RouterLink>
          <RouterLink to="/baseball" class="text-center" @click="toggleMobileMenu">
            <img src="@/image/baseball.jpg" alt="Baseball" class="h-20 object-cover mx-auto rounded-md shadow" />
            <span class="text-sm block mt-1">Baseball</span>
          </RouterLink>
          <RouterLink to="/angkatbesi" class="text-center" @click="toggleMobileMenu">
            <img src="@/image/angkatbesi.jpg" alt="Angkat Besi" class="h-20 object-cover mx-auto rounded-md shadow" />
            <span class="text-sm block mt-1">Angkat Besi</span>
          </RouterLink>
          <RouterLink to="/sumo" class="text-center" @click="toggleMobileMenu">
            <img src="@/image/sumo.jpg" alt="Sumo" class="h-20 object-cover mx-auto rounded-md shadow" />
            <span class="text-sm block mt-1">Sumo</span>
          </RouterLink>
        </div>
      </details>

      <RouterLink to="/review" class="block font-semibold hover:text-[#ff6500]" @click="toggleMobileMenu">Review</RouterLink>
      <RouterLink to="/login" class="block font-semibold hover:text-[#ff6500]" @click="toggleMobileMenu">Login</RouterLink>
    </div>

    <!-- Main Content -->
    <main class="bg-gray-100 pt-16">
      <RouterView />
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-10 px-6">
      <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
        <div>
          <h2 class="text-2xl font-bold text-amber-400 mb-2">SportID</h2>
          <p class="text-sm text-gray-300">
            Website CMS olahraga yang mendukung event dan berita terkini dunia olahraga nasional.
          </p>
        </div>

        <div>
          <h3 class="text-lg font-semibold text-amber-400 mb-3">Navigasi</h3>
          <ul class="space-y-2 text-sm text-gray-300">
            <li><a href="/" class="hover:text-white">Dashboard</a></li>
            <li><a href="/berita" class="hover:text-white">Berita</a></li>
            <li><a href="#" @click.prevent="scrollToOlahraga" class="hover:text-white">Olahraga</a></li>
            <li><a href="/review" class="hover:text-white">Review</a></li>
          </ul>
        </div>

        <div>
          <h3 class="text-lg font-semibold text-amber-400 mb-3">Kontak Kami</h3>
          <p class="text-sm text-gray-300">
            Jl. Atlet Nasional No.10, Jakarta<br />
            Email: info@sportid.id<br />
            Telp: +62 812 3456 7890
          </p>
        </div>

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

      <div class="mt-10 border-t border-gray-700 pt-4 text-center text-sm text-gray-400">
        &copy; 2025 SportID. Semua hak cipta dilindungi.
      </div>
    </footer>
  </div>
</template>

<script setup>
import { ref } from 'vue'

const showDropdown = ref(false)
const isMobileMenuOpen = ref(false)

const hideDropdown = () => {
  showDropdown.value = false
}

const toggleMobileMenu = () => {
  isMobileMenuOpen.value = !isMobileMenuOpen.value
}

const scrollToOlahraga = () => {
  const el = document.getElementById('olahraga-menu')
  if (el) {
    el.scrollIntoView({ behavior: 'smooth', block: 'start' })
    showDropdown.value = true
  }
}

</script>
