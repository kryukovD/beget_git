<script>
import {addJob} from "../api.js"
export default{
  data(){
    return{
      name:null,
      position:null,
      period_text:null,
      period_mounth:null,
      message:null
     

    }
  },
  methods:{

    submitForm(){
      let formData=new FormData();
      formData.append("name",this.name)
      formData.append("position",this.position)
      formData.append("period_text",this.period_text)
      formData.append("period_mounth",this.period_mounth)
      addJob(formData).then((response)=>{
        this.message=response
      })
    }
  }
}
</script>

<template>
  <div class="container mx-auto p-4">
    <h1 class="text-xl font-sfiu font-bold flex items-center gap-3 mb-4 md:text-3xl lg:text-4xl">Добавить запись</h1>
    <form class="w-full lg:max-w-lg" @submit.prevent="submitForm()">
      <div class="flex flex-wrap  mb-6">
        <div class="w-full   px-3 mb-6 md:mb-0">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
            Название места
          </label>
          <input v-model="name"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
            id="grid-first-name" type="text" placeholder="Название" required>

        </div>

        <div class="w-full   px-3 mb-6 md:mb-0">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
            Позиция
          </label>
          <input v-model="position"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
            id="grid-first-name" type="text" placeholder="Позиция" required>

        </div>

        <div class="w-full   px-3 mb-6 md:mb-0">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
            Период текстом
          </label>
          <input v-model="period_text"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
            id="grid-first-name" type="text" placeholder="Период текстом" required>

        </div>

        <div class="w-full   px-3 mb-6 md:mb-0">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
            Период(Месяцы)
          </label>
          <input v-model="period_mounth"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
            id="grid-first-name" type="text" placeholder="Период(месяцы)" required>

        </div>


      

       

        <div class="w-full flex justify-between  px-3">
          <input   class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer h-[max-content]" value="Добавить" type="submit">
          <a href="javascript:void(0)" @click="$router.go(-1)"
                class="hover:bg-blue-500 text-blue-700 font-semibold h-[max-content] hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Назад</a>
        </div>
        <template v-if="message!==null">
          <p :class="{'text-green-500':(message.class=='success'),'text-red-500':(message.class=='error')}" class="p-3">{{ message.message }}</p>
        </template>
       
      </div>

    </form>
  </div>
</template>