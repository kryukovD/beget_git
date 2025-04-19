<script>
export default {
  data() {
    return {
      headerMenu: [
        { text: "Главная", href: "/" },
        { text: "Портфолио", href: "/portfolio" },
      ],
      isActiveMenu: false,
    };
  },

  mounted() {

    const div = document.querySelector(".header-menu-toggle");

    if (div) {
      document.addEventListener("click", (e) => {
        const withinBoundaries = e.composedPath().includes(div);
        if (!withinBoundaries) {
          this.isActiveMenu = false;
        }
      });
    }

    this.loadFunc=() => {
      this.spySection();
    };
    window.addEventListener('load', this.loadFunc)

    // Вызываем spySection после рендера DOM
    this.$nextTick(() => this.spySection());
  },

  beforeDestroy() {
    // Удаляем обработчик события при уничтожении компонента
    window.removeEventListener('scroll', this.handleScroll);
    window.removeEventListener('load', this.loadFunc);
  },

  watch: {
    '$route.path'() {
      // Когда роут меняется, нужно заново вычислить активный раздел
      this.$nextTick(() => this.spySection());
    },
  },

  methods: {
    scrollToSection(id) {
      const element = document.getElementById(id);
      if (element) {
        element.scrollIntoView({ block: "start", inline: "center", behavior: 'smooth' });
      }
    },

    spySection() {

      const sections = document.querySelectorAll('section');
      if (!sections.length) return; // Если нет секций, выходим

      const navLinks = document.querySelectorAll('.nav-link');
      const header = document.querySelector('.header-wrap');
      if (!header) return; // Если нет шапки, выходим

      const headerOffset = header.offsetHeight;

      // Определяем функцию обработки скролла
      const handleScroll = () => {
        let current = '';

        sections.forEach((section) => {
          const sectionTop = section.offsetTop - headerOffset;
          const sectionHeight = section.offsetHeight;

          if (window.pageYOffset >= sectionTop - sectionHeight / 3) {
            current = section.getAttribute('id');
          }
        });

        navLinks.forEach((link) => {
          link.classList.remove('border-solid', 'border-b', 'border-accent');
          if (link.getAttribute('href') === `#${current}`) {
            link.classList.add('border-solid', 'border-b', 'border-accent');
          }
        });
      };

      // Добавляем обработчик scroll
      window.addEventListener('scroll', handleScroll);

      // Сохраняем метод, чтобы можно было удалить его в beforeDestroy
      this.handleScroll = handleScroll;
    },
  },
};

