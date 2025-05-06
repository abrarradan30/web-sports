<template>
  <div class="mt-8 p-6 bg-white rounded-2xl shadow-md grid gap-6 max-w-4xl mx-auto mb-8">
    <h2 class="text-2xl font-bold text-orange-600 text-center">Review Olahraga</h2>

    <!-- Daftar Review -->
    <div v-if="sports.length" class="mt-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-6">
      <!-- Bagian atas: 3 kolom -->
      <div
        v-for="(sport, index) in sports.slice(0, 3)" 
        :key="index"
        class="border rounded-xl shadow p-4 animate_animated animate_fadeInUp"
      >
        <img
          :src="sport.image"
          :alt="sport.name"
          class="w-full h-auto object-cover rounded-md mb-4"
        />
        <h4 class="text-lg font-semibold text-orange-500">{{ sport.name }}</h4>

        <!-- Rating -->
        <div class="text-yellow-400 text-lg mb-1">
          <span v-for="n in sport.rating" :key="n">★</span>
          <span v-for="n in 5 - sport.rating" :key="'e'+n" class="text-gray-300">★</span>
        </div>

        <p class="text-gray-700 text-sm mb-2">{{ sport.review }}</p>
        <p class="text-gray-600 text-sm mb-4"><strong>Kesan Umum:</strong> {{ sport.generalImpression }}</p>

        <!-- Like -->
        <button @click="sport.likes++" class="text-orange-500 hover:text-orange-700 text-sm mb-2">
          👍 {{ sport.likes }}
        </button>

        <!-- Komentar -->
        <div class="mt-2">
          <input
            v-model="sport.newComment"
            type="text"
            placeholder="Tulis komentar..."
            class="p-1 border rounded w-full text-sm mb-1"
            @keyup.enter="addComment(sport)"
          />
          <ul class="text-sm text-gray-600 mt-1 pl-2 list-disc">
            <li v-for="(comment, i) in sport.comments" :key="i">{{ comment }}</li>
          </ul>
        </div>
      </div>

      <!-- Bagian bawah: 2 kolom di tengah -->
      <div class="col-span-1 md:col-span-3 flex justify-center gap-6">
        <div
          v-for="(sport, index) in sports.slice(3, 5)" 
          :key="index"
          class="border rounded-xl shadow p-4 animate_animated animate_fadeInUp w-full sm:w-1/2 lg:w-1/3"
        >
          <img
            :src="sport.image"
            :alt="sport.name"
            class="w-full h-auto object-cover rounded-md mb-4"
          />
          <h4 class="text-lg font-semibold text-orange-500">{{ sport.name }}</h4>

          <!-- Rating -->
          <div class="text-yellow-400 text-lg mb-1">
            <span v-for="n in sport.rating" :key="n">★</span>
            <span v-for="n in 5 - sport.rating" :key="'e'+n" class="text-gray-300">★</span>
          </div>

          <p class="text-gray-700 text-sm mb-2">{{ sport.review }}</p>
          <p class="text-gray-600 text-sm mb-4"><strong>Kesan Umum:</strong> {{ sport.generalImpression }}</p>

          <!-- Like -->
          <button @click="sport.likes++" class="text-orange-500 hover:text-orange-700 text-sm mb-2">
            👍 {{ sport.likes }}
          </button>

          <!-- Komentar -->
          <div class="mt-2">
            <input
              v-model="sport.newComment"
              type="text"
              placeholder="Tulis komentar..."
              class="p-1 border rounded w-full text-sm mb-1"
              @keyup.enter="addComment(sport)"
            />
            <ul class="text-sm text-gray-600 mt-1 pl-2 list-disc">
              <li v-for="(comment, i) in sport.comments" :key="i">{{ comment }}</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'

const sports = ref([])

const sportDatabase = {
  Anggar: {
    image: '/image/anggar.jpg',
    review: 'Olahraga duel yang cepat dan presisi menggunakan pedang.',
    rating: 4,
    generalImpression: 'Cepat, strategis, dan elegan.'
  },
  Handball: {
    image: '/image/handball.jpg',
    review: 'Permainan tim yang cepat seperti gabungan sepak bola dan basket.',
    rating: 3,
    generalImpression: 'Dinamis dan penuh energi.'
  },
  Sumo: {
    image: '/image/sumo.jpg',
    review: 'Olahraga tradisional Jepang yang mengandalkan kekuatan dan teknik.',
    rating: 5,
    generalImpression: 'Sarat budaya dan kekuatan fisik.'
  },
  Baseball: {
    image: '/image/BASEBALLL.avif',
    review: 'Olahraga strategi antara memukul dan bertahan.',
    rating: 4,
    generalImpression: 'Penuh strategi dan tensi tinggi.'
  },
  Angkatbesi: {
    image: '/image/angkatbesi.jpg',
    review: 'Olahraga kekuatan ekstrem dengan teknik tinggi.',
    rating: 5,
    generalImpression: 'Kekuatan dan konsentrasi penuh.'
  }
}

// Tampilkan semua review saat halaman dimuat
onMounted(() => {
  sports.value = Object.entries(sportDatabase).map(([name, data]) => ({
    name,
    image: data.image,
    review: data.review,
    rating: data.rating,
    generalImpression: data.generalImpression,
    likes: 0,
    comments: [],
    newComment: ''
  }))
})

function addComment(sport) {
  const comment = sport.newComment.trim()
  if (comment) {
    sport.comments.push(comment)
    sport.newComment = ''
  }
}
</script>

<style scoped>
@import 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css';
</style>