<script>
import { onMounted, ref } from "vue";
import { Swiper, SwiperSlide } from "swiper/vue";
import { Navigation } from 'swiper';
import { apiUrl, getStack, getTechnologies } from "../api";
import "swiper/css";
export default {
  data() {
    return {
      apiUrl: apiUrl,
      technologies: [],
      stack: [],
      filterLabel: "Cms",
      filterItems: [],
      active: 3,
    };
  },
  components: {
    Swiper,
    SwiperSlide
  },
  setup() {
    const prev = ref(null);
    const next = ref(null);
    const onSwiper = (swiper) => { };
    const onSlideChange = () => {
      console.log("slide change");
    };
    return {
      onSwiper,
      onSlideChange,
      prev,
      next,
      modules: [Navigation]
    };
  },
  methods: {
    filterTech(category) {
      this.filterItems = this.technologies.filter((item) => {
        if (item.category == category) {
          return true;
        }
      });
    },
    scrollToForm(){
     let el= document.getElementById("formBlock");
     el.scrollIntoView({
      behavior:'smooth'
     });
    }
  },
  mounted() {
    this.technologies = getTechnologies().then((technologies) => {
      this.technologies = technologies;
      this.filterTech(this.filterLabel);
    });
    this.stack = getStack().then((stack) => {
      this.stack = stack;
    });
  },
};
</script>
<template>
  <section class="section-technologies mt-10  md:mt-0 relative md:mb-4">
    <div class="container mx-auto sm:mb-4 xl:relative ">
      <div
        class="slider-technologies_filter grid  grid-cols-[repeat(auto-fit,minmax(140px,1fr))] sm:grid-cols-[repeat(auto-fit,minmax(140px,max-content))] grid-flow-row gap-4 px-4 pb-2 md:grid-cols-[repeat(auto-fit,minmax(120px,max-content))] md:gap-4">
        <span v-for="(item, i) of stack" :key="i" @click="filterTech(item.name), (active = i + 1)"
          :class="{ 'bg-purple-600': active == i + 1 }"
          class=" shadow-xl whitespace-nowrap shrink-0 inline-flex cursor-pointer justify-center items-center rounded-md bg-blue-600 px-2 py-1 font-[500]  text-white ring-1 ring-inset ring-blue-700/10 md:w-[max-content]">{{
            item.name }}</span>
      </div>
    </div>
    <div class="container justify-between mx-auto xl:relative flex flex-wrap lg:flex-nowrap ">
      <div class="w-full sm:order-2  lg:w-[auto]">
        <div class="min-h-[158px] w-full  bg-blue-700  sm:w-full md:w-full  sm:z-10 lg:w-[500px] xl:right-0 xl:w-[600px]">
          <div class="container mx-auto text-white  ">
            <div class="p-4  mb-4 sm:mb-0 ">
              <div class="">
                <span class="block text-xl font-bold mb-0.5 md:text-2xl ">Мой стек</span>
                <p>Или на чем я умею писать сайты.</p>
                <p class="mt-4 d-flex animate-pulse "><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    class="w-7 h-7 stroke-orange-300 inline-flex">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                  </svg>
                  Напишу вам сайт с использованием новых технологий в сфере WEB.</p>
              </div>
              <div>
                <p class="mt-8 animate-pulse"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="w-7 h-7 mb-1 stroke-orange-300 inline-flex">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                  </svg> <span>Профессиональные навыки:</span></p>
                <ul class="mt-4 pl-4 ">
                  <li>- опыт работы с HTML5, CSS3, JS</li>
                  <li>- знание JavaScript/JQuery/Typescript</li>
                  <li>- опыт адаптивной верстки</li>
                  <li>- опыт вёрстки сайтов и шаблонов для CMS</li>
                  <li>- знание CSS-фреймворков</li>
                  <li>- знание кросс-браузерной верстки</li>
                  <li>- знания PhotoShop,Figma</li>
                  <li>- знания PHP и СMS (Битрикс, WP)</li>
                  <li>- опыт работы с Git</li>

                </ul>
              </div>
              <div class="mt-6 flex justify-center">
                <a @click="scrollToForm()" class="uppercase shadow-xl relative z-1 tetx-sm bg-purple-600 text-white px-6 py-4 font-[600] md:text-xl  
                 after:content-['']  after:h-[100%] after:w-[0px]  after:transition-[all] 
                  after:delay-[150ms] after:left-[0px] after:bg-purple-600  after:top-[0px] 
                  after:absolute   hover:after:bg-purple-700  hover:after:w-[100%]"
                  href="javascript:void(0)"> <span class="relative inline-flex items-center gap-2  z-10"> Оставить заявку
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                  </svg>
                  </span>
                </a>
              </div>
              





            </div>
            


          </div>
        </div>

      </div>
      
      <div class="w-full py-4 lg:max-w-[500px]  xl:max-w-[50%] sm:pl-4  order-[-1] ">


        <div class=" slider-technologies sm:mb-[30px]  relative">

          <swiper :modules="modules" :navigation="{
            prevEl: prev,
            nextEl: next,
          }" :slides-per-view="1"
            :breakpoints="{ 320: { slidesPerView: 1 }, 640: { centeredSlides: false, slidesPerView: 2 }, 1024: { slidesPerView: 1, spaceBetween: '30' }, 1280: { slidesPerView: 2, spaceBetween: '30' } }"
            @swiper="onSwiper" @slideChange="onSlideChange">


            <swiper-slide v-for="(technology, key) of filterItems" :key="key" class="relative ">
              <div class="slilder-technologies__item w-[250px] aspect-[1/1] overflow-hidden mx-auto  sm:m-0 sm:relative ">
                <img class="w-[100%] h-[100%] object-contain" :src="apiUrl + technology.srcImage" :alt="'Технология'+' '+ technology.name" />
                <span
                  class="shadow-xl xl:text-sm text-white bg-purple-600  px-2 rounded-md py-1 absolute right-4 bottom-4 text sm:bottom-0 sm:right-0">
                  {{ technology.name }} </span>
              </div>

            </swiper-slide>

          </swiper>
          <div class="flex absolute top-4 right-4  ">
            <svg ref="prev" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="w-6 h-6 stroke-orange-500 swiper-button-prev cursor-pointer z-[100] relative">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>

            <svg ref="next" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="stroke-orange-500 w-6 h-6 swiper-button-next pointer cursor-pointer relative z-[100]">
              <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>
          </div>
        
        </div>
       
      </div>

    </div>
  </section>
</template>
