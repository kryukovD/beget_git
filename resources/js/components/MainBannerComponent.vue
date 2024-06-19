<script >
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
  <section class="main-banner relative   ">
    <div class="container mx-auto xl:relative">
      <div class="main-banner__about columns-1 bg-circle xl:bg-cover mb-[20px]">
        <div
          class="p-4  max-w-[360px] overflow-hidden  sm:max-w-[460px] xl:max-w-[600px] 2xl:max-w-[560px] translate-y-[20px] ">
          <img fetchpriority="high" class="grayscale m-auto w-[100%] h-[100%] object-contain rounded"
            src="../../assets/images/i.webp" alt="Дмитрий крюков разработчки в Петрозаводске" />
        </div>
      </div>
   
       
    

      <div
        class="flex flex-wrap justify-between gap-4 lg:flex-nowrap  xl:justify-start xl:gap-[30px] 2xl:gap-[10%] xl:mb-6">
        <div
          class=" bg-blue-700 w-full  overflow-hidden z-1  sm:aspect-[300/300]  sm:h-[350px] sm:w-full  md:h-[400px] md:w-full lg:w-[500px]  xl:aspect-[400/400] xl:left xl:max-w-[600px] xl:w-[600px] xl:h-[600px]">
          <div class="container mx-auto">
            <div class="text-left p-4 text-white">
              <span class="block  font-bold text-xl mb-0.5 md:text-2xl">ПРИВЕТ</span>
              <p class="max-w-[320px] xl:max-w-[500px]">
                Меня зовут Дмитрий , я профессиональный веб разработчик.
              </p>
            </div>
            <div class="flex  justify-end mr-4 pb-4 sm:mt-8">
              <router-link
                class=" uppercase text-sm   bg-purple-600  shadow-xl text-white px-6 py-4 md:text-xl font-[600]  relative 
                after:content-['']  after:h-[100%] after:w-[0px]  after:transition-[all]  after:delay-[150ms] after:left-[0px] after:bg-purple-600  after:top-[0px] after:absolute   hover:after:bg-purple-700  hover:after:w-[100%] "
                to="/portfolio"><span class="inline-flex relative items-center gap-2 z-10">Портфолио <svg
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z" />
                  </svg> </span></router-link>

            </div>
            <div class="hidden sm:block portfolio-props p-4">
              <div class="flex gap-2 items-center">
                <span class="text-3xl font-bold text-orange-300 animate-pulse">{{ portfolio.length }}</span>
                <span class="text-white">созданных сайт{{ pluralizeRus(portfolio.length, ['', 'а', 'ов']) }}</span>
              </div>

              <div class="flex gap-2 items-center">
                <span class="text-3xl font-bold text-orange-300 animate-pulse">{{ Math.round(sumExperience / 12) }}</span>
                <span class="text-white">{{ pluralizeRus(Math.round(sumExperience / 12), ['год', 'года', 'лет']) }}
                  коммерческого опыта</span>
              </div>
            </div>

          </div>
        </div>

        <div class="w-full sm:block  md:w-full lg:w-[400px] md:mb-5  md:block  sm:mt-1  xl:w-[600px]">
          <!-- component -->
          <div class="flex-1 bg-white rounded-lg shadow-xl mt-0 p-4 ">
            <h4 class="text-xl text-gray-900 font-bold xl:text-2xl ">Места работы</h4>
            <div class="relative px-4" v-if="jobs.length !== 0">
              <div class="absolute h-full border border-dashed border-opacity-20 border-secondary"></div>



              <!-- start::Timeline item -->
              <div class="flex items-center w-full my-6 -ml-1.5" v-for="(job, key) in jobs" :key="key">
                <div class="w-1/12 z-10">
                  <div class="w-3.5 h-3.5 bg-blue-600 rounded-full"></div>
                </div>
                <div class="w-11/12">
                  <p class="text-xl xl:text-2xl">{{ job.name }}</p>
                  <p class="text-sm  sm:text-xl xl:text-2xl text-gray-500">{{ job.position }}</p>
                  <p class="text-sm sm:text-lg xl:text-xl  text-gray-500">{{ job.period_text }}</p>
                </div>
              </div>
              <!-- end::Timeline item -->


            </div>
          </div>
        </div>

      </div>



    </div>



  </section></template>


