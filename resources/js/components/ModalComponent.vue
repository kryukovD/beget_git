<script>
export default {
  apiUrl: import.meta.env.VITE_API_SERVER,
  props: {
    isOpen: Boolean,
    portfolioItem: Object
  },


}
</script>

<template>
  <div class="relative  " aria-labelledby="modal-title" role="dialog" aria-modal="true"
    :class="{ 'hidden -z-10': isOpen == false, 'block z-10': isOpen }">
    <!--
      Background backdrop, show/hide based on modal state.
  
      Entering: "ease-out duration-300"
        From: "opacity-0"
        To: "opacity-100"
      Leaving: "ease-in duration-200"
        From: "opacity-100"
        To: "opacity-0"
    -->
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" @click.self="$emit('close')"></div>

    <div class="fixed h-[70%] w-[90%] m-auto inset-0 z-10 w-screen ">
      <div class="flex mx-4 min-h-full  h-full items-center justify-center  text-center sm:items-center sm:p-0"
        @click.self="$emit('close')">
        <!--
          Modal panel, show/hide based on modal state.
  
          Entering: "ease-out duration-300"
            From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            To: "opacity-100 translate-y-0 sm:scale-100"
          Leaving: "ease-in duration-200"
            From: "opacity-100 translate-y-0 sm:scale-100"
            To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        -->
        <div
          class="flex h-full  flex-col  h-full relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-2xl  lg:max-w-5xl xl:max-w-6xl">
          <div
            class="bg-white portfolio-modal-content  px-4 pb-4 pt-5 sm:p-6 sm:pb-4 grow h-[calc(100%-60px)] overflow-y-scroll overflow-x-hidden">
            <div class="sm:flex sm:items-start ">
              <div
                class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-blue-100 sm:mx-0 sm:h-10 sm:w-10">
                <span class="font-bold">#{{ portfolioItem.id }}</span>
              </div>
              <div class="mt-3 text-left sm:ml-4 sm:mt-0 sm:text-left">
                <h3 class="text-xl  font-semibold leading-6 text-gray-900" id="modal-title">{{ portfolioItem.name }}</h3>
                <div class="mt-2 mb-4 " v-html="portfolioItem.full_description">

                </div>
                <div>
                  <img class="aspect-[2/1] object-contain object-center sm:object-left"
                    :src="$options.apiUrl + portfolioItem.srcImage">
                </div>
              </div>
            </div>
          </div>
          <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
            <a :href="portfolioItem.link" class="relative inline-flex w-full justify-center  bg-purple-600 px-3 py-2 text-sm 
              font-semibold text-white shadow-sm  sm:ml-3 sm:w-auto
              after:content-['']  after:h-[100%]
               after:w-[0px]  after:transition-[all]  after:delay-[150ms] after:left-[0px] 
               after:bg-purple-600  after:top-[0px] after:absolute   hover:after:bg-purple-700  
               hover:after:w-[100%]">
              <span class="relative z-10">Перейти </span></a>
            <button @click="this.$emit('close')" type="button"
              class="mt-3 inline-flex w-full justify-center  bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Закрыть</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>