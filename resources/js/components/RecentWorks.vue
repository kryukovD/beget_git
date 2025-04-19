<script>
import { getRecentPortfolio } from '../api.js'
import { Swiper, SwiperSlide } from "swiper/vue";
import { Navigation } from 'swiper';
import { onMounted, ref } from "vue";
import ModalComponent from './ModalComponent.vue';
import "swiper/css";
export default {
    apiUrl: import.meta.env.VITE_API_SERVER,
    data() {
        return {
            portfolios: [],
            isOpenModal: false,
            currentItemPortfolio: Object
        };
    },
    created() {
        getRecentPortfolio().then((response) => {
            this.portfolios = response;
        });
    },
    setup() {
        const prev = ref(null);
        const next = ref(null);
        const onSwiper = (swiper) => { };
        const onSlideChange = () => {

        };
        return {
            onSwiper,
            onSlideChange,
            prev,
            next,
            modules: [Navigation]
        };
    },
    components: {
        Swiper,
        SwiperSlide,
        "modal": ModalComponent
    },
    methods: {
        openModal(portfolio) {
            console.log(true);
            this.isOpenModal = true
            this.currentItemPortfolio = portfolio
        
        }
    }
}

</script>
<template>
    <section class="section-recent-work px-4 pt-6 mb-10 ">
        <modal :portfolioItem="currentItemPortfolio" :isOpen="isOpenModal" @close="isOpenModal = false"> </modal>
        <div class="container">
            <div class="flex justify-between items-center mb-4  md:mb-6">
                <div class="relative">
                    <h2 class="text-xl text-m-color font-bold lg:text-2xl xl:text-3xl ">Недавние работы</h2>
                    <span
                        class="absolute inset-0 shadow-[10px_10px_30px_5px_#2e9cca] w-0 group-hover:shadow-[10px_10px_30px_5px_#29648a]"></span>
                </div>
                <div class="arrows flex gap-4">
                    <div class="arrow-left inline-flex cursor-pointer  box-shadow-theme p-1 h-min transition delay-150 duration-300 ease-in-out hover:bg-gray-200"
                        ref="prev">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6 sm:size-6 xl:size-7 stroke-m-color">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />

                        </svg>
                    </div>
                    <div class="arrow-right inline-flex cursor-pointer box-shadow-theme p-1 h-min transition delay-150 duration-300 ease-in-out hover:bg-gray-200"
                        ref="next">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6 sm:size-6 xl:size-7 stroke-m-color">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                        </svg>
                    </div>

                </div>
            </div>
            <div class="section-recent-work__body ">

                <div class=" relative">

                    <swiper class="mb-10" :modules="modules" :navigation="{
                        prevEl: prev,
                        nextEl: next,
                    }" :slides-per-view="1"
                        :breakpoints="{ 320: { slidesPerView: 1.2, spaceBetween: '15' }, 640: { centeredSlides: false, slidesPerView: 2, spaceBetween: '15' }, 1280: { slidesPerView: 3, spaceBetween: '30' } }"
                        @swiper="onSwiper">

                        <swiper-slide v-for="(portfolio, key) in portfolios" :key="portfolio.id"
                            @click="openModal(portfolio)" class="relative !h-auto">
                            <div
                                class="flex flex-col cursor-pointer  h-full   portfolio-item items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:flex-wrap md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <img width="427" height="213" :loading="key >= 2 ? 'lazy' : ''"
                                    :fetchpriority="key <= 2 ? 'high' : ''"
                                    class="object-contain w-full rounded-t-lg aspect-[2/1] pt-4 md:h-auto md:w-full md:rounded-none md:rounded-l-lg "
                                    :src="$options.apiUrl + portfolio.previewImg"
                                    :alt="'Работа' + ' ' + portfolio.name">
                                <div class="flex flex-col w-full justify-between p-4 leading-normal">
                                    <h5
                                        class="mb-2 text-base font-bold tracking-tight text-gray-900 dark:text-white sm:text-lg md:text-xl xl:text-2xl">
                                        {{ portfolio.name }}</h5>
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 line-clamp-2"> {{
                                        portfolio.description }}</p>
                                </div>
                            </div>

                        </swiper-slide>

                    </swiper>

                    <router-link
                        class="m-auto uppercase text-sm flex justify-center items-center bg-violet-theme  box-shadow-theme text-m-color px-6 py-4 md:text-xl xs:max-w-[187px] md:max-w-[231px] w-full font-[600]  relative 
                after:content-['']  after:h-[100%] after:w-[0px]  after:transition-[all]  after:delay-[150ms] after:left-[0px] after:bg-gray-200  after:top-[0px] after:absolute   hover:after:bg-gray-200  hover:after:w-[100%] "
                        to="/portfolio"><span class="inline-flex relative items-center gap-2 z-10">Смотреть все
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m16.49 12 3.75 3.75m0 0-3.75 3.75m3.75-3.75H3.74V4.499" />
                            </svg>

                        </span></router-link>

                </div>
            </div>
        </div>

    </section>
</template>