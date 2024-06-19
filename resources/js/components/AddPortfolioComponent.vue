<script>
import {addPortfolio} from "../api.js"
export default{
  data(){
    return{
      name:null,
      link:null,
      description:null,
      full_description:null,
      file:null,
      message:null

    }
  },
  methods:{
    handleUpload(){
      this.file = this.$refs.file.files[0];
    }
    ,
    submitForm(){
      let formData=new FormData();
      formData.append("name",this.name)
      formData.append("link",this.link)
      formData.append("description",this.description)
      formData.append("full_description",this.full_description)
      formData.append("file",this.file)
      addPortfolio(formData).then((response)=>{
        this.message=response
      })
    }
  }
}
</script>

<template>
  <div class="container mx-auto p-4">
    <h1 class="text-xl font-sfiu font-bold flex items-center gap-3 mb-4 md:text-3xl lg:text-4xl">Добавить запись</h1>
    <form class="w-full " @submit.prevent="submitForm()">
      <div class="flex flex-wrap md:grid md:grid-cols-2 mb-6">
        <div class="w-full   px-3 mb-6 md:mb-0">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
            Название проекта
          </label>
          <input v-model="name"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
            id="grid-first-name" type="text" placeholder="Название" required>

        </div>

        <div class="w-full   px-3 mb-6 md:mb-0">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
            Ссылка на работу
          </label>
          <input v-model="link"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
            id="grid-first-name" type="text" placeholder="Ссылка" required>

        </div>


        <div class="w-full   px-3 mb-2">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
           Краткое писание
          </label>
          <textarea required v-model="description" rows="10"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            id="grid-last-name" type="text" placeholder="Описание"> </textarea>
        </div>

        <div class="w-full   px-3 mb-2">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
            Полное писание
          </label>
          <textarea required v-model="full_description" rows="10"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            id="grid-last-name" type="text" placeholder="Описание"> </textarea>
        </div>

        <div class="w-full   px-3 mb-4">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
            Фото
          </label>
          <input required ref="file" @change="handleUpload()"
            class="appearance-none block w-full border-[#6B7280] bg-gray-200 text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            id="grid-last-name" type="file" placeholder="Описание"> 
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