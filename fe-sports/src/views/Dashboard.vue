<template class="border-4">
  <div>
    <!-- Hero Section -->
    <section class="relative bg-cover bg-center h-[80vh]" style="background-image: url('/images/hero.jpg')">
      <div class="absolute inset-0 bg-black/50 z-10">
        <video
          class="absolute top-0 left-0 w-full h-full object-cover z-0"
          autoplay
          muted
          playsinline
          webkit-playsinline
        >
        <source src="/videos/snow.mp4" type="video/mp4">
        </video>
      </div>
      <!-- Hero Content -->
      <Transition name="fade" appear>
        <div
          class="relative z-10 h-full flex flex-col justify-center items-center text-center px-4"
        >
          <h1 class="text-4xl md:text-6xl font-bold text-white mb-6">TINGKATKAN PERFORMA ANDA</h1>
          <p class="text-xl text-white max-w-2xl mb-8">
  Gabung bersama komunitas olahraga terbaik
</p>
<div class="flex flex-col sm:flex-row gap-4">
  <a
    href="https://girlsbeyond.com/2025/04/02/lifestyle/6-komunitas-olahraga-kekinian-di-jakarta-gabung-sekarang"
    target="_blank"
    rel="noopener noreferrer"
    class="bg-amber-500 hover:bg-amber-600 text-white font-bold py-3 px-8 rounded-full transition duration-300 text-center"
  >
    Mulai Sekarang
  </a>
</div>

        </div>
      </Transition>
    </section>

    <!-- Kategori Olahraga -->
    <section class="py-12 px-6 text-center">
      <h2 class="text-3xl font-bold mb-8">Kategori Olahraga</h2>
      <div class="grid grid-cols-2 md:grid-cols-5 gap-6">
        <div v-for="kategori in kategoriOlahraga" :key="kategori" class="bg-gray-100 py-6 rounded shadow text-lg font-semibold">
          {{ kategori }}
        </div>
      </div>
    </section>

    <!-- Event Unggulan -->
    <section class="py-12 px-6 bg-gray-50">
      <h2 class="text-3xl font-bold text-center mb-8">Event Unggulan</h2>
      <div class="flex flex-wrap justify-center gap-6">
        <div v-for="event in events" :key="event.id" class="bg-white w-72 rounded-lg shadow-md overflow-hidden">
          <img :src="event.image" :alt="event.title" class="w-full h-48 object-cover" />
          <div class="p-4">
            <h3 class="text-xl font-semibold mb-2">{{ event.title }}</h3>
            <p class="text-gray-600 text-sm">{{ event.description }}</p>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script setup>
import besi from '@/image/besi.jpg';
import handball from '@/image/handball.jpg';

const kategoriOlahraga = [
  'Anggar',
  'HandBall',
  'BaseBall',
  'Angkat Besi',
  'Sumo',
];

const events = [
  {
    id: 1,
    title: 'SEA Games 2025 di Thailand',
    description: 'Tim anggar Indonesia akan berkompetisi di ajang olahraga terbesar se-Asia Tenggara.',
    image: besi
  },
  {
    id: 2,
    title: 'Street Basketball Cup',
    description: 'Tunjukkan skillmu di lapangan jalanan!',
    image: handball
  }
];
</script>
