<template>
    <section class="bg-slate-100 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div
                class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1
                        class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white lg:text-3xl">
                        Вход
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="#" @submit.prevent="submitLoginForm()">
                        <div>
                            <label for="email"
                                class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="email" v-model="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-2xl rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="name@company.com" required>
                        </div>
                        <div>
                            <label for="password"
                                class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Пароль</label>
                            <input type="password" name="password" id="password" v-model="password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-2xl rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>
                        <!-- <div class="flex items-center justify-between">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="remember" aria-describedby="remember" type="checkbox"
                                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800"
                                        required="">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="remember" class="text-gray-500 dark:text-gray-300">Remember me</label>
                                </div>
                            </div>
                            <a href="#"
                                class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Forgot
                                password?</a>
                        </div> -->
                        <button type="submit"
                            class="w-full  bg-blue-700 text-white uppercase hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-bold   rounded-lg text-xl px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Войти</button>
                        <!-- <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                        Don’t have an account yet? <a href="#"
                            class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign up</a>
                    </p> -->
                    </form>
                    <p class="text-red-500">{{ message }}</p>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
import { loginUser, getUser,refreshAuthHeader } from "../api.js"
import store from "../store.js"
export default {

    data() {
        return {
            password: null,
            email: null,
            message: null
        }
    },
    created(){
        if(store.state.isAdmin){
            this.$router.push({name:'dashboard'});
        }
    },
    methods: {

        submitLoginForm() {
          
            let data = new FormData()
            data.append("email", this.email)
            data.append("password", this.password)
            loginUser(data).then((response) => {
                if (response?.access_token) {
                    localStorage.setItem("access_token", response.access_token);
                    localStorage.setItem("token_type", response.token_type);
                    store.commit("setToken", localStorage.getItem("access_token"));
                    store.commit("setTokenType", localStorage.getItem("token_type"));
                    localStorage.setItem("token_type", response.token_type);   
                    refreshAuthHeader(store.state?.token_type+ ' ' + store.state?.access_token);
                    getUser().then((response) => {
                        if (response?.role == "admin") {
                            this.$router.push({ name: 'dashboard' })  
                        } else {
                            this.message = "Недостаточно прав"
                        }
                    })
                }
                else {
                    this.message = "Не авторизирован"
                }
            })


        }
    },

}




</script>
