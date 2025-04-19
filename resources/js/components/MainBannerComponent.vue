<script>
import { getJobs, getAllPortfolio } from '../api';
export default {
  data() {
    return {
      jobs: [],
      portfolio: []
    }
  },
  created() {
    getJobs().then((response) => this.jobs = response)
    getAllPortfolio().then((response) => this.portfolio = response)

  },
  methods: {

    pluralizeRus(n, forms) {
      return n % 10 == 1 && n % 100 != 11
        ? forms[0]
        : (n % 10 >= 2 && n % 10 <= 4
          && (n % 100 < 10
            || n % 100 >= 20) ? forms[1] : forms[2]);
    }
  },
  computed: {

    sumExperience: function () {
      return this.jobs.reduce((acc, current) => { return acc + current.period_mounth }, 0)
    }

  }
}
</script>

<template>
  <section class="main-banner relative  p-4 ">
    <div class="container mt-4 mx-auto xl:relative">
      <div class="main-banner__about grid grid-cols-2 gap-4  sm:gap-8 xl:bg-cover mb-[20px] ">
        <div class="col-span-full mb-0  bg-gray-300 shadow-[0px_0px_5px_#333333] sm:col-start-1 sm:col-end-2">
          <img fetchpriority="high" width="600" height="600"
            class="grayscale m-auto w-[100%] h-[100%] object-cover rounded clip-path-square"
            src="../../assets/images/i.webp" alt="Дмитрий крюков разработчки в Петрозаводске" />
        </div>


        <div class="grid auto-rows-max col-span-full grid-cols-2 content-around sm:col-start-2 sm:col-end-3">

          <div class="text-left  mb-4 col-span-full">
            <span class="block mb-2  font-bold text-xl mb-0.5 md:text-3xl md:mb-8">ПРИВЕТ</span>
            <p class="max-w-[320px] xl:max-w-[500px]">
              Меня зовут Дмитрий, я профессиональный веб разработчик.
            </p>
          </div>
          <div class="flex flex-wrap gap-4  pb-4 sm:mt-8 col-span-full">
            <router-link
              class=" uppercase text-sm inline-flex justify-center items-center bg-violet-theme  box-shadow-theme  px-6 py-4 md:text-xl xs:max-w-[187px] md:max-w-[231px] w-full font-[600]  relative 
                after:content-['']  after:h-[100%] after:w-[0px]  after:transition-[all]  after:delay-[150ms] after:left-[0px] after:bg-gray-200  after:top-[0px] after:absolute   hover:after:bg-gray-200  hover:after:w-[100%] "
              to="/portfolio"><span class="inline-flex relative items-center gap-2 z-10">Портфолио
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="m16.49 12 3.75 3.75m0 0-3.75 3.75m3.75-3.75H3.74V4.499" />
                </svg>

              </span></router-link>

            <a target="_blank" href="https://t.me/dmitriykryuk"
              class=" inline-flex justify-center items-center uppercase text-sm w-full  cursor-pointer bg-violet-theme box-shadow-theme  xs:max-w-[187px] md:max-w-max  px-6 py-4 md:text-xl font-[600]  relative 
                after:content-['']  after:h-[100%] after:w-[0px]  after:transition-[all]  after:delay-[150ms] after:left-[0px] after:bg-gray-200  after:top-[0px] after:absolute   hover:after:bg-gray-200  hover:after:w-[100%]">
              <span class="inline-flex relative items-center gap-2 z-10">Написать в ТГ <svg
                  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                  class="bi bi-telegram w-6 h-6" viewBox="0 0 16 16">
                  <path
                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.287 5.906q-1.168.486-4.666 2.01-.567.225-.595.442c-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294q.39.01.868-.32 3.269-2.206 3.374-2.23c.05-.012.12-.026.166.016s.042.12.037.141c-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8 8 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629q.14.092.27.187c.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.4 1.4 0 0 0-.013-.315.34.34 0 0 0-.114-.217.53.53 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09" />
                </svg> </span>
            </a>

          </div>
          <div class="hidden sm:block portfolio-props p-4 sm:col-span-full">
            <div class="flex gap-2 items-center">
              <span class="text-3xl font-bold  animate-pulse">{{ portfolio.length }}</span>
              <span class="">созданных сайт{{ pluralizeRus(portfolio.length, ['', 'а', 'ов']) }}</span>
            </div>

            <div class="flex gap-2 items-center">
              <span class="text-3xl font-bold  animate-pulse">{{ Math.round(sumExperience / 12)
              }}</span>
              <span class="">{{ pluralizeRus(Math.round(sumExperience / 12), ['год', 'года', 'лет']) }}
                коммерческого опыта</span>
            </div>
          </div>


        </div>

        <div class="w-full sm:block  md:w-full  md:mb-5  md:block  sm:mt-1  col-span-full ">
          <!-- component -->
          <div class="flex-1 bg-white rounded-lg shadow-xl mt-0 p-4 ">
            <div class="relative">
              <h2 class="text-xl text-m-color font-bold lg:text-2xl xl:text-3xl ">Места работы</h2>
              <span
                class="absolute  inset-0 shadow-[10px_10px_30px_5px_#2e9cca] w-0 group-hover:shadow-[10px_10px_30px_5px_#29648a]"></span>
            </div>

            <div class="grid  sm:grid-cols-2">
              <div class="relative px-4" v-if="jobs.length !== 0">
                <div class="absolute h-full border border-dashed border-opacity-20 border-secondary"></div>



                <!-- start::Timeline item -->
                <div class="flex items-center w-full my-6 -ml-1.5" v-for="(job, key) in jobs" :key="key">
                  <div class="w-1/12 ">
                    <div class="w-3.5 h-3.5 bg-accent-second rounded-full z-10 relative"></div>
                  </div>
                  <div class="w-11/12">
                    <p class="text-xl xl:text-2xl">{{ job.name }}</p>
                    <p class="text-sm  sm:text-xl xl:text-2xl">{{ job.position }}</p>
                    <p class="text-sm sm:text-lg xl:text-xl ">{{ job.period_text }}</p>
                  </div>
                </div>
                <!-- end::Timeline item -->


              </div>

              <div class="bg-white aspect-[257/171] w-full" >
                <img class="w-full h-full object-contain" width="668" height="445" src="../../assets/images/stack_m.png" alt="stack">
              </div>
            </div>
          </div>
        </div>


      </div>








    </div>



  </section>
</template>
