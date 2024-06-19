<script>
import { getAllPortfolio, deletePortfolio, getAllRequest,getJobs,deleteJob} from '../api.js'
import PricesModalComponent from './PricesModalComponent.vue'
export default {
    data() {
        return {
            portfolios: [],
            jobs:[],
            requests: [],
            prices:[],
            messagePortfolio: null,
            messageJob:null,
            activeReqiest: null,
            open:false
        }
    },
    created() {
        getAllPortfolio().then((response) => {
            this.portfolios = response
        })
        getAllRequest().then((response) => {
            this.requests = response
        })
        getJobs().then((response)=>this.jobs=response)
       
    },
    methods: {
        deletePortfolio(id) {
            deletePortfolio(id).then((response) => {
                let sure = confirm('Удалить запись?');
                if (sure) {
                    getAllPortfolio().then((response) => {
                        this.portfolios = response
                    })
                    this.message = response
                    setTimeout(() => {
                        this.messagePortfolio = null
                    }, 2000);
                }
            })
        },

        deleteJob(id) {
            deleteJob(id).then((response) => {
                let sure = confirm('Удалить запись?');
                if (sure) {
                    getJobs().then((response) => {
                        this.jobs = response
                    })
                    this.messageJob = response
                    setTimeout(() => {
                        this.messageJob = null
                    }, 2000);
                }
            })
        },
        setActiveRequest(key) {
            if (key == this.activeReqiest) {
                this.activeReqiest = null
                return false
            }
            this.activeReqiest = key
        }
    }
    ,
    components: {
        'PricesModal': PricesModalComponent
    }
}
</script>
<template>
    <PricesModal :open="open"  @closeModal="open=false"/>
    <section class="section-admin mt-6 pb-6">
        <div class="container mx-auto pl-4 pr-4 sm:pr-0">
            <div class="flex justify-between items-center flex-wrap">
                <h1 class="text-xl font-sfiu font-bold flex items-center gap-3 mb-4 md:text-3xl lg:text-4xl"> Панель
                    администратора
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-10 h-10 stroke-orange-300">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z" />
                    </svg>


                </h1>
                <button @click="open=true"
                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z" />
                    </svg>
                    <span>Управление ценами</span>
                </button>
                <svg class="hidden sm:inline fill-orange-300 ml-9" width="70" height="140">
                    <defs>
                        <clipPath id="cut-off-bottom">
                            <rect x="0" y="0" width="70" height="140" />
                        </clipPath>
                    </defs>
                    <circle r="65" cx="70" cy="70" stroke-width="5" clip-path="url(#cut-off-bottom)" />
                </svg>
            </div>
        </div>
        <hr class="mb-3">
        <div class="container mx-auto px-4 overflow-x-auto">

            <h2 class="font-bold mb-2 text-lg md:text-xl">Список работ</h2>
            <div class="grid gap-4 lg:grid-cols-2 ">
                <div>
                    <table class="border-separate border-spacing-1 md:border-spacing-6 ">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th> Редактировать</th>
                                <th> Удалить</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="portfolio in portfolios" :key="portfolio">
                                <td>{{ portfolio.id }}</td>
                                <td align="center">{{ portfolio.name }}</td>
                                <td align="center"><router-link
                                        :to="{ name: 'editPortfolio', params: { id: portfolio.id } }"><svg
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6 cursor-pointer">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                        </svg>
                                    </router-link>
                                </td>
                                <td align="center">
                                    <svg @click="deletePortfolio(portfolio.id)" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        class="w-6 h-6 cursor-pointer">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>


                                </td>
                            </tr>

                        </tbody>
                    </table>
                    <router-link :to="{ name: 'addPortfolio' }"
                        class="inline-flex bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded"><svg
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </router-link>
                    <template v-if="messagePortfolio !== null">
                        <p :class="{ 'text-green-500': (messagePortfolio.class == 'success'), 'text-red-500': (messagePortfolio.class == 'error') }"
                            class="p-3">{{ messagePortfolio.message }}</p>
                    </template>
                </div>
                <div v-if="requests.length == 0">Нет заявок</div>
                <div v-else class="accrodion">
                    <h6 class="inline-flex"> Заявки: <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6 stroke-orange-300">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 15.75V18m-7.5-6.75h.008v.008H8.25v-.008zm0 2.25h.008v.008H8.25V13.5zm0 2.25h.008v.008H8.25v-.008zm0 2.25h.008v.008H8.25V18zm2.498-6.75h.007v.008h-.007v-.008zm0 2.25h.007v.008h-.007V13.5zm0 2.25h.007v.008h-.007v-.008zm0 2.25h.007v.008h-.007V18zm2.504-6.75h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V13.5zm0 2.25h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V18zm2.498-6.75h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V13.5zM8.25 6h7.5v2.25h-7.5V6zM12 2.25c-1.892 0-3.758.11-5.593.322C5.307 2.7 4.5 3.65 4.5 4.757V19.5a2.25 2.25 0 002.25 2.25h10.5a2.25 2.25 0 002.25-2.25V4.757c0-1.108-.806-2.057-1.907-2.185A48.507 48.507 0 0012 2.25z" />
                        </svg>
                    </h6>
                    <div class="relative mb-3" v-for="(request, key) in requests" :key="key">
                        <h6 class="mb-0">
                            <button @click="setActiveRequest(key)"
                                class="border-slate-100 text-slate-700 rounded-t-1 group relative flex w-full cursor-pointer items-center border-b border-solid p-4 text-left font-semibold text-dark-500 transition-all ease-in flex justify-between"
                                data-collapse-target="collapse-1">
                                <span>{{ request.name }}</span>
                                <svg v-if="activeReqiest !== key" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>

                                <svg v-else xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                                </svg>


                            </button>
                        </h6>
                        <div data-collapse="collapse-1"
                            :class="{ 'block': activeReqiest == key, 'hidden': activeReqiest != key, }"
                            class="transition-all duration-300 ease-in-out">
                            <div class="px-4 pb-2  leading-normal text-blue-gray-500/80">Email: {{ request.email }}</div>
                            <div class="px-4 pb-2  leading-normal text-blue-gray-500/80">Дата: {{ request.date }}</div>
                            <div class="px-4  leading-normal text-blue-gray-500/80 ">
                                <p>{{ request.message }} </p>
                            </div>
                        </div>
                    </div>


                </div>

                <div>
                    <h2 class="font-bold mb-2 text-lg md:text-xl">Места работы</h2>
                    <table class="border-separate border-spacing-1 md:border-spacing-6 ">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th> Редактировать</th>
                                <th> Удалить</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="job in jobs" :key="job.id">
                                <td>{{ job.id }}</td>
                                <td align="center">{{ job.name }}</td>
                                <td align="center"><router-link
                                        :to="{ name: 'editJob', params: { id: job.id } }"><svg
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6 cursor-pointer">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                        </svg>
                                    </router-link>
                                </td>
                                <td align="center">
                                    <svg @click="deleteJob(job.id)" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        class="w-6 h-6 cursor-pointer">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>


                                </td>
                            </tr>

                        </tbody>
                    </table>
                    <router-link :to="{ name: 'addJob' }"
                        class="inline-flex bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded"><svg
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </router-link>
                    <template v-if="messageJob !== null">
                        <p :class="{ 'text-green-500': (messageJob.class == 'success'), 'text-red-500': (messageJob.class == 'error') }"
                            class="p-3">{{ messageJob.message }}</p>
                    </template>
                </div>
            </div>

            
        </div>

    </section>
</template>
