<script setup>
// import HelloWorld from './components/HelloWorld.vue'
import HeaderComponent from './components/HeaderComponent.vue';
import FooterComponent from "./components/FooterComponent.vue"
</script>

<template >
  <div class="page-wrapper bg-slate-50 flex flex-col min-h-[100vh]" >
    <header-component />
    <div class="page-body container mx-auto bg-primary grow flex flex-col">
      <router-view></router-view>
     
    </div>
    <div class="container mx-auto">
    <footer-component></footer-component>
  </div>
  </div>
</template>

<style scoped></style>
