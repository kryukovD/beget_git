<script>
import { updatePortfolio, getPortfolioById } from "../api.js"
export default {
    data() {
        return {
            name: null,
            link: null,
            description: null,
            full_description: null,
            file: null,
            loadedImage: null,
            message: null,
            id: null

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
            formData.append("link", this.link)
            formData.append("description", this.description)
            formData.append("full_description", this.full_description)
            formData.append("file", this.file)
            updatePortfolio(formData).then((response) => {
                this.message = response
            })
        }

    },
    created() {
        getPortfolioById(this.$route.params.id).then((response) => {
            this.id = response.id
            this.name = response.name
            this.link = response.link
            this.description = response.description
            this.full_description = response.full_description
            this.loadedImage = response.srcImage
        });
    },
    server: import.meta.env.VITE_API_SERVER
}
</script>

<template>
    <div class="container mx-auto p-4">
        <h1 class="text-xl font-sfiu font-bold flex items-center gap-3 mb-4 md:text-3xl lg:text-4xl">Изменить запись</h1>
        <form class="w-full " @submit.prevent="submitForm()">
            <div class="md:grid md:grid-cols-2 -mx-3 mb-6">
                <div class="w-full   px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Название проекта
                    </label>
                    <input required v-model="name"
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        id="grid-first-name" type="text" placeholder="Название">

                </div>

                <div class="w-full   px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Ссылка на работу
                    </label>
                    <input required v-model="link"
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        id="grid-first-name" type="text" placeholder="Ссылка">

                </div>


                <div class="w-full  mb-2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                        Краткое описание
                    </label>
                    <textarea required v-model="description" rows="10"
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-last-name" type="text" placeholder="Описание"> </textarea>
                </div>

                <div class="w-full mb-2  px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                        Полное описание
                    </label>
                    <textarea required v-model="full_description" rows="10"
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-last-name" type="text" placeholder="Описание"> </textarea>
                </div>

                <div class="w-full   px-3 mb-4">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                        Фото
                    </label>
                    <div class="aspect-video">
                        <img class="w-full h-full object-contain" :src="$options.server + loadedImage">
                    </div>
                    <input ref="file" @change="handleUpload()"
                        class="appearance-none block w-full border-[#6B7280] bg-gray-200 text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-last-name" type="file" placeholder="Описание">
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