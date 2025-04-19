<script>
export default {
    data() {
        return {
            showButton: false
        }
    },
    mounted() {
        this.scrollHandler = () => {
            if (window.scrollY > 300) {
                this.showButton = true;
            }
            else {
                this.showButton = false;
            }
        };
        window.addEventListener("scroll",this.scrollHandler);
    },
    unmounted() {
        window.removeEventListener("scroll",this.scrollHandler);
    },
    methods: {
        scrollUp() {
            window.scrollTo(0, 0);
        }

    }

}
</script>
<template>
    <div class=" fixed bottom-[85px] left-0 right-0 h-0 z-30" v-if="showButton">
        <div class="container mx-auto ">
            <div class=" flex w-full justify-end relative  px-6 xxl:px-0 h-0">
                <button @click="scrollUp"
                    class="relative   w-10 h-10 inline-flex justify-center bg-white items-center box-shadow-theme  transition delay-150 duration-300 ease-in-out hover:bg-gray-200 xxl:translate-x-[75px]">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8.25 6.75 12 3m0 0 3.75 3.75M12 3v18" />
                    </svg>

                </button>
            </div>
        </div>
    </div>
</template>