</script>
<template>
  <div class="container mx-auto sticky header-wrap top-0 z-20">
    <header class="bg-primary text-m-color py-4 xl:py-5 box-shadow-primary  ">
      <div class="container mx-auto px-4">
        <div class="header__inner grid-cols-2 grid items-center">
          <div class="text-m-color">
            <div class="header__logo inline font-bold text-2xl md:text-3xl xl:text-4xl "> <router-link
                to="/">DmitriyKryukov</router-link> </div>
          </div>
          <div class="header__menu justify-self-end md:justify-self-center md:font-[500]">
            <ul class="text-base text-m-color uppercase hidden md:flex  md:gap-10  md:justify-between lg:text-xl  ">
              <li
                class="inline-flex  relative gap-2 items-center group  hover:text-grey-theme  transtion ease-in duration-150 ">
                <router-link :to="{ path: '/portfolio' }" activeClass="text-accent group">Портфолио</router-link> <svg
                  :class="{ 'stroke-accent': $route.path === '/portfolio' }" xmlns="http://www.w3.org/2000/svg"
                  fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z" />
                </svg>
                <span
                  class="absolute inset-0 shadow-[10px_10px_30px_5px_#007AFF] w-0 group-hover:shadow-[10px_10px_30px_5px_#29648a] "></span>
              </li>

              <li
                class="inline-flex gap-2 items-center relative group hover:text-grey-theme transtion ease-in duration-150">
                <a href="tel:+79004628615">8-900-46-28-615</a>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                </svg>
                <span
                  class="absolute inset-0 shadow-[10px_10px_30px_5px_#007AFF] w-0 group-hover:shadow-[10px_10px_30px_5px_#29648a]"></span>

              </li>

              <li class="inline-flex gap-2 items-center  transtion ease-in duration-150  sm:hidden">
                <a href="mailto:dimjson5430@gmail.com">dimjson5430@gmail.com</a>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                </svg>


              </li>
            </ul>
            <svg @click.stop="isActiveMenu = !isActiveMenu" xmlns="http://www.w3.org/2000/svg" fill="none"
              viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
              class="w-8 h-8 text-m-color cursor-pointer md:hidden">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
            </svg>
            <div
              class="header-menu-toggle  mb-4 z-50 box-shadow-primary invisible py-6 fixed w-full  xs:w-[calc(100vw-100px)]  h-[100vh] translate-x-[100%] top-0 right-0 bg-primary  text-m-color transition ease-in delay-250 max-[380px]:w-[100vw]"
              :class="{ 'header-menu-toggle_active': isActiveMenu }" @click="isActiveMenu != isActiveMenu">
              <ul class="header__list mt-10  text-xl px-4 font-normal ">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="w-6 h-6 absolute right-4 top-4 hover:stroke-blue-theme cursor-pointer"
                  @click="isActiveMenu = false">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>

                <li class="mb-5" v-for="item in headerMenu" :key="item">
                  <router-link @click="isActiveMenu = false" :to="{ path: item.href }">{{ item.text }}</router-link>
                </li>
                <ul class="header__contacts font-normal text-xl ">
                  <li class="mb-5 relative">
                    <a class="d-flex" href="tel:+79004628615">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-4 h-4 mr-1 0 inline">
                        <path stroke-linecap="round" stroke-linejoin="round"
                          d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                      </svg>
                      <span>+79004628615</span></a>
                      <span class="absolute inset-0 shadow-[10px_10px_30px_5px_#2e9cca] w-0 group-hover:shadow-[10px_10px_30px_5px_#29648a]"></span>
                  </li>
                  <li class="relative">
                    <a href="mailto:dimjson5430@gmail.com">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-4 h-4 mr-1   inline">
                        <path stroke-linecap="round" stroke-linejoin="round"
                          d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                      </svg>
                      dimjson5430@gmail.com</a>
                      <span class="absolute inset-0 shadow-[10px_10px_30px_5px_#2e9cca] w-0 group-hover:shadow-[10px_10px_30px_5px_#29648a]"></span>
                  </li>
                </ul>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </header>
    <div class="sub-header relative z-20 bg-gray-200 tex-lg" v-if='$route.path == "/"'>
      <div class="container px-4 ">
        <ul class="sub-header__list  flex gap-4 py-2 overscroll-none overflow-x-scroll xs:overflow-x-hidden">

          <li class="shrink-0 w-max transition delay-150 duration-300 ease-in-out hover:text-accent ">
            <a class="nav-link" href="#recent_works" @click.prevent="scrollToSection('recent_works')">#Недавние работы
            </a>
          </li>

          <li class="shrink-0 w-max transition delay-150 duration-300 ease-in-out hover:text-accent"><a href="#stack"
              class="nav-link" @click.prevent="scrollToSection('stack')">#Стек</a></li>
          <li class="shrink-0 w-max transition delay-150 duration-300 ease-in-out hover:text-accent"><a href="#services"
              @click.prevent="scrollToSection('services')" class="nav-link">#Услуги</a></li>
          <li class="shrink-0 w-max transition delay-150 duration-300 ease-in-out hover:text-accent"><a class="nav-link"
              href="#feedback" @click.prevent="scrollToSection('feedback')">#Связаться </a></li>
        </ul>
      </div>
    </div>
  </div>
</template>

<style scoped></style>
