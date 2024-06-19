<script>
import { getPrices } from '../api';
export default {
  data() {
    return {
      prices: []
    }
  },
  created() {
    getPrices().then((response => this.prices = response))
  },
  methods: {
    formatPrice(price) {
      return price.toString().replace(/(\d{1,3}(?=(?:\d\d\d)+(?!\d)))/g, "$1" + " ");
    }
  }
}
</script>

<template>
  <section class="section-services text-white   sm:flex sm:relative md:mb-5">
    <div class="container flex flex-wrap mx-auto   sm:justify-between xl:relative ">
      <div
        class="min-h-[158px] w-full bg-blue-700 sm:order-2 md:order-2  sm:w-full sm:h-[auto] md:w-full  lg:order-[-1]   lg:w-[500px] xl:w-[600px] xl:h-[600px]">
        <div class="container mx-auto ">
          <div class="p-4">
            <span class="block  font-bold text-xl mb-0.5 md:text-2xl">Услуги </span>
            <p>То , что я реально могу вам предложить</p>
            <p class="mt-4 mb-4 d-flex  animate-pulse"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                class="w-7 h-7 mb-1 stroke-orange-300 inline-flex">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
              </svg>
              Бесплатная поддержка сайта 1 год.</p>
            <p>Значительный опыт по созданию сайтов от обычный лендингов до полноценных интернет магазинов.</p>
            <p class="mt-8 animate-pulse flex gap-1"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 mb-1 stroke-orange-300">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <span>Цены:</span>
            </p>
            <ul class="mt-4  mb-4 pl-4 ">
              <li v-for="(item, i) in prices" :key="i">- {{ item.type }} от <span class="text-orange-300">{{
                formatPrice(item.value) }} руб</span></li>

            </ul>
            <p> PS: цены могут изменяться , если вам нужно разработать уникальный дизайн.</p>
          </div>
        </div>
      </div>


      <ul
        class="text-black  sm:py-[60px]   p-4  grid grid-cols-[repeat(auto-fit,minmax(200px,1fr))] sm:grid-cols-1 sm:gap-[30px] gap-1 sm:gap-2 sm:flex-grow-[0.5] md:grid-cols-2 lg:grid-cols-1  xl:grid-cols-[repeat(2,1fr)] sm:ml-[30px]  sm:justify-center  xl:flex-grow-[1] ">
        <li class="flex items-center ">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-6 h-6 inline stroke-orange-300 mr-1">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
          </svg>
          Верстка сайта по макету
        </li>
        <li class="flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-6 h-6 inline stroke-orange-300 mr-1">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
          </svg>
          Интеграция в СMS
        </li>
        <li class="flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-6 h-6 inline stroke-orange-300 mr-1">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
          </svg>
          Оптимизация сайта
        </li>
        <li class="flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-6 h-6 inline stroke-orange-300 mr-1">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
          </svg>
          Seo продвижение
        </li>
        <li class="flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-6 h-6 inline stroke-orange-300 mr-1">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
          </svg>
          Создание сайта под ключ
        </li>
        <li class="flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-6 h-6 inline stroke-orange-300 mr-1">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
          </svg>
          Поддержка сайта
        </li>
      </ul>
    </div>

  </section>
</template>