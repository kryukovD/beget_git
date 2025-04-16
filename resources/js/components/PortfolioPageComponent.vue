<script>
import ModalComponent from './ModalComponent.vue';
import { getAllPortfolio } from '../api.js'
export default {
  apiUrl: import.meta.env.VITE_API_SERVER,
  data() {
    return {
      headerMenu: [
        { text: "Главная", href: "/" },
        { text: "Портфолио", href: "/portfolio" },
        { text: "Контакты", href: "/contatcs" },
      ],
      isActiveMenu: false,
      isOpenModal: false,
      portfolios: [],
      page: 1,
      perPage: 9,
      pages: [],
      activeNumber: 1,
      currentItemPortfolio: Object
    };
  },


  mounted: function () {
    const div = document.querySelector(".header-menu-toggle");

    document.addEventListener("click", (e) => {
      const withinBoundaries = e.composedPath().includes(div)

      if (!withinBoundaries) {
        this.isActiveMenu = false
      }
    });

  },
  components: {
    "modal": ModalComponent
  },
  methods: {
    openModal(portfolio) {
      this.isOpenModal = true
      this.currentItemPortfolio = portfolio
    },
    setPages() {
      let numberOfPages = Math.ceil(this.portfolios.length / this.perPage);
      for (let index = 1; index <= numberOfPages; index++) {
        this.pages.push(index);
      }
    },
    paginate(portfolios) {
      let page = this.page;
      let perPage = this.perPage;
      let from = (page * perPage) - perPage;
      let to = (page * perPage);
      return portfolios.slice(from, to);
    }
  },
  computed: {
    displayedPosts() {
      return this.paginate(this.portfolios);
    }
  },
  created() {
    getAllPortfolio().then((response) => {
      this.portfolios = response
    })
  },
  watch: {
    portfolios() {
      this.setPages();
    },

  },




};
</script>
<template>
  <section class="flex flex-col grow">

    <modal :portfolioItem="currentItemPortfolio" :isOpen="isOpenModal" @close="isOpenModal = false"> </modal>

    <div class="container mx-auto px-4 mt-6">
      <h1 class="font-sfiu font-bold flex items-center gap-3 mb-2 text-xl text-m-color font-bold lg:text-2xl xl:text-3xl">Портфолио

        <svg class="w-8 h-8 fill-accent-second" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
          xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 437.744 437.744" xml:space="preserve">
          <path d="M405.852,100.879h-3.358c-3.859-7.12-11.399-11.967-20.051-11.967h-61.567V78.594c0-13.245-10.775-24.021-24.02-24.021
	h-155.96c-13.25,0-24.03,10.775-24.03,24.021v10.318H55.301c-8.652,0-16.192,4.847-20.051,11.967h-3.358
	C14.307,100.879,0,115.186,0,132.771v218.507c0,17.586,14.307,31.893,31.892,31.893h373.96c17.585,0,31.892-14.307,31.892-31.893
	V132.771C437.744,115.186,423.437,100.879,405.852,100.879z M130.865,78.594c0-5.525,4.5-10.021,10.03-10.021h155.96
	c5.525,0,10.02,4.495,10.02,10.021v10.318h-176.01V78.594z M46.511,111.702c0-4.847,3.943-8.79,8.79-8.79h327.141
	c4.847,0,8.79,3.943,8.79,8.79v166.245c0,23.104-18.797,41.901-41.901,41.901h-82.668l4.417-25.396H166.658l4.417,25.396H88.413
	c-23.104,0-41.901-18.797-41.901-41.901V111.702z M254.435,308.453l-5.358,30.808h-60.415l-5.358-30.808H254.435z M423.744,351.278
	c0,9.866-8.026,17.893-17.892,17.893H31.892c-9.865,0-17.892-8.026-17.892-17.893V132.771c0-9.865,8.026-17.892,17.892-17.892h0.62
	v163.068c0,30.824,25.077,55.901,55.901,55.901h85.097l3.376,19.412h83.966l3.376-19.412h85.103
	c30.824,0,55.901-25.077,55.901-55.901V114.879h0.62c9.865,0,17.892,8.026,17.892,17.892V351.278z" />
        </svg>
      </h1>
      <p class="pb-4 md:mb-12 "> В этом разделе собраны все мои работы &#128570; </p>

      

      <div
        class="grid grid-cols-[repeat(auto-fit,minmax(230px,1fr))] pb-4 gap-3 md:grid-cols-[repeat(auto-fit,minmax(300px,1fr))] lg:md:grid-cols-[repeat(auto-fit,minmax(400px,1fr))] lg:gap-10">

        <div v-for="(portfolio, key) in displayedPosts" :key="portfolio.id" @click="openModal(portfolio)"
          class="flex flex-col cursor-pointer portfolio-item items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:flex-wrap md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
          <img width="427" height="213" :loading="key >= 2 ? 'lazy' : ''" :fetchpriority="key <= 2 ? 'high' : ''"
            class="object-contain w-full rounded-t-lg aspect-[2/1] pt-4 md:h-auto md:w-full md:rounded-none md:rounded-l-lg "
            :src="$options.apiUrl + portfolio.previewImg" :alt="'Работа' + ' ' + portfolio.name">
          <div class="flex flex-col w-full justify-between p-4 leading-normal">
            <h5
              class="mb-2 text-base font-bold tracking-tight text-gray-900 dark:text-white sm:text-lg md:text-xl xl:text-2xl">
              {{ portfolio.name }}</h5>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 line-clamp-2"> {{ portfolio.description }}</p>
          </div>
        </div>


      </div>

    </div>

    <nav aria-label="Page navigation example" class="flex flex-col grow align-end justify-end">
      <ul class="list-style-none flex justify-center md:justify-end md:px-4 mb-2">
        <li class="inline-flex items-center cursor-pointer" v-if="page != 1"
          @click="page--, activeNumber = activeNumber - 1">
          <a href="javascript:void(0)"
            class="pointer-events-none relative block rounded bg-transparent px-3 py-1.5  text-neutral-500 transition-all duration-300 dark:text-neutral-400">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="w-5 h-5">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M18.75 19.5l-7.5-7.5 7.5-7.5m-6 15L5.25 12l7.5-7.5" />
            </svg>

          </a>
        </li>
        <li v-for="(pageNumber, key) in pages" :key="key" @click.stop="page = pageNumber; activeNumber = pageNumber">
          <a class="relative block rounded bg-transparent px-3 py-1.5 cursor-pointer  text-neutral-600 transition-all duration-300   dark:text-white dark:hover:bg-neutral-700 dark:hover:text-white"
            :class="{ 'text-accent bg-gray-200': (activeNumber == pageNumber) }">{{ pageNumber }}</a>
        </li>

        <li class="inline-flex items-center cursor-pointer">
          <a @click="page++, activeNumber = activeNumber + 1" v-if="page < pages.length"
            class="relative block rounded bg-transparent px-3 py-1.5  text-neutral-600 transition-all duration-300 hover:bg-neutral-100 dark:text-white dark:hover:bg-neutral-700 dark:hover:text-white"
            href="javascript:void(0)"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
              stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" />
            </svg>
          </a>
        </li>
      </ul>
    </nav>
  </section>
  <hr>
</template>

<style scoped></style>
