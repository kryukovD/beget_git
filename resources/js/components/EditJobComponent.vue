<script>
import { updateJob, getJobById } from "../api.js"
export default {
    data() {
        return {
            id: null,
            name:null,
            position:null,
            period_text:null,
            period_mounth:null,
            message: null,
         

        }
    },
    methods: {
        handleUpload() {
            this.file = this.$refs.file.files[0];
        }
        ,
        submitForm() {
            let formData = new FormData();
            formData.append("id", this.id);
            formData.append("name", this.name)
            formData.append("position", this.position)
            formData.append("period_text", this.period_text)
            formData.append("period_mounth", this.period_mounth)    
            updateJob(formData).then((response) => {
                this.message = response
            })
        }

    },
    created() {
        getJobById(this.$route.params.id).then((response) => {
            this.id = response.id
            this.name=response.name
            this.position=response.position
            this.period_text=response.period_text
            this.period_mounth=response.period_mounth
        });
    },
    server: import.meta.env.VITE_API_SERVER
}
</script>

<template>
    <div class="container mx-auto p-4">
        <h1 class="text-xl font-sfiu font-bold flex items-center gap-3 mb-4 md:text-3xl lg:text-4xl">Изменить запись</h1>
        <form class="w-full lg:max-w-lg " @submit.prevent="submitForm()">
            <div class="-mx-3 mb-6">
                <div class="w-full   px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Место работы
                    </label>
                    <input required v-model="name"
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        id="grid-first-name" type="text" placeholder="Название">

                </div>

                <div class="w-full   px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    Позиция
                    </label>
                    <input required v-model="position"
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        id="grid-first-name" type="text" placeholder="Позиция">

                </div>

                <div class="w-full   px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                       Период текст 
                    </label>
                    <input required v-model="period_text"
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        id="grid-first-name" type="text" placeholder="Период текст">

                </div>

                <div class="w-full   px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                       Период (месяцы)
                    </label>
                    <input required v-model="period_mounth"
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        id="grid-first-name" type="text" placeholder="Период(месяцы)">

                </div>

                <div class="w-full flex justify-between items-end mb-4  px-3">
                    <input class="bg-blue-500 h-[max-content] hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer"
                        value="Изменить" type="submit">

                    <a href="javascript:void(0) " @click="$router.go(-1)"
                        class="hover:bg-blue-500 h-[max-content] text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Назад</a>
                </div>
                <template v-if="message !== null">
                    <p :class="{ 'text-green-500': (message.class == 'success'), 'text-red-500': (message.class == 'error') }"
                        class="p-3">{{ message.message }}</p>
                </template>

            </div>

        </form>

    </div>
</template>