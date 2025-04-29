<template>
  <section id="contact" class="contact py-16 px-4">
    <h2 class="text-4xl font-bold text-center mb-4">
      <span class="text-[#ff6500]">Kontak</span> Kami
    </h2>
    <p class="text-center max-w-xl mx-auto mb-8">
      Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facilis voluptas
      suscipit enim autem quis. Suscipit.
    </p>
    <div class="flex flex-col md:flex-row mt-8 bg-[#ff6500]">
      <!-- Map Start -->
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126646.25708163159!2d112.64264265151!3d7.275443784810686!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fbf8381ac47f%3A0x3027a76e352be40!2sSurabaya%2C%20Kota%20SBY%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1681016119991!5m2!1sid!2sid"
        allowfullscreen
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
        class="flex-1 w-full object-cover min-h-[300px]"
      ></iframe>
      <!-- Map End -->

      <form action="" class="flex-1 p-12 text-center bg-[#fff4e6]">
        <div class="flex items-center mt-8 border border-gray-300 pl-6 rounded-md">
          <i class="fas fa-user text-[#ff6500]  text-2xl mr-4"></i>
          <input
            type="text"
            placeholder="Nama"
            class="w-full p-4 text-[1.2rem] bg-transparent font-bold text-[#ff6500] focus:outline-none"
          />
        </div>

        <div class="flex items-center mt-8 border border-gray-300 pl-6 rounded-md">
          <i class="fas fa-envelope text-[#ff6500] text-2xl mr-4"></i>
          <input
            type="email"
            placeholder="Email"
            class="w-full p-4 text-[1.2rem] bg-transparent font-bold text-[#ff6500] focus:outline-none"
          />
        </div>

        <div class="flex items-center mt-8 border border-gray-300 pl-6 rounded-md">
          <i class="fas fa-phone text-[#ff6500] text-2xl mr-4"></i>
          <input
            type="text"
            placeholder="No HP"
            class="w-full p-4 text-[1.2rem] bg-transparent font-bold text-[#ff6500] focus:outline-none"
          />
        </div>

        <button
          type="submit"
          class="mt-12 inline-block px-12 py-4 text-[1.2rem] text-white bg-[#ff6500] rounded-md hover:opacity-90"
        >
          Kirim Pesan
        </button>
      </form>
    </div>
  </section>
</template>


<style scoped>
.about-container {
  padding: 20px;
  background-color: #e5e7eb;
  text-align: center;
}
</style>
