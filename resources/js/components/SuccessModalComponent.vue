<script>

export default {
    apiUrl: import.meta.env.VITE_API_SERVER,
    props: {
        isOpen: Boolean,
    },
}
</script>

<template>
    <div class="relative  " aria-labelledby="modal-title" role="dialog" aria-modal="true"
        :class="{ 'hidden -z-10': isOpen == false, 'block z-40': isOpen }">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" @click.self="$emit('close')"></div>

        <div class="fixed h-[70%] w-[90%] m-auto inset-0 z-10  ">
            <div class="flex  min-h-full  h-full items-center justify-center  text-center sm:items-center sm:p-0"
                @click.self="$emit('close')">
                <div
                    class="flex flex-col relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all ">
                    <div class="bg-white   overflow-y-scroll overflow-x-hidden">
                        <div class="flex  gap-10 sm:items-start flex-col text-center p-10 sm:p-20">

                            <h1 class="text-xl text-center text-m-color font-bold lg:text-2xl xl:text-3xl">Спасибо.<br>Я
                                свяжусь с вами в ближайшее время.</h1>
                            <button @click="this.$emit('close')" type="button "
                                class="">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 absolute right-4 top-4 hover:stroke-blue-theme cursor-pointer"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg>
                            </button>
                        </div>



                    </div>
                </div>


            </div>
        </div>

    </div>



</template>