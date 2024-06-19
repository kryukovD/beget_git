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

  mounted: function () {
    const div = document.querySelector(".header-menu-toggle");

    document.addEventListener("click", (e) => {
      const withinBoundaries = e.composedPath().includes(div);
      if (!withinBoundaries) {
        this.isActiveMenu = false;
      }
    });
  },
};
console.log(import.meta.env.VITE_API_SERVER)
</script>
<template>
  <div class="container mx-auto">
  <header class="bg-blue-600 py-4 xl:py-5">
    <div class="container mx-auto px-4">
      <div class="header__inner grid-cols-2 grid items-center">
        <div class="text-cyan-50">
          <div class="header__logo inline font-bold text-2xl md:text-3xl xl:text-4xl"> <router-link to="/"> DmitriyKryukov</router-link> </div>
        </div>
        <div class="header__menu justify-self-end md:justify-self-start md:font-[500]">
          <ul class="text-base text-white uppercase hidden md:flex  md:gap-10  md:justify-between lg:text-xl">
            <li class="inline-flex gap-2 items-center hover:text-orange-300 transtion ease-in duration-150"><router-link
                :to="{path:'/portfolio'}">Портфолио</router-link> <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z" />
              </svg>
            </li>

            <li class="inline-flex gap-2 items-center hover:text-orange-300 transtion ease-in duration-150">
              <a href="tel:+79004628615">8-900-46-28-615</a>
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
              </svg>

            </li>

            <li class="inline-flex gap-2 items-center hover:text-orange-300 transtion ease-in duration-150  sm:hidden">
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
            class="w-8 h-8 text-cyan-50 cursor-pointer md:hidden">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
          </svg>
          <div
            class="header-menu-toggle  mb-4 z-50 shadow-sm invisible py-6 fixed w-[calc(100vw-142px)]  h-[100vh] translate-x-[100%] top-0 right-0 text-white bg-blue-500 text-white transition ease-in delay-250 max-[380px]:w-[100vw]"
            :class="{ 'header-menu-toggle_active': isActiveMenu }" @click="isActiveMenu != isActiveMenu">
            <ul class="header__list mt-10  text-lg px-4 font-normal ">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6 absolute right-4 top-4 hover:stroke-purple-700 cursor-pointer"
                @click="isActiveMenu = false">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>

              <li class="mb-5" v-for="item in headerMenu" :key="item">
                <router-link @click="isActiveMenu=false" :to="{path:item.href}">{{ item.text }}</router-link>
              </li>
              <ul class="header__contacts font-normal text-lg ">
                <li class="mb-5">
                  <a class="d-flex" href="tel:+79004628615">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                      stroke="currentColor" class="w-4 h-4 mr-1 0 inline">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                    </svg>
                    <span>+79004628615</span></a>
                </li>
                <li class="">


                  <a href="mailto:dimjson5430@gmail.com">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                      stroke="currentColor" class="w-4 h-4 mr-1   inline">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                    </svg>
                    dimjson5430@gmail.com</a>
                </li>
              </ul>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </header>
  </div>
</template>

<style scoped></style>
