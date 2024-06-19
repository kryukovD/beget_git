import { createApp, h, nextTick } from 'vue'
import App from "./App.vue"
import { createRouter, createWebHashHistory } from 'vue-router'
import MainPageComponent from "./components/MainPageComponent.vue"
import AdminPageComponent from "./components/AdminPageComponent.vue"
import PortfolioPageComponent from "./components/PortfolioPageComponent.vue"
import LoginComponent from "./components/LoginComponent.vue"
import AddPortfolioComponent from "./components/AddPortfolioComponent.vue"
import EditPortfolioComponent from "./components/EditPortfolioComponent.vue"
import EditJobComponent from "./components/EditJobComponent.vue"
import AddJobComponent from "./components/AddJobComponent.vue"
import NotFoundComponent from "./components/NotFoundComponent.vue"
import axios from 'axios'
import VueAxios from 'vue-axios'
import Vuex from 'vuex'
import store from "./store.js"
import { getUser } from "./api.js"
const routes = [
  { path: '/', component: MainPageComponent, meta: { title: 'Дмитрий Крюков - web разработчик в Петрозаводске' } },
  { path: '/portfolio', component: PortfolioPageComponent, meta: { title: 'Мои работы' } },
  {
    path: '/private/login', component: LoginComponent, name: 'login',
    meta: {
      title: 'Вход'
    }

  },
  {
    path: '/private/admin', component: AdminPageComponent, name: 'dashboard',
    meta: {
      requiresAuth: true,
      title: "Админка"
    }
  },
  {
    path: '/private/admin/addPortfolio', component: AddPortfolioComponent, name: 'addPortfolio',
    meta: {
      requiresAuth: true,
      title: 'Добавить работу'
    }
  },
  {
    path: '/private/admin/editPortfolio/:id', component: EditPortfolioComponent, name: 'editPortfolio',
    meta: {
      requiresAuth: true,
      title: 'Изменить запись'
    }
  },
  {
    path: '/private/admin/addJob', component: AddJobComponent, name: 'addJob',
    meta: {
      requiresAuth: true,
      title: 'Добавить место работы'
    }
  },
  {
    path: '/private/admin/editJob/:id', component: EditJobComponent, name: 'editJob',
    meta: {
      requiresAuth: true,
      title: 'Изменить место работы'
    }
  },
  {
    path: '/:pathMatch(.*)', component: NotFoundComponent,
    meta: {
      title: 'Страница не найдена'
    }
  }
]


const app = createApp(App);


export const router = createRouter({
  // 4. Provide the history implementation to use. We are using the hash history for simplicity here.
  history: createWebHashHistory(),
  routes, // short for `routes: routes`
  render: () => h(App)
})

router.afterEach((to, from) => {
  nextTick(() => {
    document.title = to.meta.title
  })
})


router.beforeEach((to, from, next) => {
  if (to.meta.requiresAuth) {

    getUser().then((responce) => {
      if (responce?.role == "admin") {
        localStorage.setItem("isAdmin", true);
        store.commit("setAdmin", true)
        next()
      }
      else {
        next("/private/login")
      }
    })


  } else {
    next();
  }
});


app.use(router).use(VueAxios, axios).use(Vuex).mount('#app')
