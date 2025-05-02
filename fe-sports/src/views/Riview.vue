<template>
  <div class="p-6 bg-white rounded-2xl shadow-md grid gap-6 max-w-4xl mx-auto">
    <h2 class="text-2xl font-bold text-orange-600 mb-4">Review Olahraga</h2>

    <!-- Input hanya nama -->
    <form @submit.prevent="addSport" class="grid gap-4 bg-orange-50 p-4 rounded-lg">
      <input
        v-model="sportName"
        type="text"
        placeholder="Masukkan Nama Olahraga"
        class="p-2 border rounded"
        required
      />
      <button
        type="submit"
        class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600 transition"
      >
        Tampilkan
      </button>
    </form>

    <!-- Daftar review -->
    <div v-if="sports.length" class="mt-6 grid gap-4">
      <h3 class="text-xl font-semibold text-orange-600">Review yang Ditampilkan</h3>
      <div
        v-for="(sport, index) in sports"
        :key="index"
        class="border rounded-xl shadow p-4 animate__animated animate__fadeInUp"
      >
        <img
          :src="sport.image"
          :alt="sport.name"
          class="w-full h-48 object-cover rounded-md mb-4"
        />
        <h4 class="text-lg font-semibold text-orange-500">{{ sport.name }}</h4>
        <p class="text-gray-700 text-sm mt-1">{{ sport.review }}</p>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'

// Form input
const sportName = ref('')
const sports = ref([])

// Database olahraga lokal
const sportDatabase = {
  Anggar: {
    image: 'https://image/anggar.jpg',
    review: 'Anggar adalah olahraga duel menggunakan pedang. Mengandalkan kecepatan, strategi, dan ketepatan serangan.',
  },
  Handball: {
    image: 'https://image/handball.jpg',
    review: 'Handball adalah permainan cepat yang menggabungkan unsur basket dan sepak bola, dimainkan dengan tangan.',
  },
  Sumo: {
    image: 'https://image/sumo.jpg',
    review: 'Sumo adalah olahraga tradisional Jepang di mana dua pegulat mencoba mendorong lawan keluar dari ring.',
  },
  Baseball: {
    image: 'https://image/baseball.jpg',
    review: 'Baseball adalah olahraga strategi yang populer di AS dan Jepang, dimainkan dengan memukul bola dan mencetak skor.',
  },
  Angkatbesi: {
    image: 'https://image/angkatbesi.jpg',
    review: 'Angkat Besi adalah olahraga kekuatan yang menguji kemampuan atlet dalam mengangkat beban berat dengan dua gaya utama: snatch dan clean & jerk.',
  },
}

// Tambahkan berdasarkan input nama
function addSport() {
  const name = sportName.value.trim()
  const data = sportDatabase[name]

  if (data) {
    // Gantikan seluruh isi list dengan 1 data baru
    sports.value = [{
      name,
      image: data.image,
      review: data.review,
    }]
    sportName.value = ''
  } else {
    alert('Data untuk olahraga tersebut tidak ditemukan.')
  }
}
</script>

<style scoped>
@import 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css';
</style>
