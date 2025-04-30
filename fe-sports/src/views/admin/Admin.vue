<template>
  <div class="dashboard">
    <main class="main-content">
      <section class="stats">
        <div class="card orange">
          <i class="icon">📄</i>
          <div>Total Articles<br><strong>120</strong></div>
        </div>
        <div class="card light-orange">
          <i class="icon">📁</i>
          <div>Categories<br><strong>8</strong></div>
        </div>
        <div class="card darker-orange">
          <i class="icon">💬</i>
          <div>Comments<br><strong>352</strong></div>
        </div>
        <div class="card red">
          <i class="icon">👤</i>
          <div>Users<br><strong>57</strong></div>
        </div>
      </section>

      <section class="content">
        <div class="articles">
          <h3><strong>Latest Articles</strong></h3>
          <ul>
            <li v-for="(article, index) in articles" :key="index">
              <img :src="article.image" alt="" />
              <div>
                <p>{{ article.title }}</p>
                <span>{{ article.time }}</span>
              </div>
            </li>
          </ul>
        </div>

        <div class="charts">
          <h3><strong>Categories  </strong></h3>
          <canvas id="donutChart" height="200"></canvas>
          <ul class="legend">
            <li v-for="(label, i) in categoryLabels" :key="i">
              <span :style="{ backgroundColor: categoryColors[i] }"></span> {{ label }}
            </li>
          </ul>
        </div>
      </section>
    </main>
  </div>
</template>

<script>
import { Chart, DoughnutController, ArcElement, Tooltip, Legend } from 'chart.js';
Chart.register(DoughnutController, ArcElement, Tooltip, Legend);

export default {
  data() {
    return {
      articles: [
        { title: 'The Benefits of Regular Exercise', time: '5 hours ago', image: 'https://via.placeholder.com/60' },
        { title: 'Top 10 Football Players of 2024', time: '30 hours ago', image: 'https://via.placeholder.com/60' },
        { title: 'How to Improve Your Running Speed', time: '5 hours ago', image: 'https://via.placeholder.com/60' },
        { title: 'The Rise of Women’s Soccer', time: '8 hours ago', image: 'https://via.placeholder.com/60' },
        { title: 'Strength Training Tips for Athletes', time: '3 hours ago', image: 'https://via.placeholder.com/60' },
      ],
      categoryLabels: ['Anggar', 'Handball', 'Baseball', 'Angkat Besi', 'Sumo'],
      categoryColors: ['#fb923c', '#f97316', '#fdba74', '#facc15', '#fcd34d']
    }
  },
  mounted() {
    new Chart(document.getElementById('donutChart'), {
      type: 'doughnut',
      data: {
        labels: this.categoryLabels,
        datasets: [{
          data: [20, 15, 25, 18, 22],
          backgroundColor: this.categoryColors
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            display: false
          }
        }
      }
    });
  }
}
</script>

<style scoped>
.dashboard {
  font-family: Arial, sans-serif;
  padding: 20px;
  background: #f9fafb;
}

.main-content {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.stats {
  display: flex;
  gap: 20px;
}
.card {
  flex: 1;
  background: #fb923c;
  color: white;
  padding: 20px;
  border-radius: 10px;
  display: flex;
  align-items: center;
  gap: 10px;
}
.card.orange { background: #fb923c; }
.card.light-orange { background: #fdba74; }
.card.darker-orange { background: #f97316; }
.card.red { background: #ef4444; }
.icon {
  font-size: 24px;
}

.content {
  display: flex;
  gap: 20px;
}
.articles, .charts {
  background: white;
  border-radius: 10px;
  padding: 20px;
  flex: 1;
}
.articles ul {
  list-style: none;
  padding: 0;
}
.articles li {
  display: flex;
  align-items: center;
  gap: 10px;
  margin-bottom: 10px;
}
.articles img {
  width: 60px;
  height: 60px;
  border-radius: 8px;
  object-fit: cover;
}
.legend {
  display: flex;
  flex-wrap: wrap;
  list-style: none;
  margin-top: 10px;
  padding: 0;
  gap: 10px;
}
.legend li {
  display: flex;
  align-items: center;
  gap: 6px;
  font-size: 14px;
}
.legend span {
  width: 12px;
  height: 12px;
  display: inline-block;
  border-radius: 2px;
}
</style>