<template>
<section class="relative w-full flex justify-center overflow-hidden bg-[#f8f6f5] pb-16">
  <!-- Video ukuran asli -->
  <video
    class="relative object-contain z-0"
    autoplay
    muted
    loop
    playsinline
    webkit-playsinline
  >
    <source src="/videos/snow.mp4" type="video/mp4" />
  </video>

  <!-- Overlay teks di atas video -->
  <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-4 z-10">
    <h1
      class="text-5xl sm:text-7xl font-bold text-[#ff6500] italic animate-zoom transition-opacity duration-500 mb-4"
      :class="{ 'opacity-0': fadingOut, 'opacity-100': !fadingOut }"
    >
      {{ currentText }}
    </h1>
    <h1 class="text-5xl sm:text-7xl font-bold text-[#2f2d2d] transition-opacity duration-500 mb-6">
      everyday.
    </h1>
    <h3 class="max-w-xl text-[#1f1f1f]">
      Mau bergerak terus biar sehat sekaligus berbuat baik? Di sini tempatnya!
    </h3>
  </div>
</section>


<!-- Konten setelah bagian video -->
<section class="bg-[#f8f6f5] px-4 py-16 text-center">
  <h2 class="text-3xl font-bold text-[#2f2d2d] mb-6">Kegiatan Kami</h2>
  <p class="max-w-3xl mx-auto text-lg text-[#444]">
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
  </p>
  <p class="max-w-3xl mx-auto text-lg text-[#444] mt-6">
    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
  </p>
</section>


</template>

<script setup>
import { ref, onMounted } from 'vue'

const texts = ['Active!', 'Offline!']
const currentIndex = ref(0)
const currentText = ref(texts[currentIndex.value])
const fadingOut = ref(false)

onMounted(() => {
  setInterval(() => {
    fadingOut.value = true
    setTimeout(() => {
      currentIndex.value = (currentIndex.value + 1) % texts.length
      currentText.value = texts[currentIndex.value]
      fadingOut.value = false
    }, 400)
  }, 3000)
})
</script>

<style scoped>
@keyframes zoomInOut {
  0%, 100% {
    transform: scale(1);
  }
  50% {
    transform: scale(1.07);
  }
}

.animate-zoom {
  animation: zoomInOut 3s ease-in-out infinite;
}
</style>
