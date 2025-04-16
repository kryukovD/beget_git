<script>
import { email, required, helpers } from '@vuelidate/validators'
import { useVuelidate } from '@vuelidate/core'
import { sendRequestForm } from '../api'
export default {
  setup: () => ({ v$: useVuelidate() }),
  data() {
    return {
      form: {
        name: null,
        email: null,
        message: null
      },
      sendForm: false,
      noticeMessage: null
    }
  },

  validations() {
    return {
      form: {
        name: { required: helpers.withMessage('*Обязательное поле*', required) },
        email: { required: helpers.withMessage('*Обязательное поле*', required), email: helpers.withMessage('*Некорректный email*', email) },
        message: { required: helpers.withMessage('*Обязательное поле*', required) }
      }
    }
  },
  methods: {
    async submitForm() {
      const result = await this.v$.$validate()
      this.sendForm = "pending";
      if (result) {
        let data = await sendRequestForm(this.form.name, this.form.email, this.form.message);
        if (data.message) {
          this.$refs.submitForm.setAttribute("disabled", "disabled");
          this.sendForm = true
        } else {
          this.noticeMessage = "Форма не отправлена , попробуйте позже!"
        }
      }
      else {
        this.sendForm = false
      }
    }
  }
}
</script>
<template>
  <section class="section-form text-grey-600 accent-gradient relative pb-10 px-4 pt-6 md:mt-0" id="formBlock">
    <div class="container mx-auto ">

      <div class=" mb-4 md:mb-6">
        <div class="relative">
          <h2 class="text-xl  font-bold lg:text-2xl xl:text-3xl ">Напиши мне</h2>
          <span
            class="absolute inset-0 shadow-[10px_10px_30px_5px_#2e9cca] w-0 group-hover:shadow-[10px_10px_30px_5px_#29648a]"></span>
        </div>
        <p>Отвечу вам в ближайшее время!</p>
      </div>


      <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 auto-rows-max">
        <div
          class="min-h-[158px] w-full  bg-accent-second text-gray-600 sm:w-full  sm:right-0 sm:top-4 sm:z-10 sm:order-2 md:w-full box-shadow-primary">
          <div class="bg-primary h-full  mx-auto">
            <div class="p-4">
              <p class="mt-4 mb-4 d-flex "><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                  viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                  class="w-7 h-7 mb-1 animate-pulse stroke-accent-second inline-flex">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                </svg>
                Готов ответить по любому вопросу.</p>
              <p class="mt-8 mb-2 "> <span><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 stroke-accent-second animate-pulse">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
                  </svg>
                </span></p>
              <p>Умение работать в режиме многозадачности и высокие аналитические способности позволяют мне эффективно
                работать с большими объёмами информации, быстро находить качественные решения сложных задач.</p>
            </div>
          </div>
        </div>
        <div class="section-form-wrapper flex-1  sm:flex-1 xl:max-w-[800px]  ">
          <div class="container mx-auto">
            <form  @submit.prevent="submitForm()"
              class="form grid h-full grid-rows-[repeat(3,auto)] bg-primary box-shadow-primary p-4 gap-y-4 sm:py-[60px]  " method="post" action="/">
              <div class="section-form-input-wrap bg-white h-[48px] relative xl:h-[60px]">
                <div class="input-errors absolute text-[12px] left-[12px] top-[0px] md:text-base xl:text-sm ">
                  <div v-for="error of v$.form.name.$errors" :key="error.$uid" class="error-msg text-pink-600">{{
                    error.$message }}</div>
                </div>
                <input :class="{ 'border-pink-600': v$.form.name.$errors.length > 0 }"
                  class="w-full h-full  rounded  text-black bg-[transparent]  border-1 border-accent-second" v-model="form.name" type="text"
                  name="name" placeholder="Имя">
              </div>

              <div class="section-form-input-wrap bg-white h-[48px]  relative xl:h-[60px]">
                <div class="input-errors absolute text-[12px] left-[12px] top-[0px] flex gap-3 md:text-base xl:text-sm">
                  <div v-for="error of v$.form.email.$errors" :key="error.$uid" class="error-msg text-pink-600">{{
                    error.$message }}</div>
                </div>
                <input :class="{ 'border-pink-600': v$.form.name.$errors.length > 0 }"
                  class="w-full h-full rounded  text-black bg-[transparent] border-accent-second " v-model="form.email" type="text"
                  name="email" placeholder="Email">
              </div>

              <div class="section-form-textarea  bg-white relative ">
                <div class="input-errors  absolute text-[12px] left-[12px] top-[0px] md:text-base xl:text-sm">
                  <div v-for="error of v$.form.message.$errors" :key="error.$uid" class="error-msg text-pink-600">{{
                    error.$message }}</div>
                </div>
                <textarea :class="{ 'border-pink-600': v$.form.name.$errors.length > 0 }" rows="5"
                  class="w-full  pt-[17px] rounded  text-black bg-[transparent] border-accent-second " v-model="form.message" name="message"
                  placeholder="Сообщение"></textarea>
              </div>
              <button ref="submitForm" class="box-shadow-theme bg-primary  p-2 h-max  relative z-10 rounded-sm 
               uppercase font-bold w-[max-content] 
               ease-in duration-150  xl:p-4  after:content-['']  after:h-[100%]
               after:w-[0px]  after:transition-[all]  after:delay-[150ms] after:left-[0px] 
               after:bg-violet-theme  after:top-[0px] after:absolute   hover:after:bg-gray-200 
               hover:after:w-[100%]">
                <span class="relative z-10">Написать </span></button>
              <span class="text-lime-500" v-if="sendForm == true">
                Отправлено
              </span>
              <span class="text-lime-500" v-if="noticeMessage != null">
                {{ this.noticeMessage }}
              </span>

            </form>
            <div v-if="(sendForm === 'pending')">
              <div class="text-center px-4 py-8 border-t border-blue-100">
                <div role="status">
                  <svg aria-hidden="true"
                    class="inline w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                    viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                      fill="currentColor" />
                    <path
                      d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                      fill="currentFill" />
                  </svg>
                  <span class="sr-only">Загрузка...</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </section>
</template>
<style scoped></style>
