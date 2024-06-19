
<script>
import { getPrices, updatePrices } from '../api';
export default {
    data() {
        return {
            prices: [],
            itemRefs: [],
            message:null,
           

        }
    },
    props:{
        open:false
    },
    created() {
        getPrices().then((response) => this.prices = response);
    },

    methods: {
        setItemRef(el) {
            if (el) {
                this.itemRefs.push(el)
            }
        },
        setNewPrices() {
            let formData=new FormData()
            this.itemRefs.forEach((item,key)=>{
                
                 formData.append(key,item.value)
            })
            updatePrices(formData).then((response)=>{
                this.message=response
            })

        }
    },
  
    
}
</script>
<template>
    <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true" :class="{'z-10':open,'z-[-1]':!open}">
        <!--
    Background backdrop, show/hide based on modal state.

    Entering: "ease-out duration-300"
      From: "opacity-0"
      To: "opacity-100"
    Leaving: "ease-in duration-200"
      From: "opacity-100"
      To: "opacity-0"
  -->
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
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
                    class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-xl">
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start w-full">
                            <div
                                class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">

                            </div>
                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Управление
                                    ценами</h3>
                                <div class="mt-2">
                                    <form class="w-full ">
                                        <div v-for="(item, i) in prices" class="md:flex  md:items-center mb-6" :key="i">
                                            <div class="md:w-[50%] ">
                                                <label class="block text-gray-500 font-[500] md:text-left mb-1 md:mb-0 pr-4"
                                                    for="inline-full-name">
                                                    {{ item.type }}
                                                </label>
                                            </div>
                                            <div>
                                                <input :ref="setItemRef"
                                                    class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500"
                                                    id="inline-full-name" type="text" :value="item.value">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-if="message!==null" class="text-lg p-4" :class="{'text-green-500':(message.class=='success'),'text-red-500':(message.class=='error')}">
                        <p>{{ message.message }}</p>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                        
                        <button type="button" @click="setNewPrices()"
                            class="inline-flex w-full justify-center rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 sm:ml-3 sm:w-auto">Сохранить</button>
                        <button type="button" @click="$emit('closeModal',false)"
                            class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Отмена</button>
                    </div>
                 
                </div>
            </div>
        </div>
    </div>
</template>