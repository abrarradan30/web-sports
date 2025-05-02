<template>
  <div>

    <!-- Hero Section -->
    <section class="relative h-[80vh] bg-cover bg-center" style="background-image: url('/images/hero.jpg')">
      <div class="absolute inset-0 bg-black/60 z-10">
        <video
          class="absolute top-0 left-0 w-full h-full object-cover z-0"
          autoplay muted playsinline webkit-playsinline
        >
          <source src="/videos/snow.mp4" type="video/mp4" />
        </video>
      </div>
      <div class="relative z-10 flex flex-col items-center justify-center h-full text-center text-white px-6">
        <h1 class="text-4xl md:text-6xl font-bold mb-4">Bergabunglah Dalam Komunitas Olahraga Terbaik</h1>
        <p class="text-xl max-w-2xl mb-6">Temukan kegiatan olahraga favoritmu dan capai gaya hidup sehat bersama kami.</p>
        <a href="#kategori" class="bg-amber-500 hover:bg-amber-600 px-8 py-3 rounded-full font-semibold transition">Lihat Kategori</a>
      </div>
    </section>

    <!-- Kategori Olahraga -->
    <section id="kategori" class="py-16 px-6 text-center bg-white">
      <h2 class="text-3xl font-bold mb-10">Kategori Olahraga</h2>
      <div class="grid grid-cols-2 md:grid-cols-5 gap-6">
        <div
          v-for="(kategori, index) in kategoriOlahraga"
          :key="index"
          class="bg-gray-100 py-6 rounded-lg shadow hover:shadow-md transition flex flex-col items-center transform hover:scale-105 duration-300 ease-in-out"
        >
          <img :src="kategori.image" :alt="kategori.name" class="w-24 h-24 rounded-full mb-4 object-cover" />
          <p class="font-medium">{{ kategori.name }}</p>
        </div>
      </div>
    </section>

    <!-- Alasan Bergabung -->
    <section class="bg-gray-50 py-16 px-6">
      <h2 class="text-3xl font-bold text-center mb-10">Kenapa Memilih Kami?</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
        <div class="p-6 bg-white rounded-lg shadow">
          <h3 class="text-xl font-semibold mb-2">Komunitas Aktif</h3>
          <p>Lebih dari 10.000 anggota rutin beraktivitas bersama tiap pekan.</p>
        </div>
        <div class="p-6 bg-white rounded-lg shadow">
          <h3 class="text-xl font-semibold mb-2">Event Seru</h3>
          <p>Berbagai event dan turnamen olahraga eksklusif setiap bulan.</p>
        </div>
        <div class="p-6 bg-white rounded-lg shadow">
          <h3 class="text-xl font-semibold mb-2">Pelatih Profesional</h3>
          <p>Dibimbing langsung oleh pelatih bersertifikat dan berpengalaman.</p>
        </div>
      </div>
    </section>

    <!-- Statistik Komunitas -->
    <section class="py-16 px-6 bg-amber-50 text-center">
      <h2 class="text-3xl font-bold mb-10">Komunitas Kami Dalam Angka</h2>
      <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        <div>
          <p class="text-5xl font-bold text-amber-600">10K+</p>
          <p>Anggota</p>
        </div>
        <div>
          <p class="text-5xl font-bold text-amber-600">250+</p>
          <p>Event</p>
        </div>
        <div>
          <p class="text-5xl font-bold text-amber-600">50+</p>
          <p>Pelatih</p>
        </div>
        <div>
          <p class="text-5xl font-bold text-amber-600">99%</p>
          <p>Kepuasan</p>
        </div>
      </div>
    </section>

    <!-- Testimoni -->
    <section class="bg-white py-16 px-6">
  <h2 class="text-3xl font-bold text-center mb-10">Apa Kata Mereka?</h2>
  <div class="max-w-5xl mx-auto grid gap-8 md:grid-cols-2">
    
    <!-- Testimoni 1 -->
    <div class="p-6 border rounded-lg shadow">
      <div class="flex justify-center mb-2">
        <span class="text-amber-400">★★★★★</span> <!-- Rating bintang -->
      </div>
      <p class="italic">“Lingkungannya sangat mendukung! Saya selalu termotivasi untuk berolahraga.”</p>
      <p class="mt-4 font-semibold text-amber-500">— Maya, Member</p>
    </div>

    <!-- Testimoni 2 -->
    <div class="p-6 border rounded-lg shadow">
      <div class="flex justify-center mb-2">
        <span class="text-amber-400">★★★★★</span> <!-- Rating bintang -->
      </div>
      <p class="italic">“Event yang mereka adakan seru dan profesional. Sangat cocok buat pemula maupun atlet.”</p>
      <p class="mt-4 font-semibold text-amber-500">— Rio, Pelari Amatir</p>
    </div>

  </div>
</section>


    <!-- CTA -->
    <section class="bg-amber-600 py-16 px-6 text-white text-center">
      <h2 class="text-3xl font-bold mb-4">Siap Meningkatkan Performa Anda?</h2>
      <p class="mb-6">Gabung sekarang dan rasakan perubahan dalam hidup Anda.</p>
      <a href="https://girlsbeyond.com/2025/04/02/lifestyle/6-komunitas-olahraga-kekinian-di-jakarta-gabung-sekarang" class="bg-white text-amber-600 font-bold py-3 px-8 rounded-full hover:bg-gray-200 transition">Gabung Sekarang</a>
    </section>

  </div>
</template>

<script setup>
import anggarImage from '@/image/anggar.jpg';
import handballImage from '@/image/handball.jpg';
import baseballImage from '@/image/baseball.jpg';
import angkatBesiImage from '@/image/besi.jpg';
import sumoImage from '@/image/sumo.jpg';

const kategoriOlahraga = [
  { name: 'Anggar', image: anggarImage },
  { name: 'HandBall', image: handballImage },
  { name: 'BaseBall', image: baseballImage },
  { name: 'Angkat Besi', image: angkatBesiImage },
  { name: 'Sumo', image: sumoImage },
];
</script>
