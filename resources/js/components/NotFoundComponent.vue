<template>
    <div class="
    flex
    items-center
    justify-center
    m-auto
 
  
  ">
        <div class="m-[auto] p-5 sm:px-40 sm:py-20 bg-white rounded-md shadow-xl">
            <div class="flex flex-col items-center">
                <h1 class="font-bold  text-9xl">404</h1>

                <h6 class="mb-2 text-xl sm:text-2xl font-bold text-center text-gray-800 md:text-3xl">
                    <span class="text-red-500">Ой!</span> Страница не найдена
                </h6>

                <p class="mb-8 text-center text-gray-500 md:text-lg">
                    Страницы не существует
                </p>

                <router-link :to="{ path: '/' }"
                    class="px-6 py-2 text-sm font-semibold bg-primary box-shadow-theme">Главная</router-link>
            </div>
        </div>
    </div>
    <hr>
</template>