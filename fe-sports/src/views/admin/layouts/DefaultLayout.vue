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
    <footer class="bg-gray-900 text-white py-10 px-6">
  <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
    
    <!-- Logo & Deskripsi -->
    <div>
      <h2 class="text-2xl font-bold text-amber-400 mb-2">SportID</h2>
      <p class="text-sm text-gray-300">
        CMS olahraga Indonesia yang mendukung komunitas, event, dan berita terkini dunia olahraga nasional.
      </p>
    </div>

    <!-- Navigasi Cepat -->
    <div>
      <h3 class="text-lg font-semibold text-amber-400 mb-3">Navigasi</h3>
      <ul class="space-y-2 text-sm text-gray-300">
        <li><a href="/admin" class="hover:text-white">Beranda</a></li>
        <li><a href="/adminberita" class="hover:text-white">Berita</a></li>
        <li><a href="/adminkategori" class="hover:text-white">Kategori</a></li>
        <li><a href="/adminproduct" class="hover:text-white">Product</a></li>
        <li><a href="/admingaleri" class="hover:text-white">Galeri</a></li>
        <li><a href="/admincontact" class="hover:text-white">Contact</a></li>
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


