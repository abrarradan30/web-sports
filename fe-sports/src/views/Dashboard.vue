<template>
  <div class="h-screen relative flex flex-col items-center justify-center bg-[#f8f6f5]">
    <video
      class="absolute top-0 left-0 w-full h-full object-cover z-0"
      autoplay
      muted
      playsinline
      webkit-playsinline
    >
      <source src="/videos/snow.mp4" type="video/mp4" />
    </video>

    <h1
      class="text-5xl sm:text-7xl font-bold text-[#ff6500] italic animate-zoom transition-opacity duration-500 z-10"
      :class="{ 'opacity-0': fadingOut, 'opacity-100': !fadingOut }"
    >
      {{ currentText }}
    </h1>
    <h1 class="text-5xl sm:text-7xl font-bold text-[#2f2d2d] transition-opacity duration-500 z-10">
      everyday.
    </h1>
  </div>
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
